<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\xampp\htdocs\lang\public/../application/member\view\account\index.html";i:1556603431;}*/ ?>
<html><head>
    <meta charset="utf-8">
    <title>设置我的资料</title>
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/static/layui/css/layui.css" />
    <style>
        .layui-admin-card-header{
            padding: 15px;
        }
        .layui-upload-img {
            width: 92px;
            height: 92px;
            margin: 0 10px 10px 0;
        }
    </style>
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
                <div class="layui-form layui-card-header layui-admin-card-header">
                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                        <legend>成功案例</legend>
                    </fieldset>
                </div>
                <div class="layui-card-body">
                    <form class="layui-form" onsubmit="return false">
                        <div class="layui-form-item">
                            <label class="layui-form-label">用户名</label>
                            <div class="layui-input-inline">
                                <input type="text" name="name" value="<?php echo $data['name']; ?>" lay-verify="name" autocomplete="off" placeholder="请输入昵称" class="layui-input">
                            </div>
                        </div>
                        <input type="hidden" name="pic" id="pic" value="<?php echo $data['pic']; ?>">
                        <div class="layui-form-item">
                            <label class="layui-form-label">案例图片</label>
                            <div class="layui-input-block">
                                <div class="layui-upload">
                                    <button type="button" class="layui-btn" id="head_pic" >选择图片</button>
                                    <div class="layui-upload-list">
                                        <img class="layui-upload-img" id="head_upload_img" <?php if($data['pic']){echo "src='/static".$data['pic']."'";}?> >
                                        <p class="demoText_logo"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">邮箱</label>
                            <div class="layui-input-inline">
                                <input type="text" name="email" value="<?php echo $data['email']; ?>" readonly class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">不可修改。一般用于后台登录</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">手机</label>
                            <div class="layui-input-inline">
                                <input type="tel" name="tel" value="<?php echo $data['tel']; ?>" lay-verify="tel" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="setmyinfo">确认修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>

<script src="/static/layui/layui.js"></script>
<script type="text/javascript">

    layui.use(['upload','form'],function(){
        var $ = layui.jquery,
            form = layui.form,
            upload = layui.upload;

        //普通单张图片上传
        upload.render({
            elem: '#head_pic',
            url: '/upload/share_pic',
            data:{'file_name':'head'},
            before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#head_upload_img').attr('src', result); //图片链接（base64）
                });
            }
            , done: function (res) {
                //如果上传失败
                if (res.code == 200) {
                    $('#head_upload_img').attr('src','/static'+res.src);
                    $("#pic").val(res.src);
                    layer.msg('上传成功', {icon: 1})
                } else {
                    layer.msg('上传失败', {icon: 2})
                }
            }

        });


        // 表单监听实现ajax上传
        form.on('submit(setmyinfo)', function (data) {
            var param = data.field;//定义临时变量获取表单提交过来的数据，非json格式
            var params = JSON.stringify(param);//测试是否获取到表单数据，调试模式下在页面控制台查看
            params = JSON.parse(params);
            delete params.file;  // 移除空字符file
            $.ajax({
                url:"/account/index",
                type:'post',
                dataType:'json',
                scriptCharset:"utf-8",
                data:params,//表格数据序列化
                success:function(res){
                    if (res == 200){
                        parent.layer.alert('操作成功！！！',{icon:1});
                        $(window.parent.document).find('.layui-show').find('iframe')[0].contentWindow.location.reload(true);
                    } else {
                        parent.layer.alert('操作失败！！！',{icon:5});
                    }
                },
                error:function(){
                    parent.layer.alert('操作失败！！！',{icon:5});
                }
            });


        });


    })

</script>

</body>
</html>
