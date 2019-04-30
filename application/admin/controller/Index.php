<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/2
 * Time: 16:09
 */

namespace app\admin\controller;


use app\admin\model\Auths;
use think\Db;
use think\Exception;
use think\Request;
use think\Session;

class Index extends Controllers
{

    const KEY = 'UJHL45TGNKS452GHASLHF8';
    /**
     * 管理员后台首页
     * @return \think\response\View
     */
    public function index(){

        $data = Db::query("select * from users where types=2");
        $this->assign('data',$data);
        return view('index');
    }

    public function test(){
        return view('test');
    }

    /**
     * 权限设置
     */
    public function auths(){
        $id = Request::instance()->param('id','');
        if (empty($id)){
            $this->error('不存在此用户');
        }

        $sql = "select * from auths where user_id={$id}";
        $data = Db::query($sql);
        $this->assign('data',$data);
        return view('auths');
    }

    /**
     * 语言设置
     */
    public function set_lang(){
        if (Request::instance()->isPost()){
            $host_id = Request::instance()->param('host_id','');
            $host_lang = Request::instance()->param('host_lang','');
            if (empty($host_id) || empty($host_lang)){
                $this->error('参数错误');
            }

            try{
                $status =Db::table('auths')->where('id', $host_id)->update(['lang' => $host_lang]);
                if ($status){
                    $this->success('语言修改成功');
                }else{
                    $this->error('语言修改失败');
                }
            }catch (Exception $exception){
                $this->error('语言修改失败');
            }


        }
    }

    /**
     * 域名添加
     */
    public function add(){
        if (Request::instance()->isPost()){
            $domain = Request::instance()->param('domain','');
            $lang = Request::instance()->param('lang','');
            $uid = Request::instance()->param('id','');

            if (empty($domain) || empty($lang) || empty($uid)){
                $this->error('参数错误');
            }
            try {
                $auths = new Auths();
                $auths->user_id = $uid;
                $auths->domain = $domain;
                $auths->lang = $lang;
                $status = $auths->save();
                if ($status) {
                    $this->success('添加成功');
                } else {
                    $this->error('添加错误');
                }
            }catch (Exception $exception){
                $this->error('出现错误');
            }

        }
    }

    /**
     * 域名删除
     */
    public function delete(){

            $id = Request::instance()->param('id','');

            if (empty($id)){
                $this->error('参数错误');
            }

            try{
                $status = Auths::where('id',$id)->delete();

                if ($status){
                    $this->success('删除成功');
                }else{
                    $this->error('删除失败');
                }
            }catch (Exception $exception){
                $this->error('删除失败');
            }
        }





}