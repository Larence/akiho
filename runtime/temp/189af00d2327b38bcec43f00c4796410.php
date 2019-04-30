<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\xampp\htdocs\lang\public/../application/member\view\infor\index.html";i:1556610848;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>产品发布</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/layui/css/layui.css" />
    <style type="text/css">
        .layui-upload-img {
            width: 92px;
            height: 92px;
            margin: 0 10px 10px 0;
        }
        .layui-layedit{
            background: #fff;
        }
        .layui-table-cell {
            height: 92px;
        }

    </style>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">

    <div class="layui-card">
        <div class="layui-card-header">发布资讯</div>
        <div class="layui-card-body" style="padding: 15px; margin: 30px; background-color: #F2F2F2;">
            <form class="layui-form" onsubmit="return false" lay-filter="component-form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="layui-form-item">
                    <label class="layui-form-label">文章标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" required lay-verify="required" value="<?php echo $title; ?>" autocomplete="off" placeholder="请输入" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">展示图</label>
                    <input type="hidden" name="pic" id="infor_pic" value="<?php echo $pic; ?>">
                    <div class="layui-input-block">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn infor_pic" >选择图片</button>
                            <div class="layui-upload-list">
                                <img class="layui-upload-img" id="infor_upload_img" <?php if($pic){echo "src='/static".$pic."'";}?>>
                                <p class="demoText_logo"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">文章概述</label>
                    <div class="layui-input-block">
                        <textarea name="intro" lay-verify="required"  class="layui-textarea"><?php echo $intro; ?></textarea>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">文章内容</label>
                    <div class="layui-input-block">
                        <div style="margin-bottom: 20px; height: 400px;">
                            <textarea class="layui-textarea" name="contents" id="contents" lay-verify="contents"  style="display: none;"><?php echo $contents; ?></textarea>
                        </div>
                    </div>
                </div>


                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <div class="layui-footer" style="left: 0;">
                            <button class="layui-btn" lay-submit="" lay-filter="submit_btn">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <button class="open_iframe layui-tab" lay-filter="open_iframe" lay-href="/infor/detail">按钮</button>

        <div class="layui-card-body layui-admin-card-body" style="margin: 30px; background-color: #F2F2F2;">
            <h3 style="text-align: center">资讯列表</h3>
            <table id="infor_datatable" lay-filter="infor_table"></table>
            <script type="text/html" id="barDemo">
                <a class="layui-btn layui-btn-warm layui-btn-xs" href="javascript:;" lay-event="detail">详情</a>
                <a class="layui-btn layui-btn-xs" href="javascript:;" lay-event="edit">编辑</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
            </script>
        </div>
    </div>


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
        </div>
    </div>


</div>


<script src="/static/layui/layui.js"></script>

<script>
    layui.use(['element','upload','form','layer','laydate','layedit','table'], function(){
        var $ = layui.jquery,
            element = layui.element,
            layer = layui.layer,
            laydate = layui.laydate,
            form = layui.form,
            upload = layui.upload,
            layedit = layui.layedit,
            table = layui.table;


        //普通单张图片上传
        upload.render({
            elem: '.infor_pic',
            url: '/upload/share_pic',
            data:{'file_name':'infor'},
            before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#infor_upload_img').attr('src', result); //图片链接（base64）
                });
            }
            , done: function (res) {
                //如果上传失败
                if (res.code == 200) {
                    $('#infor_upload_img').attr('src','/static'+res.src);
                    $("#infor_pic").val(res.src);
                    layer.msg('上传成功', {icon: 1})
                } else {
                    layer.msg('上传失败', {icon: 2})
                }
            }

        });




        //构建一个默认的编辑器
        var index = layedit.build('contents',{
            uploadImage:{
                url:'/upload/infor_pic',
                type:'post'
            }
        });

        //表单信息验证
        form.verify({
            // 将富文本内容同步到表单
            contents: function(value) {
                return layedit.sync(index);
            }
        });

        // 表单监听实现ajax上传
        form.on('submit(submit_btn)', function (data) {
            var param = data.field;//定义临时变量获取表单提交过来的数据，非json格式
            var params = JSON.stringify(param);//测试是否获取到表单数据，调试模式下在页面控制台查看
            params = JSON.parse(params);
            delete params.file;  // 移除空字符file
            if (params.pic.length==0){
                layer.msg('请上传展示图片', {icon: 5})
                return false;
            }

            if (params.contents.length==0){
                layer.msg('文章内容不能为空', {icon: 5});
                return false;
            }

            $.ajax({
                url:"/infor/index",
                type:'post',
                dataType:'json',
                contentType:"application/x-www-form-urlencoded; charset=UTF-8",
                scriptCharset:"utf-8",
                data:params,//表格数据序列化
                success:function(res){
                    if (res == 200){
                        parent.layer.alert('操作成功！！！',{icon:1});
                        window.location.href = "/infor/index";
                    } else {
                        parent.layer.alert('操作失败！！！',{icon:5});
                    }
                },
                error:function(){
                    parent.layer.alert('操作失败！！！',{icon:5});
                }
            });


        });


        table.render({
            elem: '#infor_datatable'
            ,method:'post'
            ,url: '/infor/lists' //数据接口
            ,loading:true
            ,page: true //开启分页
            ,cols: [[
                {field:'id', title:'ID', width:60, fixed: 'left', unresize: true, sort: true},
                {field:'user_id', title:'用户ID', width:80},
                {field:'title', title:'文章标题', width:120},
                {field:'pic', title:'展示图',height:92,templet:function (res) {
                        return "<img class='layui-upload-img' src='/static"+res.pic+"' >";
                    }},
                {field:'intro', title:'文章概述', width:120},
                {field:'create_time', title:'加入时间', width:150,templet:function (res) {
                        return createTime(res.create_time);
                    }},
                {fixed: 'right', title:'操作', toolbar: '#barDemo', width:180}
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

        //监听工具条
        table.on('tool(infor_table)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）

            if(layEvent === 'del'){ //删除
                layer.confirm('真的删除行么', function(index){
                    var p_id = data.id;
                    $.ajax({
                        url:"/infor/delete",
                        type:'post',
                        dataType:'json',
                        data:{id:p_id},//表格数据序列化
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
            }else if(layEvent === 'detail') {
                var p_id = data.id;
                var title = data.title;
                var url = "/infor/detail";
                infor_detail(title,url,p_id);
            }else if(layEvent === 'edit'){
                var p_id = data.id;
                window.location.href="/infor/index?id="+p_id;
            }
        });

        function infor_detail(title,url,id){
            var  flag = true;
            var urls = url+"?id="+id;
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
    });
</script>

</body>
</html>