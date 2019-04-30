<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/2
 * Time: 16:42
 */

namespace app\index\controller;


use think\Db;
use think\Request;
use think\Session;

class Login extends Controllers
{

    /**
     * 管理员登录
     * @return \think\response\View
     */
    public function admin(){
        if (Request::instance()->isPost()){
            $captcha = Request::instance()->param('captcha','');
            if(!captcha_check($captcha)){
                $this->error("验证码错误");
            }
            $email = Request::instance()->param('email','');
            $password = Request::instance()->param('password','');
            if (empty($email) || empty($password)){
                $this->error('账号或密码不能为空');
            }
            $data = Db::query("select * from users where email='{$email}' and types=1");
            if (empty($data)){
                $this->error('不存在此账号');
            }

            if ($data[0]['password'] = md5($password)){
                Session::set('manage_user',$data[0]);
                Session::set('mid',$data[0]['id']);
                Session::set('m_types',1); // 用户类型
                $this->success('登录成功','/admin/index');
            }else{
                $this->error('密码错误');
            }

        }
        return view('admin');
    }


    /**
     * 普通用户登录
     */
    public function login(){
        if (Request::instance()->isPost()){
            $captcha = Request::instance()->param('captcha','');
            if(!captcha_check($captcha)){
                $this->error("验证码错误");
            }
            $email = Request::instance()->param('email','');
            $password = Request::instance()->param('password','');
            if (empty($email) || empty($password)){
                $this->error('账号或密码不能为空');
            }
            $data = Db::query("select * from users where email='{$email}' and types=2");
            if (empty($data)){
                $this->error('不存在此账号');
            }

            if ($data[0]['password'] = md5($password)){
                Session::set('user',$data[0]);
                Session::set('user_id',$data[0]['id']);
                Session::set('types',2); // 用户类型
                Session::set('lang','cn'); // 用户类型
                $this->success('登录成功','/member/index');
            }else{
                $this->error('密码错误');
            }

        }
        return view('login');
    }


    /**
     * 免密码登录,即管理员登录用户后台
     */
    public function m_login(){
        // 判断是否是管理员登录
        if (!session('mid')){
            $this->error('非法操作');
        }

        $id = Request::instance()->param('id',0);
        $token = Request::instance()->param('token','');

        if (empty($id) || empty($token)){
            $this->error('参数错误');
        }
        $tokens = md5('UJHL45TGNKS452GHASLHF8'.'_'.$id.'_'.session('mid'));
        if ($token = $tokens){
            $data = Db::query("select * from users where id='{$id}' and types=2");
            if (empty($data)){
                $this->error('不存在此用户');
            }

            Session::set('user',$data[0]);
            Session::set('user_id',$data[0]['id']);
            Session::set('types',2); // 用户类型
            $this->redirect('/member/index');  // 重定向到用户后台
        }
    }


}