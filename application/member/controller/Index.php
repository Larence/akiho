<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 9:58
 */

namespace app\member\controller;




use app\member\model\Users;
use app\member\model\Auths;
use think\Db;
use think\Exception;
use think\Lang;
use think\Request;

class Index extends Controllers
{

    /**
     * 普通用户后台
     */
    public function index(){
        // 设置当前语言后台
        if (Request::instance()->isAjax()){
            $lang = Request::instance()->param('lang','');
            if (empty($lang)){
                exit('400');
            }
            session('lang',$lang);
            exit('200');
        }
        $user_id = $this->user_id;
        $lang = $this->lang;

        $users = new Users();
        $user = $users->where('id',$user_id)->select()->toArray();
        $this->assign('user',$user[0]);
        $auths = new Auths();
        $data = $auths->where('user_id',$user_id)->select()->column('lang');
        $this->assign('data',$data);
        $this->assign('lang',$lang);
        return view('index');
    }



    /**
     * 默认页
     */
    public function defaults(){
        if (Request::instance()->isAjax()){
            $page = Request::instance()->param('page',1);
            $limit = Request::instance()->param('limit',10);
            $auths = new Auths();
            $user_id = $this->user_id;
            $count = 0;
            $data = $auths->where('user_id',$user_id)->limit(($page-1)*10,$limit)->select()->toArray();
            $count = $auths->where('user_id',$user_id)->count();

            exit(json_encode(["code"=>0,"msg"=>"","count"=>$count,'data'=>$data]));

        }
        return view('defaults');
    }

    /**
     * 语言修改
     */
    public function edit_lang(){
        if (Request::instance()->isAjax()){
            $id = Request::instance()->param('id','');
            $lang = Request::instance()->param('lang','');
            if (empty($id) || empty($lang)){
                exit('400');
            }

            try{
                $auths = new Auths();
                $status = $auths->where('id',$id)->update(['lang' => $lang]);
                if ($status){
                    exit('200');
                }else{
                    exit('400');
                }

            }catch (Exception $exception){
                exit('400');
            }

        }
    }

    /**
     * 删除
     */
    public function delete(){
        if (Request::instance()->isAjax()){
            $id = Request::instance()->param('id','');
            if (empty($id)){
                exit('400');
            }
            try{
                $auths = new Auths();
                $status =  $auths->where('id',$id)->delete();
                if ($status){
                    exit('200');
                }else{
                    exit('400');
                }
            }catch (Exception $exception){
                exit('400');
            }
        }
    }

    /**
     * 退出登录
     */
    public function logout(){
        // 删除（当前作用域）
        session('user', null);
        session('user_id', null);
        session('types', null);
        session('lang', null);
        $this->redirect('/login/login');
    }




}