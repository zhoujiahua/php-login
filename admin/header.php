<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理后台</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./../lib/FontAwesome/font-awesome.min.css">
    <link rel="stylesheet" href="./../lib/layui/css/layui.css">
    <link rel="stylesheet" href="./css/base.css">
    <!--[if lt IE 9]>
        <script src="./../lib/html5css3/html5shiv.min.js"></script>
        <script src="./../lib/html5css3/respond.min.js"></script>
        <script src="./../lib/art/ie/es5-shim.min.js"></script>
        <script src="./../lib/art/ie/es5-sham.min.js"></script>
    <![endif]-->
</head>

<body class="layui-layout-body">
    <div class="wrapper">
        <div class="layui-layout layui-layout-admin">
            <div class="header">
                <div class="layui-header">
                    <div class="layui-logo">后台管理</div>
                    <!-- 头部导航 -->
                    <ul class="layui-nav layui-layout-left">
                        <li class="layui-nav-item"><a href="">控制台</a></li>
                        <li class="layui-nav-item"><a href="">商品管理</a></li>
                        <li class="layui-nav-item"><a href="">用户</a></li>
                        <li class="layui-nav-item">
                            <a href="javascript:;">其它系统</a>
                            <dl class="layui-nav-child">
                                <dd><a href="">邮件管理</a></dd>
                                <dd><a href="">消息管理</a></dd>
                                <dd><a href="">授权管理</a></dd>
                            </dl>
                        </li>
                    </ul>
                    <!-- 右侧登录 -->
                    <ul class="layui-nav layui-layout-right">
                        <li class="layui-nav-item">
                            <a href="javascript:;">
                                <img src="./images/photo/f.png" class="layui-nav-img">
                                <span>家华</span>
                            </a>
                            <dl class="layui-nav-child">
                                <dd><a href="">基本资料</a></dd>
                                <dd><a href="">安全设置</a></dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item"><a href="javascript:;">注销</a></li>
                    </ul>
                </div>
            </div> 