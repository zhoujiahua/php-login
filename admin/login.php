<?php
session_start();
//获取post的数据
$account = $_POST['account'];
$pwd = $_POST['password'];
//连接数据库
$db = new mysqli('localhost', 'root', '', '0104test');
$db->query("SET NAMES UTF8");
$sql = "select * from t_user where uname = \"{$account}\"";

$result = $db->query($sql);
$user = $result->fetch_row();


if (!empty($user) && $pwd == $user[2]) {
    $_SESSION['user'] = $account;
    echo '1';
} else {
    echo '0';
}
?>