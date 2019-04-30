<?php
namespace app\index\controller;

use think\Config;
use think\Controller;
use think\Db;
use think\Lang;

class Index extends Controllers
{
    public function index()
    {

        return view('index');
    }
}
