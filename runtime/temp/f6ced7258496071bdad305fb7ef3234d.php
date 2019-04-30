<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\xampp\htdocs\akiho\public/../application/member\view\index\index.html";i:1556610988;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="/static/layui/css/layui.css" />
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>

    <script>
        //iframe高度自适应
        function setIframeHeight(iframe) {
            if (iframe) {
                var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
                if (iframeWin.document.body) {
                    iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
                }
            }
        };
    </script>
</head>
<?php $country = config('country.countries');?>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <!--头部-->
    <div class="layui-header">
        <!--头部左侧导航-->
        <ul class="layui-nav layui-layout-left" lay-filter="leftmenu">
            <li class="layui-nav-item">
                <a href="javascript:;" class="hidetab" title="隐藏左侧菜单"><i class="layui-icon layui-icon-shrink-right"></i></a>
            </li>
            <li class="layui-nav-item">
                <a href="index" title="主页"><i class="layui-icon layui-icon-home"></i></a>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;" class="refresh refreshThis" title="刷新"><i class="layui-icon layui-icon-refresh-3"></i></a>
            </li>
            <li class="layui-nav-item layui-hide-xs">
                <input class="layui-input layui-input-search" type="text" placeholder="搜索" autocomplete="off"/>
            </li>
        </ul>
        <!--头部右侧导航-->
        <ul class="layui-nav layui-layout-right" lay-filter="rightmenu">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-website"></i>
                    语言选择
                </a>
                <dl class="layui-nav-child">
                    <?php if(!empty($data)){foreach($data as $vt){ if($lang==$vt){ ?>
                                <dd class="layui-this"><a href="javascript:;" onclick="modify_lang('<?php echo $vt; ?>')"><?php echo $country[$vt]; ?></a></dd>
                            <?php }else{ ?>
                                <dd><a href="javascript:;" onclick="modify_lang('<?php echo $vt; ?>')"><?php echo $country[$vt]; ?></a></dd>
                    <?php }}} ?>
                </dl>

            </li>


            <li class="layui-nav-item">
                <a href=""><i class="layui-icon layui-icon-speaker"></i>消息中心<span class="layui-badge">9</span></a>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <i class="layui-icon layui-icon-user"></i>
                    <?php echo $user['name']; ?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a class="account_params" href="javascript:;" lay-href="/account/index"><i class="layui-icon layui-icon-form"></i>基本资料</a></dd>
                    <dd><a class="account_params" href="javascript:;" lay-href="/account/pwd"><i class="layui-icon layui-icon-password"></i>修改密码</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">锁屏<i class="layui-icon layui-icon-password"></i></a>
            </li>
            <li class="layui-nav-item"><a href="/index/logout">退出</a></li>
        </ul>
    </div>
    <!--左侧-->
    <div class="layui-side layui-side-menu" style="z-index: 1024">
        <!--带滚动条垂直导航-->
        <div class="layui-side-scroll layui-bg-black">
            <div class="layui-logo" style="height: 60px;position: fixed"><?php echo $country[$lang]; ?>后台管理系统</div>
            <ul class="layui-nav layui-nav-tree" lay-filter="navtree">
                <!--默认展开-->
                <li class="layui-nav-item layui-nav-itemed">
                    <dd class="layui-this"><a lay-href="default" title="首页"><i class="layui-icon layui-icon-home"></i><cite>首页</cite></a><dd>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;" title="企业信息" ><i class="layui-icon layui-icon-flag"></i><cite>企业信息</cite></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/company/index">基本信息</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/company/pic">图片管理</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/company/cases">成功案例</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/company/honor">荣誉资质</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;" title="产品信息"><i class="layui-icon layui-icon-diamond"></i><cite>产品信息</cite></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/product/index">发布产品</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/product/lists">产品列表</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;" title="设置"><i class="layui-icon layui-icon-read"></i><cite>公司资讯</cite></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/infor/index">发布资讯</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/infor/comments">评论列表</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;" title="互动信息"><i class="layui-icon layui-icon-dialogue"></i><cite>互动信息</cite></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/message/inquiry">产盘询盘</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/message/board">留言反馈</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item">
                    <a href="javascript:;" title="账户管理"><i class="layui-icon layui-icon-user"></i><cite>账户管理</cite></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/account/index">基本资料</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" lay-href="/account/pwd">密码修改</a></dd>
                    </dl>
                </li>

            </ul>
        </div>
    </div>
    <!--正文-->
    <div class="layui-body layui-bg-gray">
        <!--选项卡-->
        <div class="layui-admin-pagetabs">
            <div class="layui-tab layui-tab-brief" lay-allowClose="true" lay-filter="pagetabs">
                <ul class="layui-tab-title layui-bg-white">
                    <li class="layui-this" lay-id="default"><i class="layui-icon layui-icon-home"></i></li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src="/index/default" name="ifrmname" class="layui-admin-iframe" scrolling="no" frameborder="0" onload="setIframeHeight(this);" width="100%">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--底部-->
    <div class="layui-footer">© 2018 layui.com BY 心的远行</div>
</div>
<script src="/static/layui/layui.js"></script>
<script>
    layui.use(['element','layer','form','upload'],function(){
        var element = layui.element
            ,layer = layui.layer
            ,form = layui.form
            ,$ = layui.jquery
            ,upload = layui.upload;
        //隐藏tab主页关闭标签
        $(".layui-tab-title li:first-child i:last-child").css("display","none");
        //tab点击监控
        element.on('tab(pagetabs)',function(data){
            //tab切换时，左侧菜单对应选中
            var url = $(this).attr("lay-id");
            $(".layui-nav-tree li dd").each(function(i,e){
                if($(this).find("a").attr("lay-href")==url){
                    $(this).attr("class","layui-this");
                }else{
                    $(this).attr("class","");
                }
            })
        });
        //顶部左侧菜单监控
        element.on('nav(leftmenu)',function(elem){
            //隐藏侧边菜单
            if(elem[0].className=="hidetab"){
                //侧边菜单伸缩
                $(".layui-side-menu").animate({width:$(".layui-side-menu").width()-144+"px"});
                //正文伸缩
                $(".layui-body").animate({left:$(".layui-body").position().left-144+"px"});
                //底部伸缩
                $(".layui-footer").animate({left:$(".layui-footer").position().left-144+"px"});
                $(this).attr("class","showtab");
                $(this).find("i").attr("class","layui-icon layui-icon-spread-left");
                //侧边菜单只显示图标
                $(".layui-nav-tree").find("li").each(function(em,ind){
                    $(this).find("cite").css("display","none");
                    $(this).find("dl").css("display","none");
                });
                //显示侧边菜单
            }else if(elem[0].className=="showtab"){
                $(".layui-side-menu").animate({width:$(".layui-side-menu").width()+144+"px"});
                $(".layui-body").animate({left:$(".layui-body").position().left+144+"px"});
                $(".layui-footer").animate({left:$(".layui-footer").position().left+144+"px"});
                $(this).attr("class","hidetab");
                $(this).find("i").attr("class","layui-icon layui-icon-shrink-right");
                $(".layui-nav-tree").find("li").each(function(em,ind){
                    $(this).find("cite").css("display","");
                    $(this).find("dl").css("display","");
                });
            }else{

            }
        });
        //顶部右侧菜单监控
        element.on('nav(rightmenu)',function(elem){
            if(elem[0].innerText=="锁屏"){
                layer.open({
                    title:"已锁屏"
                    ,content: '<input name="pass" class="layui-input" type="text" placeholder="请输入密码,默认123123" autocomplete="off"/>'
                    ,btnAlign: 'c'
                    ,anim: 1
                    ,btn: ['解锁']
                    ,yes: function(index, layero){
                        var pass = layero.find('.layui-layer-content input').val();
                        if(pass=="123123"){
                            layer.close(index);
                        }else{
                            layer.title("密码不正确！", index);
                        }
                    }
                    ,cancel: function(){
                        return false //开启该代码可禁止点击该按钮关闭
                    }
                });
            }
        })
        //左侧垂直菜单监控
        element.on('nav(navtree)',function(elem){
            if($(".layui-side-menu").width()<200){
                $(".layui-side-menu").animate({width:$(".layui-side-menu").width()+144+"px"});
                $(".layui-body").animate({left:$(".layui-body").position().left+144+"px"});
                $(".layui-footer").animate({left:$(".layui-footer").position().left+144+"px"});
                $(".layui-layout-left li:first-child").find("a").attr("class","hidetab");
                $(".layui-layout-left li:first-child").find("i").attr("class","layui-icon layui-icon-shrink-right");
                $(".layui-nav-tree").find("li").each(function(em,ind){
                    $(this).find("cite").css("display","");
                    $(this).find("dl").css("display","");
                });
            }else{
                if($(this).attr("lay-href")!=undefined){
                    var  flag = true;
                    //url
                    var url = $(this).attr("lay-href");
                    //判断选项卡中是否存在已打开的页面，如果有直接切换到打开页面
                    $(".layui-tab-title li").each(function(i,e){
                        if($(this).attr("lay-id")==url){
                            //切换选项卡
                            element.tabChange('pagetabs', url);
                            flag = false;
                        }
                    })
                    if(flag){
                        //新增选项卡
                        element.tabAdd('pagetabs', {
                            title: elem[0].innerText
                            ,content: '<iframe src="'+url+'" class="layui-admin-iframe" scrolling="no" frameborder="0" onload="setIframeHeight(this)" width="100%"></iframe>'
                            ,id: url
                        });
                        //切换选项卡
                        element.tabChange('pagetabs', url);
                    }
                }
            }
        });

        $(".account_params").click(function () {
            if($(this).attr("lay-href")!=undefined){
                var  flag = true;
                //url
                var url = $(this).attr("lay-href");
                //判断选项卡中是否存在已打开的页面，如果有直接切换到打开页面
                $(".layui-tab-title li").each(function(i,e){
                    if($(this).attr("lay-id")==url){
                        //切换选项卡
                        element.tabChange('pagetabs', url);
                        flag = false;
                    }
                })
                if(flag){
                    //新增选项卡
                    element.tabAdd('pagetabs', {
                        title: $(this).text()
                        ,content: '<iframe src="'+url+'" class="layui-admin-iframe" scrolling="no" frameborder="0" onload="setIframeHeight(this)"></iframe>'
                        ,id: url
                    });
                    //切换选项卡
                    element.tabChange('pagetabs', url);
                }
            }
        })

    });


    //刷新当前
    $(".refresh").on("click",function(){  //此处添加禁止连续点击刷新一是为了降低服务器压力，另外一个就是为了防止超快点击造成chrome本身的一些js文件的报错(不过貌似这个问题还是存在，不过概率小了很多)
        if($(this).hasClass("refreshThis")){
            $(this).removeClass("refreshThis");
            $('.layui-show').find('iframe')[0].contentWindow.location.reload(true);
            setTimeout(function(){
                $(".refresh").addClass("refreshThis");
            },2000)
        }else{
            layer.msg("您点击的速度超过了服务器的响应速度，还是等两秒再刷新吧！");
        }
    })

    // 修改语言
    function modify_lang(lang) {
        $.ajax({
            url:"/member/index",
            type:'post',
            dataType:'json',
            data:{lang:lang},//表格数据序列化
            success:function(res){
                if (res == 200){
                   location.reload();
                } else {
                    layer.alert('操作失败！！！',{icon:5});
                }
            },
            error:function(){
                layer.alert('操作失败！！！',{icon:5});
            }
        })
    }

</script>
</body>
</html>
