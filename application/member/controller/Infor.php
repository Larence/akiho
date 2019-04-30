<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/16
 * Time: 16:49
 */

namespace app\member\controller;


use app\member\model\Auths;
use think\Db;
use think\Request;

class Infor extends Controllers
{

    /**
     *
     */
    public function index(){

        $user_id = $this->user_id;
        $db = $this->db;
        if (Request::instance()->isAjax()){
            $id = Request::instance()->param('id',0);
            unset($_POST['id']);
            $data = $_POST;
            // 判断提交的数据中是否存在空值,若存在则直接返回
            if (count($data) != count(array_filter($data))){
                return '400';
            }
            if ($id){
                // 修改数据
                $data['update_time'] = time();
                $status = Db::connect($db)->table('infor')->where('id',$id)->update($data);
            }else{
                // 添加新数据
                $data['create_time'] = time();
                $data['update_time'] = time();
                $data['user_id'] = $user_id;
                $status = Db::connect($db)->table('infor')->insert($data);
            }
            if ($status){
                return '200';
            }else{
                return '400';
            }
        }

        $id = Request::instance()->param('id',0);
        $title = "";
        $pic = "";
        $intro = "";
        $contents = "";
        if ($id){
            $data = Db::connect($db)->table('infor')->where('id',$id)->select();
            if (!empty($data)){
                $title = $data[0]['title'];
                $pic = $data[0]['pic'];
                $intro = $data[0]['intro'];
                $contents = $data[0]['contents'];
            }
        }

        $this->assign('id',$id);
        $this->assign('title',$title);
        $this->assign('pic',$pic);
        $this->assign('intro',$intro);
        $this->assign('contents',$contents);

        return view('index');
    }

    /**
     * 获取文章内容
     */
    public function lists(){
        if (Request::instance()->isAjax()){
            $user_id = $this->user_id;
            $db = $this->db;
            $data = Db::connect($db)->table('infor')->where('user_id',$user_id)->order('id desc')->select();
            $count = Db::connect($db)->table('infor')->where('user_id',$user_id)->count();
            if (empty($data)){
                exit(json_encode(["code"=>400,"msg"=>"暂无数据","count"=>$count,'data'=>[]]));
            }else{
                exit(json_encode(["code"=>0,"msg"=>"","count"=>$count,'data'=>$data]));
            }
        }
    }

    /**
     * 资讯删除
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function delete(){
        if (Request::instance()->isAjax()){
            $id = Request::instance()->param('id','');
            if (empty($id)){
                return "400";
            }

            $db = $this->db;
            $user_id = $this->user_id;
            $status = Db::connect($db)->table('infor')->where('id',$id)->delete();
            if ($status){
                return "200";
            }else{
                return "400";
            }
        }
    }

    /**
     * 文章详情
     * @return \think\response\View
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function detail(){
        $id = Request::instance()->param('id',0);
        if ($id){
            $db = $this->db;
            $data = Db::connect($db)->table('infor')->where('id',$id)->select();
            $this->assign('data',$data);

            $comment_id = Db::connect($db)->table('comment')->where('infor_id',$id)->where('p_id',0)->limit(0,10)->order("id desc")->column('id'); // 获取评论
            $ids = implode(',',$comment_id);
            $comments= $this->deal_comment($ids);
            $count = Db::connect($db)->table('comment')->where('infor_id',$id)->where('p_id',0)->count(); // 评论数
            $counts = ceil($count/10);
            $this->assign('comments',$comments);
            $this->assign('counts',$counts);
            return view('detail');
        }else{
            return view('error/error');
        }

    }

    /**
     * 获取评论
     */
    public function get_comments(){
        if(Request::instance()->isAjax()){
            $db = $this->db;
            $page = Request::instance()->param('pages');
            $id = Request::instance()->param('id');
            $comment_id = Db::connect($db)->table('comment')->where('infor_id',$id)->where('p_id',0)->limit(($page-1)*10,10)->order("id desc")->column('id'); // 获取评论
            $ids = implode(',',$comment_id);
            $comments= $this->deal_comment($ids);
            return json_encode($comments);
        }
    }

    /**
     * 对评论数据进行处理
     */
    protected function deal_comment($ids){
        $arr = array();
        if(!empty($ids)){
            $db = $this->db;
            $sql = "SELECT * from comment WHERE (p_id in({$ids})) or (id in({$ids})) ORDER by id asc";
            $comment = Db::connect($db)->table('comment')->query($sql);
            if (!empty($comment)){
                foreach ($comment  as $vt){
                    if ($vt['p_id'] == 0){
                        $arr[$vt['id']][] = $vt;
                    }else{
                        $arr[$vt['p_id']][] = $vt;
                    }
                }
            }
        }
        return array_reverse($arr);
    }


    // 管理员添加回复
    public function add_comments(){
        if (Request::instance()->isAjax()){
            $user =  session('user');
            if(empty($user)){
                $this->redirect('/login/login');
            }
            $db = $this->db;
            $pic = $user['pic'];
            $name = $user['name'];
            $id = Request::instance()->param('id',0);
            $infor_id = Request::instance()->param('infor_id',0);
            $contents = Request::instance()->param('contents','');
           if (empty($id) || empty($infor_id) || empty($contents)){
               return "400";
           }
            $data['company_id'] = $this->company_id;
            $data['name'] = $name;
            $data['pic'] = $pic;
            $data['infor_id'] = $infor_id;
            $data['contents'] = $contents;
            $data['p_id'] = $id;
            $data['create_time'] = time();
            $status = Db::connect($db)->table('comment')->insert($data);
            if ($status){
                return '200';
            }else{
                return '400';
            }
        }
    }


    /**
     * 评论列表
     */
    public function comments(){
        if (Request::instance()->isPost()){
            $page = Request::instance()->param('page',1);
            $limit = Request::instance()->param('limit',10);

            $company_id = $this->company_id;
            $db = $this->db;
            $data = Db::connect($db)->table('comment')->alias('c')
                ->join('infor i','c.infor_id = i.id')
                ->where('c.company_id',$company_id)
                ->where('c.p_id',0)
                ->order('c.id desc')
                ->limit(($page-1)*10,$limit)
                ->column('c.id,c.name,c.email,c.tel,c.infor_id,c.contents,c.p_id,c.create_time,i.title');
            $count = Db::connect($db)->table('comment')->alias('c')
                ->join('infor i','c.infor_id = i.id')
                ->where('c.company_id',$company_id)
                ->where('c.p_id',0)
                ->count();
            if ($count==0){
                exit(json_encode(["code"=>400,"msg"=>"暂无数据","count"=>$count,'data'=>""]));
            }else{
                exit(json_encode(["code"=>0,"msg"=>"","count"=>$count,'data'=>array_values($data)]));
            }
        }

        return view('comments');
    }

    /**
     * 删除评论
     */
    public function del(){
        if (Request::instance()->isAjax()){
            $id = Request::instance()->param('id','');
            if (empty($id)){
                $status = 0;
            }else{
                $db = $this->db;
                $status = Db::connect($db)->table('comment')->where('id',$id)->whereOr('p_id',$id)->delete();
            }
            if ($status){
                exit('200');
            }else{
                exit('400');
            }

        }
    }

}