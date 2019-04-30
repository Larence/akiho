<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\xampp\htdocs\lang\public/../application/member\view\infor\comments.html";i:1556611082;}*/ ?>
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
    </style>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form layui-card-header layui-admin-card-header">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>评论列表</legend>
            </fieldset>
        </div>
        <div class="layui-card-body layui-admin-card-body">
            <table id="comments_datatable" lay-filter="comments_test"></table>
        </div>
    </div>
    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
</div>

<script src="/static/layui/layui.js"></script>


<script>

    layui.use('table',function(){
        var table = layui.table,
            $ = layui.jquery;
        //第一个实例
        table.render({
            elem: '#comments_datatable'
            ,method:'post'
            ,url: '/infor/comments' //数据接口
            ,loading:true
            ,page: true //开启分页
            ,cols: [[
                {field:'id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true}
                ,{field:'name', title:'评论者', width:120}
                ,{field:'email', title:'邮箱', sort: true,width:150}
                ,{field:'tel', title:'联系电话', width:120}
                ,{field:'title', title:'文章名称', width:120,templet:function (res) {
                        return "<a class='click_detail' lay-href='/infor/detail?id="+res.infor_id+"'>"+res.title+"</a>";
                    }}
                ,{field:'contents', title:'评论内容'}
                ,{field:'create_time', title:'加入时间', width:250,templet:function (res) {
                    return createTime(res.create_time);
                }}
                ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:120}
            ]]
            ,done: function(res, curr, count){
                var height = $(document).height(); // 文档流高度
                // 动态修改iframe高度
                $(window.parent.document).find('.layui-show').find('iframe')[0].height=height;
                $('.layui-card').css('height',height);
            }
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

        $(".layui-card-body").on('click','.click_detail',function () {
                if($(this).attr("lay-href")!=undefined) {
                    var  flag = true;
                    var urls =$(this).attr("lay-href");
                    var title = $(this).text();
                    $(window.parent.document).find(".layui-tab-title li").each(function(i,e){
                        if($(this).attr("lay-id")==urls){
                            //切换选项卡
                            parent.layui.element.tabChange('pagetabs', urls);
                            flag = false;
                        }
                    })

                    if(flag){
                        //新增选项卡
                        parent.layui.element.tabAdd('pagetabs', {
                            title: '详情-'+title
                            ,content: '<iframe src="'+urls+'" class="layui-admin-iframe" scrolling="no" frameborder="0" width="100%"></iframe>'
                            ,id: urls
                        });
                        //切换选项卡
                        parent.layui.element.tabChange('pagetabs', urls);
                    }
                }

            })

        //监听工具条
        table.on('tool(comments_test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            var tr = obj.tr; //获得当前行 tr 的DOM对象

            if(layEvent === 'del'){ //删除
                parent.layer.confirm('真的删除行么', function(index){
                    var id = data.id;
                    $.ajax({
                        url:"/infor/del",
                        type:'post',
                        dataType:'json',
                        data:{id:id},//表格数据序列化
                        success:function(res){
                            if (res==200){
                                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                parent.layer.close(index);
                            }else {
                                layer.msg('操作失败！！！',{icon:5});
                            }
                        },
                        error:function(){
                            layer.msg('操作失败！！！',{icon:5});
                        }
                    });

                });
            }
        });


    });

</script>
</body>
</html>
