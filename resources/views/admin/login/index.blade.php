<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>日尝 - 后台登录</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <!-- load css -->
    <link href="{{asset('assets/admin/login/css/layui.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/login/css/login.css')}}" media="all">

    <style>
        .btn{
            width: 100%;
            height: 42px;
            border: none;
            font-size: 16px;
            background: #FF5722;
            color: #f8f8f8;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="layui-canvs"></div>
<form id="doLogin" name="doLogin" method="post" action="{:url('')}">
    <div class="layui-layout layui-layout-login">
        <h1>
            <strong>后台管理系统</strong>
            <!--<em>为你所爱，是你想要</em>-->
        </h1>
        <div class="layui-user-icon larry-login">
            <input type="text" placeholder="账号" id="username" name="username" class="login_txtbx"/>
        </div>
        <div class="layui-pwd-icon larry-login">
            <input type="password" placeholder="密码" class="login_txtbx" id="password" name="password"/>
        </div>

        <div class="layui-submit larry-login">
            <input type="submit" class="btn" value="立即登录"/>
            <!--<button type="submit" class="btn btn-primary btn-block">登　录</button>-->
        </div>
        <div class="layui-login-text">

            <p>后台管理系统<a href="#" title=""> welcome you</a></p>
        </div>
    </div>
</form>
<script src="{{asset('assets/admin/login/js/layui.all.js')}}"></script>
<script src="{{asset('assets/admin/login/js/login.js')}}"></script>
<script src="{{asset('assets/admin/login/js/jquery.form.js')}}"></script>

<script src="{{asset('assets/admin/login/js/jparticle.jquery.js')}}"></script>

<script type="text/javascript">
    $(function(){
        $(".layui-canvs").jParticle({
            background: "#141414",
            color: "#E6E6E6"
        });
    });
    $(function(){
        $('#doLogin').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });
        function checkForm(){
            if( '' == $.trim($('#username').val())){
                var name=$("#username").val();
                layer.msg('请输入登录用户名', {icon: 5,time:2000}, function(index){
                    layer.close(index);
                });
                return false;
            }
            if( '' == $.trim($('#password').val())){
                layer.msg('请输入登录密码', {icon: 5,time:2000}, function(index){
                    layer.close(index);
                });
                return false;
            }
            $("button").removeClass('btn-primary').addClass('btn-danger').text("登录中...");
        }
        function complete(data){
            if(data.code==1){
                layer.msg(data.msg, {icon: 6,time:1000}, function(index){
                    layer.close(index);
                    window.location.href=data.url;
                });
            }else{
                layer.msg(data.msg, {icon: 5,time:2000});
                $("button").removeClass('btn-danger').addClass('btn-primary').text("登　录");
                return false;
            }
        }
    });
</script>

</body>
</html>