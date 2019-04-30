<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/26
 * Time: 14:08
 */

namespace app\admin\controller;


use app\admin\model\Users;
use think\Exception;
use think\Request;

class Resume extends Controllers
{

    /**
     * 账户信息
     */
    public function index(){
        $mid = $this->mid;
        $users = new Users();
        $user = $users->where('id',$mid)->where('types',1)->select()->toArray();

        if (!empty($user)){
            $name = $user[0]['name'];
            $tel = $user[0]['tel'];
            $email = $user[0]['email'];
            $pic = $user[0]['pic'];
        }else{
            $name = '';
            $tel = '';
            $email = '';
            $pic = '';
        }
        $this->assign('name',$name);
        $this->assign('tel',$tel);
        $this->assign('email',$email);
        $this->assign('pic',$pic);

        return view('index');
    }

    /**
     * 信息修改
     */
    public function edit(){
        if (Request::instance()->isPost()){
            $data = array_filter($_POST);
          if (count($data)!=4){
              $this->error('修改失败');
          }else{
              $mid = $this->mid;
              $data['update_time'] = time();
              try{
                  $users = new Users();
                  $status = $users->where('id',$mid)->update($data);
              }catch (Exception $exception){
                  $status = 0;
              }
              if ($status){
                  $this->success('修改成功');
              }else{
                  $this->error('修改失败');
              }


          }
        }
    }

    /**
     * 密码修改
     */
    public function pwd(){
        if (Request::instance()->isPost()){
            $data = array_filter($_POST);
            if (count($data)!=3){
                $this->error('数据出现错误');
            }

            if ($data['new_pwd']!=$data['re_pwd']){
                $this->error('两次密码不同');
            }

            $mid = $this->mid;
            $users = new Users();
            $user = $users->where('id',$mid)->select()->toArray();
            $status = 0;
            if (!empty($user)){
                if (md5($data['old_pwd']) == $user[0]['password']){
                    $status = $users->where('id',$mid)->update(['password'=>md5($data['new_pwd']),'update_time'=>time()]);
                }else{
                    $this->error('原密码错误');
                }
            }
            if ($status){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }

        }
        return view('pwd');
    }


    /**
     * 退出登录
     */
    public function logout(){
        // 删除（当前作用域）
        session('manage_user', null);
        session('mid', null);
        session('m_types', null);
        $this->redirect('/login/admin');
    }


}