<?php
session_start();
//session 输出
$user = $_SESSION["user"];
echo $user;
?>