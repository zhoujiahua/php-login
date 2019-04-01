<?php 
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "fcom";
$dbport = "3306";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

?>