<?php
session_start();
if(isset($_SESSION["adminInfo"]["userInfo"]) && isset($_SESSION["adminInfo"]["passInfo"]) ){
    $userName = $_SESSION["adminInfo"]["userInfo"];
}else{
    header("location:login.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理后台页面</title>
</head>
<body>
    <h1>欢迎：<span> <?php echo $userName;?> </span> 登录</h1>
</body>
</html>