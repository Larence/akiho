<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23
 * Time: 9:19
 * 账户管理
 */

namespace app\member\controller;


use app\member\model\Users;
use think\Db;
use think\Request;

class Account extends Controllers
{

    /**
     * 基本信息
     */
    public function index(){
        $user_id = $this->user_id;
        if (Request::instance()->isAjax()){
            $name = Request::instance()->param('name','');
            $email = Request::instance()->param('email','');
            $pic = Request::instance()->param('pic','');
            $tel = Request::instance()->param('tel','');
            if (empty($name) || empty($email) || empty($pic) || empty($tel)){
                exit('400');
            }else{
                $user = new Users();
                $status = $user->where('id',$user_id)->update(['name'=>$name,'email'=>$email,'pic'=>$pic,'tel'=>$tel,'update_time'=>time()]);
                if ($status){
                    exit('200');
                }else{
                    exit('400');
                }
            }
        }else{
            $user = new Users();
            $data = $user->where('id',$user_id)->select()->toArray();
            if (empty($data)){
                return view('error/error');
            }
            $this->assign('data',$data[0]);
            return view('index');
        }

    }

    /**
     * 密码修改
     */
    public function pwd(){
        if (Request::instance()->isAjax()){
            $old_pwd = Request::instance()->param('oldPassword','');
            $pwd = Request::instance()->param('password','');
            $repwd = Request::instance()->param('repassword','');
            if (empty($old_pwd) || empty($pwd) || empty($repwd)){
                $status = 0;
            }else{
                if ($pwd != $repwd){
                    $status = 2;
                }else{
                    $status = 0;
                    $user_id = $this->user_id;
                    $user = new Users();
                    $data = $user->where('id',$user_id)->select()->toArray();
                    if (!empty($data)){
                        if (md5($old_pwd) != $data[0]['password']){
                            $status =3;
                        }else{
                            $status = $user->where('id',$user_id)->update(['password'=>md5($pwd)]);
                        }
                    }
                }
            }
            if ($status==1){
                exit('200');
            }elseif ($status==2){
                exit('401');
            }elseif ($status==3){
                exit('402');
            }else{
                exit('400');
            }
        }
        return view('pwd');
    }

}