<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\xampp\htdocs\lang\public/../application/member\view\index\defaults.html";i:1556603431;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css" />

    <style>
        .layui-admin-card-header{
            padding: 15px;
        }
        .layui-admin-card-body{
            height: 500px;
        }
    </style>
</head>
<body class="layui-layout-body">
    <div class="layui-fluid">
        <div class="layui-card">
        <div class="layui-form layui-card-header layui-admin-card-header">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>网站列表</legend>
            </fieldset>
        </div>
        <div class="layui-card-body layui-admin-card-body">
            <table id="datatable" lay-filter="test"></table>
        </div>
    </div>
        <script type="text/html" id="barDemo">
            <a class="layui-btn layui-btn-xs" href="javascript:;" lay-event="edit">设置语言</a>
            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        </script>
    </div>

    <script src="/static/layui/layui.js"></script>
<!--语言设置弹出框-->
<div class="layui-row" id="popSearchRoleTest" style="display:none;">
    <style>
        body .layui-layer-page .layui-layer-content {
            overflow: visible;
        }
    </style>
    <div class="layui-col-md11">
        <form class="layui-form" onsubmit="return false" >
            <input type="hidden" name="aid" id="aid" value="">
            <input type="hidden" id="typename" value="">
            <div class="layui-form-item" style="margin-top: 25px">
                <label class="layui-form-label">选择语言</label>
                <div class="layui-input-block">
                    <select name="lang" id="layui_sel_lang" lay-verify="required">
                        <option value=""></option>
                        <option value="cn">中文</option>
                        <option value="en">英文</option>
                        <option value="es">西班牙语</option>
                        <option value="py">葡萄牙语</option>
                        <option value="ru">俄语</option>
                        <option value="fr">法语</option>
                        <option value="ja">日语</option>
                        <option value="ko">韩语</option>
                        <option value="de">德语</option>
                    </select>
                </div>
            </div>


            <div class="layui-form-item" style="margin-top: 25px">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                </div>
            </div>
        </form>
        <script>
            //Demo
            layui.use('form', function() {
                var form = layui.form
                ,$ = layui.jquery;
                form.render();
                //监听form表单提交事件
                form.on('submit(formDemo)', function (data) {
                    var param = data.field;//定义临时变量获取表单提交过来的数据，非json格式
                    var params = JSON.stringify(param);//测试是否获取到表单数据，调试模式下在页面控制台查看
                    params = JSON.parse(params);
                    $.ajax({
                        url:"/index/edit_lang",
                        type:'post',
                        dataType:'json',
                        data:{id:params.aid,lang:params.lang},//表格数据序列化
                        success:function(res){
                            if (res == 200){
                                layer.close(layer.index);
                                $('.layui-show').find('iframe')[0].contentWindow.location.reload(true);
                            } else {
                                layer.alert('修改失败！！！',{icon:5});
                            }
                        },
                        error:function(){
                            layer.alert('操作失败！！！',{icon:5});
                        }
                    });


                });
            })

        </script>

    </div>
</div>



<script>
    var json= {
        "cn": "中文",
        "en": "英文",
        "es": "西班牙语",
        "py": "葡萄牙语",
        "ru": "俄语",
        "fr": "法语",
        "ja": "日语",
        "ko": "韩语",
        "de": "德语"
    };

    layui.use('table',function(){
        var table = layui.table,
            $ = layui.jquery;
        //第一个实例
        table.render({
            elem: '#datatable'
            ,height: 450
            ,method:'post'
            ,url: 'default' //数据接口
            ,page: true //开启分页
            ,cols: [[
                // {type: 'checkbox', fixed: 'left'}
                {field:'id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true, totalRowText: '合计'}
                ,{field:'user_id', title:'用户名', width:120, edit: 'text'}

                ,{field:'domain', title:'网站域名', sort: true,templet:function (res) {
                    var domain = res.domain;
                    return "<a href='http://"+domain+"' class='layui-table-link' target='_blank'>"+domain+"</a>";
                }}
                ,{field:'lang', title:'语言', width:120, edit: 'text',templet:function (res) {
                        var lang = res.lang;
                        return json[lang];
                    }}
                ,{field:'create_time', title:'加入时间', width:250}
                ,{field:'update_time', title:'加入时间', width:250}
                ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:200}
            ]]
        });

        //监听工具条
        table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            var tr = obj.tr; //获得当前行 tr 的DOM对象

            if(layEvent === 'del'){ //删除
                layer.confirm('真的删除行么', function(index){
                    var domain_id = data.id;
                    $.ajax({
                        url:"delete",
                        type:'post',
                        dataType:'json',
                        data:{id:domain_id},//表格数据序列化
                        success:function(res){
                            if (res==200){
                                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                layer.close(index);
                            }else {
                                layer.alert('操作失败！！！',{icon:5});
                            }
                        },
                        error:function(){
                            layer.alert('操作失败！！！',{icon:5});
                        }
                    });

                });
            } else if(layEvent === 'edit'){ //编辑
                var title = data.domain+'站点语言设置';
                var domain_id = data.id;
                var lang = data.lang;
                $('#aid').val(domain_id);
                // 设置默认语言
                $("#popSearchRoleTest option").attr("selected", false);
                $("#popSearchRoleTest option[value='" + lang + "']").attr("selected", true);
                parent.layer.open({
                    //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
                    type: 1,
                    title: title,
                    area: ['30%', '200px'],
                    content: $("#popSearchRoleTest").html(),
                });
            }
        });

    });






</script>
</body>
</html>




