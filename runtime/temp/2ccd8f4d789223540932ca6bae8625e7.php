<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"F:\etereauty\public/../application/admin\view\login\login.html";i:1533374754;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
    <link rel="stylesheet" href="/admin/css/index.css">
    <link rel="stylesheet" href="/admin/fonts/css/font-awesome.css">
    <link rel="stylesheet" href="/admin/css/loading.css">
</head>

<body>
    <div class="login-content">
        <div class="loading">
            <div class="loading">
                <div id="preloader5"></div>
            </div>
        </div>
        <div class="alert-prompt">
            <div class="prompt">
                <p class="tit">提示</p>
                <div class="p-init"></div>
            </div>
        </div>
        <div class="login">
            <h2>欢迎登录智汇创想后台系统</h2>
            <form action="" class="login-form">
                <div class="inp">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" name="username" placeholder="用户名" class="login-user">
                    <span class="error">用户名不能为空</span>
                </div>
                <div class="inp">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" name="password" placeholder="密码" class="login-pass">
                    <span class="error">密码不能为空</span>
                </div>
                <div class="inp">
                    <button type="submit" name="username" class="login-sub-btn">登录</button>
                </div>
            </form>
        </div>
    </div>
    <script src="/admin/js/jquery.js"></script>
    <script src="/admin/js/form.js"></script>
    <script src="/admin/js//wow.min.js"></script>
    <script src="/admin/js/paging.js" type="text/javascript"></script>
    <script src="/admin/js/index.js"></script>
</body>

</html>