<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/5
 * Time: 23:14
 */

namespace app\admin\controller;


use think\Controller;
use think\Request;

class Controllers extends Controller
{
    public $mid;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        if (!session('mid')){
            $this->redirect('/login/admin');
        }
        $this->mid = session('mid');

    }
}