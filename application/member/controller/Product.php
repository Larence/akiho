<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/15
 * Time: 16:21
 */

namespace app\member\controller;


use think\Db;
use think\Request;

class Product extends Controllers
{

    /**
     * 发布产品
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
                $status = Db::connect($db)->table('product')->where('id',$id)->update($data);
            }else{
                // 添加新数据
                $data['create_time'] = time();
                $data['update_time'] = time();
                $data['user_id'] = $user_id;
                $status = Db::connect($db)->table('product')->insert($data);
            }
            if ($status){
                return '200';
            }else{
                return '400';
            }
        }

        $name ="";
        $pic ="";
        $price ="";
        $mode ="";
        $origin ="";
        $date ="";
        $logistics ="";
        $address ="";
        $intro ="";
        $details ="";
        $id = Request::instance()->param('id',0);
        if ($id){
            $data = Db::connect($db)->table('product')->where('id',$id)->select();
            if(!empty($data)){
                $name       = $data[0]["name"];
                $pic        = $data[0]["pic"];
                $price      = $data[0]["price"];
                $mode       = $data[0]["mode"];
                $origin     = $data[0]["origin"];
                $date       = $data[0]["date"];
                $logistics  = $data[0]["logistics"];
                $address    = $data[0]["address"];
                $intro      = $data[0]["intro"];
                $details    = $data[0]["details"];
            }
        }
        $this->assign('id',$id);
        $this->assign('name',$name);
        $this->assign('pic',$pic);
        $this->assign('price',$price);
        $this->assign('mode',$mode);
        $this->assign('origin',$origin);
        $this->assign('date',$date);
        $this->assign('logistics',$logistics);
        $this->assign('address',$address);
        $this->assign('intro',$intro);
        $this->assign('details',$details);
        return view('index');
    }

    /**
     * 产品列表
     */
    public function lists(){
        $user_id = $this->user_id;
        $db = $this->db;
        $data = Db::connect($db)->table('product')->where('user_id',$user_id)->order('id desc')->select();
        $this->assign('data',$data);
        return view('lists');
    }


    /**
     * 管理产品
     */
    public function detail(){
        $id = Request::instance()->param('id',0);
        $db = $this->db;
        $data = Db::connect($db)->table('product')->where('id',$id)->select();
//        echo "<pre>";print_r($data);echo "<pre>";die();
        $this->assign('data',$data);
        return view('detail');
    }

    /**
     * 删除产品
     */
    public function delete(){
        if (Request::instance()->isAjax()){
            $id = Request::instance()->param('id','');
            if (empty($id)){
                return "400";
            }

            $db = $this->db;
            $user_id = $this->user_id;
            $status = Db::connect($db)->table('product')->where('id',$id)->delete();
            if ($status){
                return "200";
            }else{
                return "400";
            }
        }
    }

}