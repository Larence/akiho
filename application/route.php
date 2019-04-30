<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;


Route::rule('login/admin','index/login/admin');// 管理员登录
Route::rule('login/login','index/login/login');// 普通用户登录
Route::get('m_login','index/login/m_login'); // 管理员免密码登录用户







/**************************************管理员后台路由*********************************************/
Route::rule('admin/index','admin/index/index'); //管理员后台首页
Route::rule('admin/auths','admin/index/auths'); // 权限设置
Route::post('admin/set_lang','admin/index/set_lang'); // 语言设置
Route::get('admin/delete','admin/index/delete'); // 域名删除
Route::post('admin/add','admin/index/add'); // 域名添加
Route::rule('admin/member/index','admin/member/index'); // 用户管理
Route::post('admin/member/is_status','admin/member/is_status'); // 域名添加
Route::rule('admin/member/add','admin/member/add'); // 域名添加

Route::get('admin/resume/index','admin/resume/index'); //
Route::post('admin/resume/edit','admin/resume/edit'); // 域名添加
Route::rule('admin/resume/pwd','admin/resume/pwd'); // 修改密码
Route::get('admin/resume/logout','admin/resume/logout'); // 修改密码





/**************************************普通用户后台路由*********************************************/
Route::rule('member/index','member/index/index'); //
Route::rule('index/default','member/index/defaults'); // 普通用户后台首页
Route::get('index/set','member/index/set'); // 管理员免密码登录用户
Route::get('index/home','member/index/home'); // 管理员免密码登录用户
Route::get('index/info','member/index/info'); // 管理员免密码登录用户
Route::get('index/login','member/index/login'); // 管理员免密码登录用户
Route::get('index/reg','member/index/reg'); // 管理员免密码登录用户




Route::get('index/data','member/index/data'); // 管理员免密码登录用户
Route::post('index/edit_lang','member/index/edit_lang'); // 语言修改
Route::post('index/delete','member/index/delete'); // 站点删除

/**公司信息**/
Route::rule('company/index','member/company/index'); // 公司基本信息
Route::get('company/pic','member/company/pic'); // 网站图片管理(logo,轮播图,二维码)
Route::rule('company/cases','member/company/cases'); // 成功案例
Route::post('company/get_cases','member/company/get_cases'); // 成功案例
Route::post('company/del_cases','member/company/del_cases'); // 删除成功案例
Route::rule('company/honor','member/company/honor'); // 荣誉资质
Route::post('company/get_honor','member/company/get_honor'); // 获取荣誉资质
Route::post('company/del_honor','member/company/del_honor'); // 获取荣誉资质

/**产品**/
Route::rule('product/index','member/product/index'); // 发布产品
Route::get('product/lists','member/product/lists'); // 产品列表
Route::post('product/delete','member/product/delete'); // 删除产品
Route::get('product/detail','member/product/detail'); // 产品详情



/**资讯**/
Route::rule('infor/index','member/infor/index'); // 公司资讯
Route::post('infor/lists','member/infor/lists'); // 资讯列表
Route::post('infor/delete','member/infor/delete'); // 删除产品
Route::rule('infor/detail','member/infor/detail'); // 资讯详情
Route::rule('infor/get_comments','member/infor/get_comments'); // 资讯详情
Route::post('infor/add_comments','member/infor/add_comments'); // 回复评论
Route::rule('infor/comments','member/infor/comments'); // 评论列表
Route::post('infor/del','member/infor/del'); // 评论列表



/**互动信息**/
Route::get('message/inquiry','member/message/inquiry'); // 询盘
Route::post('message/get_inquiry','member/message/get_inquiry'); // 获取询盘
Route::get('message/board','member/message/board'); // 留言板
Route::post('message/get_board','member/message/get_board'); // 获取留言板
Route::post('message/is_contact','member/message/is_contact'); // 获取留言板


/**账户管理**/
Route::rule('account/index','member/account/index'); // 询盘
Route::rule('account/pwd','member/account/pwd'); // 询盘













/**图片上传**/
Route::post('upload/uni_pic','member/upload/uni_pic'); // 单图片上传
Route::post('upload/multi_pic','member/upload/multi_pic'); // 单图片上传
Route::post('upload/clear_multi','member/upload/clear_multi'); // 删除图片
Route::post('upload/share_pic','member/upload/share_pic'); // 图片上传
Route::post('upload/product_pic','member/upload/product_pic'); // 富文本编译器图片上传---产品详情
Route::post('upload/infor_pic','member/upload/infor_pic'); // 富文本编译器图片上传---资讯文章







