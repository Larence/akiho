<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/11
 * Time: 16:34
 * 企业信息
 */

namespace app\member\controller;


use think\Db;
use think\Exception;
use think\Request;

class Company extends Controllers
{

    /**
     * 公司信息
     * @return \think\response\View
     * @throws Exception
     * @throws \think\exception\PDOException
     */
    public function index(){
        $db = $this->db;
        $user_id = $this->user_id;
        if (Request::instance()->isAjax()){
            $name = Request::instance()->param('name','');
            $info = Request::instance()->param('info','');
            $tel = Request::instance()->param('tel','');
            $email = Request::instance()->param('email','');
            $address = Request::instance()->param('address','');
            if (empty($name) || empty($info) || empty($tel) || empty($email) || empty($address)){
                exit('400');
            }
            try{
                $company = Db::connect($db)->query("select * from company where user_id={$user_id}");
                if (!empty($company)){
                    $data= ['user_id'=>$user_id,'name'=>$name,'info'=>$info,'tel'=>$tel,'email'=>$email,'address'=>$address,'update_time'=>time()];
                    $status = Db::connect($db)->table('company')->where('id', $company[0]['id'])->update($data);
                }else{
                    $data = ['user_id'=>$user_id,'name'=>$name,'info'=>$info,'tel'=>$tel,'email'=>$email,'address'=>$address,'create_time'=>time(),'update_time'=>time()];
                    $status = Db::connect($db)->table('company')->insert($data);
                }


                if ($status){
                    exit('200');
                }else{
                    exit('400');
                }
            }catch (Exception $exception){
                exit('400');
            }
        }
        $name= "";
        $info= "";
        $tel= "";
        $email= "";
        $address= "";
        $data = Db::connect($db)->query("select * from company where user_id={$user_id}");
        if (!empty($data)){
            $name= $data[0]['name'];
            $info= $data[0]['info'];
            $tel= $data[0]['tel'];
            $email= $data[0]['email'];
            $address= $data[0]['address'];
        }
        $this->assign('name',$name);
        $this->assign('info',$info);
        $this->assign('tel',$tel);
        $this->assign('email',$email);
        $this->assign('address',$address);


        return view('company');
    }


    /**
     * 图片管理
     * @return \think\response\View
     */
    /**
     * @return \think\response\View
     * @throws Exception
     * @throws \think\exception\PDOException
     */
    public function pic(){

        $user_id = $this->user_id;
        $db = $this->db;
        $data = Db::connect($db)->query("select * from website_pic where user_id={$user_id}");
//        $data = array();
        $logo = "";
        $weibo = "";
        $wechat = "";
        $taobao = "";
        $banner = "";

        if (!empty($data)){
            $logo = $data[0]['logo'];
            $weibo = $data[0]['weibo'];
            $wechat = $data[0]['wechat'];
            $taobao = $data[0]['taobao'];
            $banner = $data[0]['banner'];
        }
        $banners = array();
        if (!empty($banner)){
           $banners = explode(';',$banner);
           $banners = array_filter($banners);
        }

        $this->assign('logo',$logo);
        $this->assign('weibo',$weibo);
        $this->assign('wechat',$wechat);
        $this->assign('taobao',$taobao);
        $this->assign('banners',$banners);
        return view('pic');
    }

    /**
     * 成功案例
     * @return string|\think\response\View
     * @throws Exception
     */
    public function cases(){
        $db = $this->db;
        if (Request::instance()->isAjax()){
            $pic_path = Request::instance()->param('pic_path','');
            $contents = Request::instance()->param('contents','');
            $c_id = Request::instance()->param('cases_id',0);
            if (empty($pic_path) || empty($contents)){
                return "400";
            }
            if ($c_id){
                $data= ['pic'=>$pic_path,'contents'=>$contents,'update_time'=>time()];
                $status = Db::connect($db)->table('cases')->where('id', $c_id)->update($data);
            }else{
                $user_id = $this->user_id;
                $data = ['user_id'=>$user_id,'pic'=>$pic_path,'contents'=>$contents,'create_time'=>time(),'update_time'=>time()];
                $status = Db::connect($db)->table('cases')->insert($data);
            }

            if ($status){
                return '200';
            }else{
                return '400';
            }
        }

        $id = Request::instance()->param('id','');
        $pic_path = "";
        $contents = "";
        if (!empty($id)){
            $data = Db::connect($db)->query("select * from cases where id={$id}");
            if (!empty($data)){
                $pic_path = $data[0]['pic'];
                $contents = $data[0]['contents'];
            }else{
                $id="";
            }
        }

        $this->assign('id',$id);
        $this->assign('pic_path',$pic_path);
        $this->assign('contents',$contents);
        return view('cases');
    }

    /**
     * 获取案例
     */
    public function get_cases(){
        if (Request::instance()->isPost()){
            $user_id = $this->user_id;
            $db = $this->db;
            $data = Db::connect($db)->query("select * from cases where user_id = {$user_id} order by id desc");
            $count = Db::connect($db)->table('cases')->where('user_id',$user_id)->count();
            if (empty($data)){
                exit(json_encode(["code"=>0,"msg"=>"暂无数据","count"=>$count,'data'=>$data]));
            }else{
                exit(json_encode(["code"=>0,"msg"=>"","count"=>$count,'data'=>$data]));
            }
        }
    }

    /**
     * 案例删除
     */
    public function del_cases(){
        if (Request::instance()->isAjax()){
            $id = Request::instance()->param('id','');
            if (empty($id)){
                return "400";
            }

            $db = $this->db;
            $user_id = $this->user_id;
            $status = Db::connect($db)->table('cases')->where('id',$id)->delete();
            if ($status){
                return "200";
            }else{
                return "400";
            }
        }
    }


    /**
     * 荣誉资质
     */
    public function honor(){
        $db = $this->db;
        if (Request::instance()->isAjax()){
            $pic_path = Request::instance()->param('pic_path','');
            $contents = Request::instance()->param('contents','');
            $c_id = Request::instance()->param('honor_id',0);
            if (empty($pic_path) || empty($contents)){
                return "400";
            }
            if ($c_id){
                $data= ['pic'=>$pic_path,'contents'=>$contents,'update_time'=>time()];
                $status = Db::connect($db)->table('honor')->where('id', $c_id)->update($data);
            }else{
                $user_id = $this->user_id;
                $data = ['user_id'=>$user_id,'pic'=>$pic_path,'contents'=>$contents,'create_time'=>time(),'update_time'=>time()];
                $status = Db::connect($db)->table('honor')->insert($data);
            }

            if ($status){
                return '200';
            }else{
                return '400';
            }
        }

        $id = Request::instance()->param('id','');
        $pic_path = "";
        $contents = "";
        if (!empty($id)){
            $data = Db::connect($db)->query("select * from honor where id={$id}");
            if (!empty($data)){
                $pic_path = $data[0]['pic'];
                $contents = $data[0]['contents'];
            }else{
                $id="";
            }
        }

        $this->assign('id',$id);
        $this->assign('pic_path',$pic_path);
        $this->assign('contents',$contents);
        return view('honor');
    }


    /**
     * 获取荣誉资质
     */
    public function get_honor(){
        if (Request::instance()->isPost()){
            $user_id = $this->user_id;
            $db = $this->db;
            $data = Db::connect($db)->query("select * from honor where user_id = {$user_id} order by id desc");
            $count = Db::connect($db)->table('honor')->where('user_id',$user_id)->count();
            if (empty($data)){
                exit(json_encode(["code"=>0,"msg"=>"暂无数据","count"=>$count,'data'=>$data]));
            }else{
                exit(json_encode(["code"=>0,"msg"=>"","count"=>$count,'data'=>$data]));
            }
        }
    }

    /**
     * 荣誉资质删除
     */
    public function del_honor(){
        if (Request::instance()->isAjax()){
            $id = Request::instance()->param('id','');
            if (empty($id)){
                return "400";
            }

            $db = $this->db;
            $user_id = $this->user_id;
            $status = Db::connect($db)->table('honor')->where('id',$id)->delete();
            if ($status){
                return "200";
            }else{
                return "400";
            }
        }
    }

}