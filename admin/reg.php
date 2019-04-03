<?php
 include "./data/mysql.inc.php";

#接收表单注册数据
if(isset($_POST['user']) && isset($_POST['pwd'])){
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];

    #编辑sql语句
    $insertInfo = "insert into t_user values (null,\"$user\",\"$pwd\",\"php小白\")";
    
    #执行sql 语句
    $result = $conn->query($insertInfo);

    #判断是否注册成功并返回数据
    if ($result) {
        echo "1";
    }else{
        echo "0";
    }
}
 
?>