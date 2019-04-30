<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\xampp\htdocs\lang\public/../application/member\view\account\pwd.html";i:1556603431;}*/ ?>
<html><head>
    <meta charset="utf-8">
    <title>设置我的密码</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/static/layui/css/layui.css" />
    <style type="text/css">
        .layui-admin-card-header{
            padding: 15px;
        }
    </style>
</head>
<body>
<div class="layui-fluid">

    <div class="layui-card">
        <div class="layui-form layui-card-header layui-admin-card-header">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>修改密码</legend>
            </fieldset>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" onsubmit="return false">
                <div class="layui-form-item">
                    <label class="layui-form-label">当前密码</label>
                    <div class="layui-input-inline">
                                <input type="password" name="oldPassword" lay-verify="required" lay-vertype="tips" class="layui-input">
                            </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">新密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password" lay-verify="pass" lay-vertype="tips" autocomplete="off" id="LAY_password" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">6到16个字符</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">确认新密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="repassword" lay-verify="repass" lay-vertype="tips" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit="" lay-filter="setmypass">确认修改</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="/static/layui/layui.js"></script>
<script>
    layui.use('form',function(){
        var $ = layui.jquery,
            form = layui.form;

        form.verify({
            pass: [/^[\S]{6,12}$/, "密码必须6到12位，且不能出现空格"],
            repass: function (t) {
                if (t !== $("#LAY_password").val()) return "两次密码输入不一致"
            }
        })

        // 表单监听实现ajax上传
        form.on('submit(setmypass)', function (data) {
            var param = data.field;//定义临时变量获取表单提交过来的数据，非json格式
            var params = JSON.stringify(param);//测试是否获取到表单数据，调试模式下在页面控制台查看
            params = JSON.parse(params);
            $.ajax({
                url:"/account/pwd",
                type:'post',
                dataType:'json',
                scriptCharset:"utf-8",
                data:params,//表格数据序列化
                success:function(res){
                    if (res == 200){
                        parent.layer.msg('操作成功！！！',{icon:1});
                    } else if (res == 401) {
                        parent.layer.msg('两次密码不同！！！',{icon:5});
                    }else if (res == 402) {
                        parent.layer.msg('原密码错误！！！',{icon:5});
                    }else{
                        parent.layer.msg('操作失败！！！',{icon:5});
                    }
                },
                error:function(){
                    parent.layer.msg('操作失败！！！',{icon:5});
                }
            });
        });

    })
</script>
</body>
</html>
