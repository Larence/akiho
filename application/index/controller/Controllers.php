<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 10:58
 */

namespace app\index\controller;


use app\index\model\Auths;
use think\Controller;
use think\Cookie;
use think\Lang;
use think\Request;
use think\Session;

class Controllers extends Controller
{

    protected $db='db_cn';   // 数据库链接类型

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $hostname = $_SERVER['SERVER_NAME'];
        if (!Cookie::has('domain') || cookie('domain')!=$hostname){

            $auths = new Auths();
            $data = $auths->where('domain',$hostname)->select()->toArray();
            if (!empty($data)){
                $lang = $data[0]['lang'];
                $this->set_lang($lang);
                $this->db = "db_".$lang;
                setcookie('domain',$hostname,0, '/', 'custom.com');
            }
        }
    }


    /**
     * 语言设置
     * @param $lang
     */
    public function set_lang($lang){
        $lang = Lang::range($lang);//设定当前语言
        Lang::load(APP_PATH.DS.'lang'.DS.$lang.EXT,$lang); // 重新加载语言包
        cookie('think_var',$lang);
    }


}