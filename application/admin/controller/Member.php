<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/25
 * Time: 16:39
 */

namespace app\admin\controller;


use app\admin\model\Users;
use think\Exception;
use think\Request;

class Member extends Controllers
{

    /**
     * 用户列表
     */
    public function index(){
        if (Request::instance()->isAjax()){
            $page = Request::instance()->param('page',1);
            $limit = Request::instance()->param('limit',10);
            $user = new Users();
            $data = $user->where('types',2)->order('id desc')->limit(($page-1)*$limit,$limit)->select()->toArray();
            $count = $user->where('types',2)->count();
            if ($count==0){
                exit(json_encode(["code"=>400,"msg"=>"暂无数据","count"=>$count,'data'=>""]));
            }else{
                exit(json_encode(["code"=>0,"msg"=>"","count"=>$count,'data'=>$data]));
            }
        }
        return view('index');
    }


    /**
     * 封号处理
     */
    public function is_status(){
        if (Request::instance()->isAjax()){
            $id = Request::instance()->param('id','');
            $status = Request::instance()->param('status','');

            if (empty($id) || empty($status)){
                $s = 0;
            }else{
                $user = new Users();
                if ($status=='-1'){
                    $status = 0;
                }
                $s = $user->where('id',$id)->update(['status'=>$status,'update_time'=>time()]);
            }
            if ($s){
                exit('200');
            }else{
                exit('400');
            }
        }
    }

    /**
     * 添加用户
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function add(){
        if (Request::instance()->isPost()){
            $id = Request::instance()->param('id',0);
            $data = $_POST;
            $user = new Users();
            if ($id){
                $datas = array_filter($data);
                if (count($datas) !=4){
                    $this->error("参数错误");
                }
                $datas['update_time'] = time();
                unset($datas['id']);
                $status = $user->where('id',$id)->update($datas);
                if ($status){
                    $this->success('修改成功');
                }else{
                    $this->error('修改失败');
                }
            }else{
                $datas = array_filter($data);
                if (count($datas) < count($data)){
                    $this->error("参数错误");
                }
                try{
                    $datas['create_time'] = time();
                    $datas['update_time'] = time();
                    $datas['password'] = md5($data['password']);
                    $status = $user->insert($datas);
                }catch (Exception $exception){
                    $status = 0;
                }
                if ($status){
                    $this->success('添加成功');
                }else{
                    $this->error('添加失败');
                }
            }

        }

        $id = Request::instance()->param('id',0);
        $user = new Users();
        $data = $user->where('id',$id)->select()->toArray();
        $this->assign('data',$data);
        return view('add');
    }

}