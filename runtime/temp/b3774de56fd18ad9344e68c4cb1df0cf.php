<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\xampp\htdocs\lang\public/../application/member\view\infor\detail.html";i:1556603432;}*/ ?>
<html>
<head>
    <meta charset="utf-8">
    <title>消息详情标题</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/layui/css/layui.css" />
    <link rel="stylesheet" href="//at.alicdn.com/t/font_24081_qs69ykjbea.css">
    <style type="text/css">
        .layuiAdmin-msg-detail .layui-card-header {
            height: auto;
            line-height: 30px;
            padding: 15px;
        }
        .layuiAdmin-msg-detail h1 {
            font-size: 16px;
        }
        .layui-card-header {
            position: relative;
        }
        .layuiAdmin-msg-detail .layui-card-body {
            padding: 15px;
        }
        .layadmin-text p {
            margin-bottom: 10px;
            text-indent: 2em;
        }
        img{
            max-width: 95%;
        }
    </style>
</head>
<body layadmin-themealias="default">
<div class="layui-fluid" id="LAY-app-message-detail">
    <div class="layui-card layuiAdmin-msg-detail">
        <?php if(!empty($data)){ ?>
            <div class="layui-card-header">
            <h1><?php echo $data[0]['title']; ?></h1>
            <p> <span><?php echo date('Y-m-d H:i:s',$data[0]['create_time']); ?></span> </p>
        </div>
            <div class="layui-card-body layui-text">
                <div class="layadmin-text" style="padding: 20px">
                    <blockquote class="layui-elem-quote"> <?php echo $data[0]['intro']; ?></blockquote>
                    <?php echo $data[0]['contents']; ?>
                </div>
                <div style="padding-top: 30px;">
                    <a href="javascript:;" layadmin-event="back" class="layui-btn layui-btn-primary layui-btn-sm">返回上级</a>
                </div>
        </div>
        <?php }?>
    </div>

    <style type="text/css">
        .detail-box {
            padding: 20px;
        }
        .comment-panel {
            margin-bottom: 15px;
            border-radius: 2px;
            background-color: #fff;
            box-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
        }
        .jieda {
            margin-bottom: 30px;
        }
        .jieda>li {
            position: relative;
            padding: 20px 0 10px;
            border-bottom: 1px dotted #DFDFDF;
        }
        .detail-about-reply {
            padding: 0 0 0 55px;
            background: none;
        }


        .detail-about {
            position: relative;
            line-height: 20px;
            padding: 15px 15px 15px 75px;
            font-size: 13px;
            color: #999;
        }
        .detail-about-reply .comment-avatar {
            position: absolute;
            left: 15px;
            top: 15px;
        }
        .comment-avatar img {
            display: block;
            width: 45px;
            height: 45px;
            margin: 0;
            border-radius: 2px;
        }
        .comment-detail-user {
            white-space: nowrap;
            overflow: hidden;
        }
        .comment-detail-user a {
            padding-right: 10px;
            font-size: 14px;
        }

        .comment-link {
            color: #01AAED;
        }
        .iconfont {
            font-family: "iconfont" !important;
            font-size: 16px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .detail-about-reply .detail-hits {
            left: 0;
            bottom: 0;
        }

        .detail-about .detail-hits {
            position: relative;
            top: 5px;
            line-height: 20px;
        }
        .detail-hits span {
            height: 20px;
            line-height: 20px;
        }

        .detail-about .detail-hits {
            position: relative;
            top: 5px;
            line-height: 20px;
        }

        .detail-body {
            margin: 25px 0 20px;
            min-height: 0;
            line-height: 24px;
            font-size: 14px;
            color: #333;
            word-wrap: break-word;
            padding-left: 20px;
        }

        .jieda-reply {
            position: relative;
        }
        .jieda-reply span {
            padding-right: 20px;
            color: #999;
            cursor: pointer;
        }
        .jieda-reply span .icon-zan {
            font-size: 22px;
        }

        .jieda-reply span i {
            margin-right: 5px;
            font-size: 16px;
        }

        .jieda-reply span em {
            font-style: normal;
        }
        .jieda-reply span .icon-svgmoban53 {
            position: relative;
            top: 1px;
        }
        .jieda-reply span i {
            margin-right: 5px;
            font-size: 16px;
        }

        .laypage-main {
            margin: 30px 0;
            border: 1px solid #009E94;
            border-right: none;
            border-bottom: none;
            font-size: 0;
        }

        .laypage-main .laypage-curr {
            background-color: #009E94;
            color: #fff;
        }

        .laypage-main span {
            margin: -1px;
            padding: 0 20px;
            line-height: 36px;
            border-right: 1px solid #009E94;
            border-bottom: 1px solid #009E94;
            font-size: 14px;
            cursor: pointer;
        }
        .laypage-main, .laypage-main * {
            box-sizing: border-box;
            display: inline-block;
            vertical-align: top;
        }

    </style>
    <div class="layui-card">
        <div class="comment-panel detail-box" id="commentReply">
            <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
                <legend>评论</legend>
            </fieldset>
            <!--<input type="hidden" id="infor_id" value="<?php echo $_GET['id']; ?>">-->
            <ul class="jieda" id="jieda">
                <?php if(!empty($comments)){ foreach($comments as $vt){  ?>
                        <li>
                            <div class="detail-about detail-about-reply">
                                <a class="comment-avatar">
                                    <img src="/static/avatar.jpg" alt="<?php echo $vt[0]['name']; ?>">
                                </a>
                                <div class="comment-detail-user">
                                    <a class="comment-link"> <cite><?php echo $vt[0]['name']; ?></cite> </a>
                                </div>
                                <div class="detail-hits"><span><?php echo date('Y-m-d H:i:s',$vt[0]['create_time']); ?></span></div>
                            </div>
                            <div class="detail-body layui-text jieda-body photos"><?php echo $vt[0]['contents']; ?></div>
                            <div class="jieda-sub-comments<?php echo $vt[0]['id']; ?>" style="height: auto;padding-left: 70px">
                                    <?php foreach($vt as $key=>$vs){ if($key!=0){ ?>
                                            <div class="detail-about detail-about-reply">
                                                <a class="comment-avatar">
                                                    <img src="/static<?php echo $vs['pic']; ?>" alt="<?php echo $vs['name']; ?>">
                                                </a>
                                                <div class="comment-detail-user">
                                                    <a class="comment-link"> <cite><?php echo $vs['name']; ?></cite></a>
                                                </div>
                                                <div class="detail-hits"><span><?php echo date('Y-m-d H:i:s',$vs['create_time']); ?></span></div>
                                            </div>
                                            <div class="detail-body layui-text jieda-body photos" style="margin: 0"><?php echo $vs['contents']; ?></div>
                                    <?php }}?>
                                </div>
                            <div class="jieda-reply">
                                <span class="jieda-zan " type="zan"> <i class="iconfont icon-zan"></i> <em>0</em> </span>
                                <span class="jieda-comment-reply" type="reply" data-id="<?php echo $vt[0]['id']; ?>"> <i class="iconfont icon-svgmoban53"></i>回复</span>
                            </div>
                        </li>
                    <?php }}?>
            </ul>

            <?php if($counts>1){ ?>
                <div style="text-align: center">
                    <input type="hidden" class="p_id" value="<?php echo $_GET['id']; ?>">
                    <div class="laypage-main">
                        <span class="pages laypage-pre" data-type="pre">上一页</span>
                        <span><a>1</a>/<?php echo $counts; ?></span>
                        <span class="pages laypage-next" data-type="next">下一页</span>
                        <span class="pages laypage-last" title="尾页" data-type="last" pages="<?php echo $counts; ?>">尾页</span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="/static/layui/layui.js"></script>
<!--回复框-->
<div class="layui-row" id="popup-reply" style="display:none;">
    <form class="layui-form" onsubmit="return false" >
        <input type="hidden" name="id" id="p_id" value="">
        <input type="hidden" name="infor_id" id="infor_id" value="<?php echo $_GET['id']; ?>">
        <textarea class="layui-textarea textarea-contents" name="contents" placeholder="请输入回复内容..." style="width:92%;margin:25px 4%;"></textarea>
        <button class="layui-btn comment-submit" style="display:block;margin: 0 auto" lay-submit lay-filter="formDemo">立即提交</button>
    </form>
    <script>
        layui.use(['element','form','layer'], function() {
            var $ = layui.jquery;
            $('.comment-submit').click(function () {
                var id = $('#p_id').val();
                var infor_id = $('#infor_id').val();
                var contents = $('.textarea-contents').val();
                if (id.length==0 || contents.length==0 || infor_id.length==0){
                    layer.msg('操作失败！！！',{icon:5});
                    return false;
                }
                $.ajax({
                    url:"/infor/add_comments",
                    type:'post',
                    dataType:'json',
                    data:{id:id,infor_id:infor_id,contents:contents},//表格数据序列化
                    success:function(res){
                        if (res=='200'){
                            layer.close(layer.index);
                            $('.layui-show').find('iframe')[0].contentWindow.location.reload(true);
                        }else {
                            layer.msg('操作失败！！！',{icon:5});
                        }
                    },
                    error:function(){
                        layer.alert('操作失败！！！',{icon:5});
                    }
                });
            })
        })
    </script>
</div>




<script>
    layui.use(['element','upload','form','layer','laydate','layedit','table'], function(){
        var $ = layui.jquery;
        var height = $(document).height(); // 文档流高度
        // 动态修改iframe高度
        $(window.parent.document).find('.layui-show').find('iframe')[0].height=height;
        $(".pages").click(function () {
           var current_page = $(".laypage-main a").text();
           var type = $(this).attr('data-type');
           if(type=="pre"){
               current_page = parseInt(current_page)-1;
           }
            if(type=="next"){
                current_page = parseInt(current_page)+1;
            }
            if(type=="last"){
                current_page = parseInt($(this).attr('pages'));
            }
            if(current_page==0){
               return false;
            }
            var p_id = $('.p_id').val();
            $.ajax({
                url:"/infor/get_comments",
                type:'post',
                dataType:'json',
                data:{pages:current_page,id:p_id},//表格数据序列化
                success:function(res){
                    res = JSON.parse(res);
                    if (res.length!=0){
                        html(res,current_page);
                    }
                },
                error:function(){

                }
            });
        })


        function html(res,current_page) {
            var hm = ""
            $.each(res,function (index,value){
                 hm += "<li>" +
                    "<div class='detail-about detail-about-reply'>"+
                    "<a class='comment-avatar'>" +
                    "<img src='/static/avatar.jpg' alt='"+value[0].name+"'></a>" +
                    "<div class='comment-detail-user'>" +
                    "<a class='comment-link'> <cite>"+value[0].name+"</cite></a></div>" +
                    "<div class='detail-hits'><span>"+createTime(value[0].create_time)+"</span></div></div>" +
                    "<div class='detail-body layui-text jieda-body photos'>"+value[0].contents+"</div>" +
                    "<div class='jieda-sub-comments"+value[0].id+"' style='height: auto;padding-left: 70px'>";

                $.each(value,function (key,val) {

                        if(key!=0){
                            hm += "<div class='detail-about detail-about-reply'>" +
                                "<a class='comment-avatar'>" +
                                "<img src='/static"+val.pic+"' alt='"+val.name+"'></a>" +
                                "<div class='comment-detail-user'>" +
                                "<a class='comment-link'><cite>"+val.name+"</cite></a></div>" +
                                "<div class='detail-hits'><span>"+createTime(val.create_time)+"</span></div></div>" +
                                "<div class='detail-body layui-text jieda-body photos' style='margin: 0'>"+val.contents+"</div>"
                        }
                    })
                    hm += "</div>" +
                    "<div class='jieda-reply'>" +
                    "<span class='jieda-zan ' type='zan'> <i class='iconfont icon-zan'></i> <em>0</em> </span>" +
                    "<span class='jieda-comment-reply' type='reply' data-id='"+value[0].id+"'> <i class='iconfont icon-svgmoban53'></i>回复</span>" +
                    "</div></li>";

            });
            $('#jieda').empty();
            $("#jieda").append(hm);
            $(".laypage-main a").text(current_page);
            var height = $(".layui-fluid").height(); // 获取当前页面高度
            // 动态修改iframe高度
            $(window.parent.document).find('.layui-show').find('iframe')[0].height=height;
        }

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
        
        
        // 回复
        $(".jieda").on("click",'.jieda-comment-reply',function () {
            var id = $(this).attr('data-id');
            $('#p_id').val(id);
            parent.layer.open({
                //layer提供了5种层类型。可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
                type: 1,
                title: '评论回复',
                area: ['30%', '250px'],
                content: $("#popup-reply").html(),
            });
        })

    })





</script>
</body>
</html>