<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\xampp\htdocs\lang\public/../application/index\view\login\login.html";i:1556603429;}*/ ?>


<!DOCTYPE HTML>
<html>
<head>
    <title>用户登录</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
</head>
<style type="text/css">

    /* start editing from here */
    html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,dl,dt,dd,ol,nav ul,nav li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}
    article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {display: block;}
    ol,ul{list-style:none;margin:0;padding:0;}
    blockquote,q{quotes:none;}
    blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}
    table{border-collapse:collapse;border-spacing:0;}
    /* start editing from here */
    a{text-decoration:none;}
    nav.vertical ul li{	display:block;}/* vertical menu */
    nav.horizontal ul li{	display: inline-block;}/* horizontal menu */
    img{max-width:100%;}
    /*end reset*/
    /*--login start here--*/
    body{
        padding:100px 0px 30px 0px;
        font-family: 'Roboto', sans-serif;
        font-size: 100%;
    }
    .login {
        width: 600px;
        margin: 0 auto;
    }
    .login h2 {
        font-size: 30px;
        font-weight: 700;
        color: #fff;
        text-align: center;
        margin: 0px 0px 50px 0px;
        font-family: 'Droid Serif', serif;
    }
    .login-top {
        background: #E1E1E1;
        border-radius: 25px 25px 0px 0px;
        -webkit-border-radius:  25px 25px 0px 0px;
        -moz-border-radius: 25px 25px 0px 0px;
        -o-border-radius: 25px 25px 0px 0px;
        padding: 40px 60px;
    }
    .login-top h1 {
        text-align: center;
        font-size: 27px;
        font-weight: 500;
        color: #F45B4B;
        margin: 0px 0px 20px 0px;
    }
    .login-top input[name="email"] {
        outline: none;
        font-size: 15px;
        font-weight: 500;
        color: #818181;
        padding: 15px 20px;
        background: #CACACA;
        border: 1px solid #ccc;
        border-radius:25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        -o-border-radius: 25px;
        margin: 0px 0px 12px 0px;
        width: 88%;
        -webkit-appearance: none;
    }
    .login-top input[type="password"]{
        outline: none;
        font-size: 15px;
        font-weight: 500;
        color: #818181;
        padding: 15px 20px;
        background: #CACACA;
        border: 1px solid #ccc;
        border-radius:25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        -o-border-radius: 25px;
        margin: 0px 0px 12px 0px;
        width: 88%;
        -webkit-appearance: none;
    }
    .login-top input[name="captcha"] {
        outline: none;
        font-size: 15px;
        font-weight: 500;
        color: #818181;
        padding: 15px 20px;
        background: #CACACA;
        border: 1px solid #ccc;
        border-radius:25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        -o-border-radius: 25px;
        /*margin-top:-15px;*/
        width: 88%;
        -webkit-appearance: none;
    }

    .forgot  a{
        font-size: 13px;
        font-weight: 500;
        color: #F45B4B;
        display: inline-block;
        border-right: 2px solid #F45B4B;
        padding: 0px 7px 0px 0px;
    }
    .forgot  a:hover{
        color: #818181;
    }
    .forgot input[type="submit"] {
        background: #F45B4B;
        color: #FFF;
        font-size: 17px;
        font-weight: 400;
        padding: 8px 7px;
        width: 20%;
        display: inline-block;
        cursor: pointer;
        border-radius: 6px;
        -webkit-border-radius: 19px;
        -moz-border-radius: 6px;
        -o-border-radius: 6px;
        margin: 0px 7px 0px 3px;
        outline: none;
        border: none;
    }
    .forgot input[type="submit"]:hover {
        background:#818181;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
    }
    .forgot {
        text-align: right;
    }
    .login-bottom {
        background: #E15748;
        padding: 30px 65px;
        border-radius: 0px 0px 25px 25px;
        -webkit-border-radius:  0px 0px 25px 25px;
        -moz-border-radius: 0px 0px 25px 25px;
        -o-border-radius: 0px 0px 25px 25px;
        text-align: right;
        border-top: 2px solid #AD4337;
    }
    .login-bottom h3 {
        font-size: 14px;
        font-weight: 500;
        color: #fff;
    }
    .login-bottom h3 a {
        font-size: 25px;
        font-weight: 500;
        color: #fff;
    }
    .login-bottom h3 a:hover {
        color:#696969;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
    }



</style>
<body>
<div class="login">
    <h2>Acced Form</h2>
    <div class="login-top">
        <h1><?php echo lang('登录'); ?></h1>
        <form action="/login/login" method="post">
            <input type="text" name="email" value="" >
            <input type="password" name="password" value="">
            <div style="height: 50px;margin-bottom: 20px">
                <input type="text" name="captcha" value="" style="width: 220px;float: left">
                <img src="<?php echo captcha_src(); ?>" id="verify_img" alt="captcha" width="180px" height="49px" style="float: left;" onclick="refreshVerify()" />
            </div>

            <div class="forgot">
                <input type="submit" value="Login" >
            </div>
        </form>
    </div>
    <div class="login-bottom">
        <h3>New User &nbsp;<a href="#">Register</a>&nbsp Here</h3>
    </div>
</div>

</body>
</html>
<script>
    function refreshVerify() {
        var ts = Date.parse(new Date())/1000;
        var img = document.getElementById('verify_img');
        img.src = "/captcha?id="+ts;
    }
</script>