<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/11
 * Time: 10:13
 */

namespace app\member\controller;


use think\Db;
use think\Request;

class Upload extends Controllers
{


    /**
     * 单图片上传
     */
    public function uni_pic(){
        if (Request::instance()->isPost()){
            $src = Request::instance()->param('file_name','');
            if (empty($_FILES) || empty($src)){
                return json_encode(['code'=>'400','src'=>'']);
            }
            $file = $_FILES['file'];
            // 图片上传
            $data = $this->upload_pic($file,$src);
            $status = 0;
            if (empty($data)){
                return json_encode(['code'=>'400','src'>'']);
            }else{
                if ($data['code']==200){
                    $user_id = $this->user_id;
                    $db = $this->db;
                    $websit_pic = Db::connect($db)->query("select * from website_pic where user_id = {$user_id}");
                    if (empty($websit_pic)){
                        $arr = ["user_id"=>$user_id,"{$src}"=>$data['src'],'create_time'=>time(),'update_time'=>time()];
                        $status = Db::connect($db)->table('website_pic')->insert($arr);
                    }else{
                        $arr= ["user_id"=>$user_id,"{$src}"=>$data["src"],"update_time"=>time()];
                        $status = Db::connect($db)->table('website_pic')->where('user_id', $user_id)->update($arr);

                    }
                }
                if ($status){
                    return json_encode($data);
                }else{
                    return json_encode(['code'=>'400','src'>'']);
                }
            }
        }
    }

    /**
     * 多图片上传
     */
    public function multi_pic(){
        if (Request::instance()->isPost()){
            $file = $_FILES['file'];
            $src = "banner";
            $data = $this->upload_pic($file,$src);
            $status = 0;
            if (empty($data)){
                return json_encode(['code'=>'400','src'>'']);
            }else{
                if ($data['code']==200){
                    $user_id = $this->user_id;
                    $db = $this->db;
                    $websit_pic = Db::connect($db)->query("select * from website_pic where user_id = {$user_id}");
                    if (empty($websit_pic)){
                        $arr = ["user_id"=>$user_id,"{$src}"=>$data['src'],'create_time'=>time(),'update_time'=>time()];
                        $status = Db::connect($db)->table('website_pic')->insert($arr);
                    }else{
                        $sql = "update website_pic set banner = concat(banner,';{$data['src']}'),update_time=".time()." where user_id={$user_id}";
                        $status = Db::connect($db)->execute($sql);
                    }
                }

                if ($status){
                    return json_encode($data);
                }else{
                    return json_encode(['code'=>'400','src'>'']);
                }
            }
        }
    }


    /**
     * 案例图片/荣誉资质图片/产品图片/用户头像等上传
     */
    public function share_pic(){
        if (Request::instance()->isPost()){
            $file = $_FILES['file'];
            $src = Request::instance()->param('file_name','');
            $data = $this->upload_pic($file,$src);
            $status = 0;
            if (empty($data)){
                return json_encode(['code'=>'400','src'>'']);
            }else{
                if ($data['code']==200){
                   $status = 1;
                }
            }
            if ($status){
                return json_encode($data);
            }else{
                return json_encode(['code'=>'400','src'>'']);
            }
        }
    }

    /**
     * 编译器图片上传--产品
     */
    public function product_pic(){
        if (Request::instance()->isPost()){
            $file = $_FILES['file'];
            $src = 'product';
            return $this->layedit_pic($file,$src);
        }
    }

    /**
     * 编译器图片上传--资讯文章
     */
    public function infor_pic(){
        if (Request::instance()->isPost()){
            $file = $_FILES['file'];
            $src = 'resume';
            return $this->layedit_pic($file,$src);
        }
    }


    public function layedit_pic($file,$src){
        $data = $this->upload_pic($file,$src);
        $status = 0;
        if (empty($data)){
            return json_encode(['code'=>'400','msg'=>'上传失败','data'=>['src'=>'']]);
        }else{
            if ($data['code']==200){
                $status = 1;
            }
        }
        if ($status){
            $arr = explode("/",$data['src']);
            $title = $arr[count($arr)-1];
            return json_encode(['code'=>'0','msg'=>'','data'=>['src'=>"/static".$data['src'],'title'=>$title]]);
        }else{
            return json_encode(['code'=>'400','msg'=>'上传失败','data'=>['src'=>'']]);

        }
    }

    /**
     * 首页轮播图上传清空
     */
    public function clear_multi(){
        if (Request::instance()->isAjax()){
            $types = Request::instance()->param('types','');
            if (empty($types) || $types!='del'){
                return '400';
            }

            $user_id = $this->user_id;
            $db = $this->db;
            $data = Db::connect($db)->query("select banner from website_pic where user_id = {$user_id}");
            if (!empty($data)){
                $banner = $data[0]['banner'];
                $banners = explode(';',$banner);
                $banners = array_filter($banners);
                if (!empty($banners)){
                    $status = Db::connect($db)->table('website_pic')->where('user_id',$user_id)->update(['banner'=>""]);
                    if ($status){
                       foreach ($banners as $vt){
                           unlink(getcwd().'/static'.$vt);
                       }
                       return '200';
                    }
                }
            }
            return '400';
        }
    }


    
    
    
    /**
     * 判断上传的文件是否存在
     */
    private function exists($upload_path,$destination,$ftype){
        if (file_exists($destination)) {
            $key = mt_rand(1000,9999);
            $destination = $upload_path.time().$key.".".$ftype;
            return $this->exists($upload_path,$destination,$ftype);
        }else{
            return $destination;
        }
    }

    /**
     * 如果文件夹不存在则创建文件夹
     * @param $path
     */
    private function MkFolder($path)
    {
        if (!is_readable($path)) {
            $this->MkFolder(dirname($path));
            if (!is_file($path)) mkdir($path, 0777);
        }
    }

    /**
     * 图片上传操作
     */
    public function upload_pic($file, $src){
        $max_file_size      = 10240000;           //上传文件大小限制, 单位BYTE
        $type = $file['type']; // 文件类型
        $allow_type   = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');//上传文件类型列表
        if(!in_array($type, $allow_type)){
            return ['code'=>400,'src'=>''];
        }

        //文件是否存在
        if (!is_uploaded_file($file['tmp_name'])){
            return ['code'=>400,'src'=>''];
        }

        $upload_path =  getcwd()."/static/upload/".$src."/". date("Y") . date("m") . "/" . date('d') ."/"; //上传文件的存放路径
        $this->MkFolder($upload_path);

        //开始移动文件到相应的文件夹
        $key = mt_rand(1000,9999);

        $pinfo       = pathinfo($file["name"]);
        $ftype       = $pinfo['extension'];
        $destination = $upload_path.time().$key.".".$ftype;
        $destination = $this->exists($upload_path,$destination,$ftype);


        if(move_uploaded_file($file['tmp_name'],$destination)){
            $arr = explode('/',$destination);
            $path = "/upload/".$src."/". date("Y") . date("m") . "/" . date('d') ."/".$arr[count($arr)-1];
            return ['code'=>200,'src'=>$path];
        }else{
            return ['code'=>400,'src'=>''];
        }
    }



}