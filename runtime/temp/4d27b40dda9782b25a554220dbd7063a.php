<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\xampp\htdocs\lang\public/../application/member\view\message\inquiry.html";i:1556603433;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>询盘列表</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css" />
    <style>
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
                <legend>询盘列表</legend>
            </fieldset>
        </div>
        <div class="layui-card-body layui-admin-card-body">
            <table id="inquiry-datatable" lay-filter="inquiry-test"></table>
        </div>
    </div>

    <script type="text/html" id="switchTpl">
        <input type="checkbox" name="is_contact" value="{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="is_contact" {{ d.is_contact == 1 ? 'checked':''}}>
    </script>

</div>

<script src="/static/layui/layui.js"></script>

<script>

    layui.use(['table','form'],function(){
        var table = layui.table,
            form = layui.form,
            $ = layui.jquery;
        //第一个实例
        table.render({
            elem: '#inquiry-datatable'
            ,method:'post'
            ,url: '/message/get_inquiry' //数据接口
            ,loading:true
            ,page: true //开启分页
            ,cols: [[
                {field:'id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true}
                ,{field:'name', title:'用户名', width:120}
                ,{field:'email', title:'邮箱', sort: true,width:250}
                ,{field:'tel', title:'联系电话', width:150}
                ,{field:'contents', title:'询盘内容'}
                ,{field:'is_contact', title:'是否联系',templet: '#switchTpl', unresize: true}
                ,{field:'create_time', title:'加入时间', width:250,templet:function (res) {
                        return createTime(res.create_time);
                    }}
            ]]
            ,done: function(res, curr, count){
                var height = $(document).height(); // 文档流高度
                // 动态修改iframe高度
                $(window.parent.document).find('.layui-show').find('iframe')[0].height=height;
                $('.layui-card').css('height',height);
            }
        });

        //监听性别操作
        form.on('switch(is_contact)', function(obj){
            var is_contact = obj.elem.checked;
            if (is_contact){
                is_contact = 'true';
            }else {
                is_contact = 'false';
            }
            var id = this.value;

            $.ajax({
                url:"/message/is_contact",
                type:'post',
                dataType:'json',
                data:{id:id,is_contact:is_contact,type:'inquiry'},//表格数据序列化
                success:function(res){
                    if (res=='200'){
                        layer.tips('修改成功', obj.othis);
                    }else {
                        layer.tips('修改失败', obj.othis);
                    }
                },
                error:function(){
                    layer.tips('修改失败', obj.othis);
                }
            });
        });


        // 时间戳转换为时间格式
        function createTime(v){
            var date = new Date(v*1000);
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            m = m<10?'0'+m:m;
            var d = date.getDate();
            d = d<10?("0"+d):d;
            var h = date.getHours();
            h = h<10?("0"+h):h;
            var M = date.getMinutes();
            M = M<10?("0"+M):M;
            var s = date.getSeconds();
            s = s<10?("0"+s):s;
            var str = y+"-"+m+"-"+d+" "+h+":"+M+":"+s;
            return str;
        }
    });






</script>
</body>
</html>




