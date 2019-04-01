<?php
    $host = '192.168.1.168';
    $uname = 'root';
    $pass = '123456';
    $port = '3306';
    $database = 'demo';

    //创建连接
    $conn = new  mysqli($host,$uname,$pass,$database);

    if($conn -> connect_error){
        echo '数据库连接失败：'.connect_error;
    }

    echo '数据库连接成功！';
?>