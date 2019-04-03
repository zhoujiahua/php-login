<?php
include "data/mysql.inc.php";

# 连接数据库
$conn = connect();
# $sqlUser = "SELECT * FROM admin WHERE `uname` = 'admin'";
# $result = execute($conn,$sqlUser);
# $info = $result->fetch_assoc();
# $num = mysqli_num_rows($result);
# $bool = execute_bool($conn,$sqlUser);

# 用户名以及邮箱验证
if (isset($_POST['uname'])) {
    // echo "Hello";
    // exit;
    $uname = $_POST['uname'];
    $sqlUname = "SELECT * FROM admin WHERE `uname` = '{$uname}'";
    $bool = execute_bool($conn,$sqlUname);
    if($bool){
        echo json_encode(["code" => "0", "msg" => "用户名已存在！"]);
    }

} else if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $sqlEmail = "SELECT * FROM admin WHERE `uname` = '{$email}'";
    $bool = execute_bool($conn,$sqlEmail);
    if($bool){
        echo json_encode(["code" => "0", "msg" => "用户名已存在！"]);
    }
}

?>