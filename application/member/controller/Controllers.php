<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/4
 * Time: 9:15
 */

namespace app\member\controller;


use app\member\model\Auths;
use think\Controller;
use think\Request;

class Controllers extends Controller
{
    public $user_id;
    public $company_id; // 当前公司id
    public $lang; // 当前语言
    public $db; // 当前连接的数据库
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        if (!session('user_id')){
            return $this->redirect('/login/login');
        }
        $this->user_id = session('user_id');
        if (session('lang')){
            $lang = session('lang');
        }else{
            $lang = "cn";
        }

        $auths = new Auths();
        $data = $auths->where('user_id',$this->user_id)->where('lang',$lang)->column('id');
        if (empty($data)){
            return $this->redirect('/login/login');
        }
        $this->company_id = $data[0];

        $this->lang = $lang;
        $this->db =  "db_".$lang;
    }

}