<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/22
 * Time: 14:00
 */

namespace app\member\controller;


use app\member\model\Auths;
use think\Db;
use think\Request;

class Message extends Controllers
{


    /**
     * 询盘
     */
    public function inquiry(){
        return view('inquiry');
    }

    /**
     * 获取询盘信息
     */
    public function get_inquiry(){
        if (Request::instance()->isPost()){
            $page = Request::instance()->param('page',1);
            $limit = Request::instance()->param('limit',10);
            $lang = $this->lang;
            $user_id = $this->user_id;
            $auths = new Auths();
            $data = $auths->where('user_id',$user_id)->where('lang',$lang)->column('id');
            if (empty($data)){
                exit(json_encode(["code"=>400,"msg"=>"暂无数据","count"=>0,'data'=>'']));
            }
            $c_id = $data[0];
            $db = $this->db;
            $data = Db::connect($db)->table('inquiry')->where('c_id',$c_id)->order('id desc')->limit(($page-1)*10,$limit)->select();
            $count = Db::connect($db)->table('inquiry')->where('c_id',$c_id)->count();
            exit(json_encode(["code"=>0,"msg"=>"","count"=>$count,'data'=>$data]));
        }
    }


    /**
     * 留言板
     */
    public function board(){
        return view('board');
    }

    /**
     * 获取留言板数据
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function get_board(){
        if (Request::instance()->isPost()){
            $page = Request::instance()->param('page',1);
            $limit = Request::instance()->param('limit',10);
            $lang = $this->lang;
            $user_id = $this->user_id;
            $auths = new Auths();
            $data = $auths->where('user_id',$user_id)->where('lang',$lang)->column('id');
            if (empty($data)){
                exit(json_encode(["code"=>400,"msg"=>"暂无数据","count"=>0,'data'=>'']));
            }
            $c_id = $data[0];
            $db = $this->db;
            $data = Db::connect($db)->table('board')->where('c_id',$c_id)->order('id desc')->limit(($page-1)*10,$limit)->select();
            $count = Db::connect($db)->table('board')->where('c_id',$c_id)->count();
            exit(json_encode(["code"=>0,"msg"=>"","count"=>$count,'data'=>$data]));
        }
    }

    /**
     * 是否已联系
     */
    public function is_contact(){
        if (Request::instance()->isAjax()){
            $type = Request::instance()->param('type','');
            $is_contact = Request::instance()->param('is_contact','');
            $id = Request::instance()->param('id','');

            if (empty($type) || empty($is_contact) || empty($id)){
                $s = 0;
            }else{
                $status = 0;
                if ($is_contact=='true'){
                    $status = 1;
                }
                $db = $this->db;
                if ($type=='inquiry'){
                    $s = Db::connect($db)->table('inquiry')->where('id',$id)->update(['is_contact'=>$status]);
                }else{
                    $s = Db::connect($db)->table('board')->where('id',$id)->update(['is_contact'=>$status]);
                }

            }

            if ($s){
                exit('200');
            }else{
                exit('400');
            }

        }
    }

}