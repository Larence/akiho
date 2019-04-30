<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/8
 * Time: 11:02
 */
return [
    'template'  =>  [
        'layout_on'     =>  false,
        'layout_name'   =>  '/layout/base',
    ],

    'captcha'  => [
        // 验证码字符集合
        'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
        // 验证码字体大小(px)，根据所需进行设置验证码字体大小
        'fontSize' => 30,
        // 是否画混淆曲线
        'useCurve' => true,
        // 验证码图片高度，根据所需进行设置高度
        'imageH'   => '',
        // 验证码图片宽度，根据所需进行设置宽度
        'imageW'   => '',
        // 验证码位数，根据所需设置验证码位数
        'length'   => 4,
        // 验证成功后是否重置
        'reset'    => true
    ],


    // 连接中文数据库
    'db_cn' => [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => 'localhost',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '',
        // 数据库名称
        'database' => 'custom_cn',
        // 端口
        'hostport'        => '3306',
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
    ],
    // 连接英语数据库
    'db_en' => [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => 'localhost',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '',
        // 数据库名称
        'database' => 'custom_en',
        // 端口
        'hostport'        => '3306',
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
    ],
    // 连接德语数据库
    'db_de' => [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => 'localhost',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '',
        // 数据库名称
        'database' => 'custom_de',
        // 端口
        'hostport'        => '3306',
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
    ],

    // 连接西班牙数据库
    'db_es' => [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => 'localhost',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '',
        // 数据库名称
        'database' => 'custom_es',
        // 端口
        'hostport'        => '3306',
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
    ],
    // 连接法语数据库
    'db_fr' => [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => 'localhost',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '',
        // 数据库名称
        'database' => 'custom_fr',
        // 端口
        'hostport'        => '3306',
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
    ],
    // 连接日语语数据库
    'db_ja' => [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => 'localhost',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '',
        // 数据库名称
        'database' => 'custom_ja',
        // 端口
        'hostport'        => '3306',
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
    ],

    // 连接韩语数据库
    'db_ko' => [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => 'localhost',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '',
        // 数据库名称
        'database' => 'custom_ko',
        // 端口
        'hostport'        => '3306',
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
    ],
    // 连接葡萄牙语数据库
    'db_py' => [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => 'localhost',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '',
        // 数据库名称
        'database' => 'custom_py',
        // 端口
        'hostport'        => '3306',
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
    ],
    // 连接俄语数据库
    'db_ru' => [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => 'localhost',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => '',
        // 数据库名称
        'database' => 'custom_ru',
        // 端口
        'hostport'        => '3306',
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
    ],

];