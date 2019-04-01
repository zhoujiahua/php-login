<?php
$host = 'localhost';
$database = 'demo';
$username = 'root';
$password = '123456';
$selectName = 'jiahua';//要查找的用户名，一般是用户输入的信息
$insertName = 'testname';

$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);//创建一个pdo对象
$pdo->exec("set names 'utf8'");
$sql = "select * from user where username = ?";
$stmt = $pdo->prepare($sql);
$rs = $stmt->execute(array($selectName));

var_dump($_SERVER['REQUEST_METHOD']);

if ($rs) {
    // PDO::FETCH_ASSOC 关联数组形式
    // PDO::FETCH_NUM 数字索引数组形式
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['username'];
        $pass = $row['password'];
        if($name != "jiahua"){
            echo "当前用户不存在！";
        }else if($pass != "123456") {
            echo "密码输入错误！";
        }else{
            echo "登录成功（账号: $name 密码: $pass \n）";
        }
    }
}