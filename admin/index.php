<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location:demo/login.html');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>首页 · 后台模板 HTML</title>
    <link rel="stylesheet" href="./../lib/layui/css/layui.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./frame/static/image/code.png">
</head>

<body>

    <!-- layout admin -->
    <div class="layui-layout layui-layout-admin">
        <!-- 添加skin-1类可手动修改主题为纯白，添加skin-2类可手动修改主题为蓝白 -->
        <!-- header -->
        <div class="layui-header my-header">
            <a href="index.html">
                <!--<img class="my-header-logo" src="" alt="logo">-->
                <div class="my-header-logo">后台模板 HTML</div>
            </a>
            <div class="my-header-btn">
                <button class="layui-btn layui-btn-small btn-nav"><i class="layui-icon"></i></button>
            </div>

            <!-- 顶部左侧添加选项卡监听 -->
            <ul class="layui-nav" lay-filter="side-top-left">
                <!--<li class="layui-nav-item"><a href="javascript:;" href-url="demo/btn.html"><i class="layui-icon"></i>按钮</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="layui-icon"></i>基础</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" href-url="demo/btn.html"><i class="layui-icon"></i>按钮</a></dd>
                    <dd><a href="javascript:;" href-url="demo/form.html"><i class="layui-icon"></i>表单</a></dd>
                </dl>
            </li>-->
            </ul>

            <!-- 顶部右侧添加选项卡监听 -->
            <ul class="layui-nav my-header-user-nav" lay-filter="side-top-right">
                <li class="layui-nav-item"><a href="javascript:;" class="pay" href-url="">支持作者</a></li>
                <li class="layui-nav-item">
                    <a class="name" href="javascript:;"><i class="layui-icon"></i>主题</a>
                    <dl class="layui-nav-child">
                        <dd data-skin="0"><a href="javascript:;">默认</a></dd>
                        <dd data-skin="1"><a href="javascript:;">纯白</a></dd>
                        <dd data-skin="2"><a href="javascript:;">蓝白</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="name" href="javascript:;"><img src="./frame/static/image/code.png" alt="logo"> <?php echo $_SESSION['user'] ?> </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" href-url="demo/login.html"><i class="layui-icon"></i>登录页</a></dd>
                        <dd><a href="javascript:;" href-url="demo/map.html"><i class="layui-icon"></i>图表</a></dd>
                        <dd><a href="demo/logout.php"><i class="layui-icon">ဆ</i>退出</a></dd>
                    </dl>
                </li>
            </ul>

        </div>
        <!-- side -->
        <div class="layui-side my-side">
            <div class="layui-side-scroll">
                <!-- 左侧主菜单添加选项卡监听 -->
                <ul class="layui-nav layui-nav-tree" lay-filter="side-main">
                    <li class="layui-nav-item">
                        <!--去除 layui-nav-itemed 即可关闭展开-->
                        <a href="javascript:;"><i class="layui-icon"></i>基础</a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;" href-url="pages/btn.html"><i class="layui-icon"></i>按钮</a></dd>
                            <dd><a href="javascript:;" href-url="pages/form.html"><i class="layui-icon"></i>表单</a></dd>
                            <dd><a href="javascript:;" href-url="pages/table.html"><i class="layui-icon"></i>表格</a></dd>
                            <dd><a href="javascript:;" href-url="pages/tab-card.html"><i class="layui-icon"></i>选项卡</a></dd>
                            <dd><a href="javascript:;" href-url="pages/progress-bar.html"><i class="layui-icon"></i>进度条</a></dd>
                            <dd><a href="javascript:;" href-url="pages/folding-panel.html"><i class="layui-icon"></i>折叠面板</a></dd>
                            <dd><a href="javascript:;" href-url="pages/auxiliar.html"><i class="layui-icon"></i>辅助元素</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item layui-nav-itemed">
                        <!--去除 layui-nav-itemed 即可关闭展开-->
                        <a href="javascript:;"><i class="layui-icon"></i>扩展</a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;" href-url="pages/login.html"><i class="layui-icon"></i>登录页</a></dd>
                            <dd><a href="javascript:;" href-url="pages/register.html"><i class="layui-icon"></i>注册页</a></dd>
                            <dd><a href="javascript:;" href-url="pages/login2.html"><i class="layui-icon"></i>登录页2</a></dd>
                            <dd><a href="javascript:;" href-url="pages/map.html"><i class="layui-icon"></i>图表</a></dd>
                            <dd><a href="javascript:;" href-url="pages/add-edit.html"><i class="layui-icon"></i>添加-修改</a></dd>
                            <dd><a href="javascript:;" href-url="pages/data-table.html"><i class="layui-icon"></i>data-table 表格页</a></dd>
                            <dd><a href="javascript:;" href-url="pages/tree-table.html"><i class="layui-icon"></i>Tree table树表格页</a></dd>
                            <dd><a href="javascript:;" href-url="pages/404.html"><i class="layui-icon"></i>404页</a></dd>
                            <dd><a href="javascript:;" href-url="pages/tips.html"><i class="layui-icon"></i>提示页</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item"><a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=ad6ba602ae228be2222ddb804086e0cfa42da3d74e34b383b665c2bec1adfc6e"><i class="layui-icon"></i>加入群下载源码</a></li>
                </ul>

            </div>
        </div>
        <!-- body -->
        <div class="layui-body my-body">
            <div class="layui-tab layui-tab-card my-tab" lay-filter="card" lay-allowClose="true">
                <ul class="layui-tab-title">
                    <li class="layui-this" lay-id="1"><span><i class="layui-icon"></i>欢迎页</span></li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe id="iframe" src="demo/welcome.html" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="layui-footer my-footer">
            <p><a href="http://vip-admin.com" target="_blank">vip-admin后台模板v1.8.0</a> & <a href="http://vip-admin.com/index/gather/index.html" target="_blank">vip-admin管理系统v1.2.0</a></p>
            <p>2017 © copyright 蜀ICP备17005881号</p>
        </div>
    </div>

    <!-- pay -->
    <div class="my-pay-box none">
        <div><img src="./frame/static/image/zfb.png" alt="支付宝">
            <p>支付宝</p>
        </div>
        <div><img src="./frame/static/image/wx.png" alt="微信">
            <p>微信</p>
        </div>
    </div>

    <!-- 右键菜单 -->
    <div class="my-dblclick-box none">
        <table class="layui-tab dblclick-tab">
            <tr class="card-refresh">
                <td><i class="layui-icon">ဂ</i>刷新当前标签</td>
            </tr>
            <tr class="card-close">
                <td><i class="layui-icon">ဆ</i>关闭当前标签</td>
            </tr>
            <tr class="card-close-all">
                <td><i class="layui-icon">ဆ</i>关闭所有标签</td>
            </tr>
        </table>
    </div>

    <script src="./../lib/layui/layui.js"></script>
    <script type="text/javascript" src="./frame/static/js/vip_comm.js"></script>
    <script type="text/javascript">
        layui.use(['layer', 'vip_nav'], function() {

            // 操作对象
            var layer = layui.layer,
                vipNav = layui.vip_nav,
                $ = layui.jquery;

            // 顶部左侧菜单生成 [请求地址,过滤ID,是否展开,携带参数]
            vipNav.top_left('./json/nav_top_left.json', 'side-top-left', false);
            // 主体菜单生成 [请求地址,过滤ID,是否展开,携带参数]
            vipNav.main('./json/nav_main.json', 'side-main', true);

            // you code ...


        });
    </script>
</body>

</html> 