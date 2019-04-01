<?php
include './inc/config.inc.php';

if(isset($_POST["regSubmit"])){
        $uname = trim($_POST["uname"]);
        $email = trim($_POST["email"]);
        $upass = trim($_POST["upass"]);
        $upass1 = trim($_POST["upass1"]);
        $ctime = trim(time());

    if($upass != $upass1){
        echo "<span>两次密码不相同！</span>";
    }else{
        $pw = md5($upass);
    }

    if(strlen($uname) != 0 && strlen($email) != 0 && strlen($pw) != 0  && strlen($ctime) != 0 ){
        //检测用户名称 和 邮箱地址
        $sqlUser = "select * from admin where uname = '{$uname}'";
        $sqlEmail = "select * from admin where  email = '{$email}'";

        $resultUser = $conn->query($sqlUser);
        $resultEmail = $conn->query($sqlEmail);

        if ($resultUser->num_rows == 1 ) {
            echo "<span>用户名已存在！</span>";
        } else if($resultEmail->num_rows == 1 ) {
            echo "<span>邮箱已存在！</span>";
        }else{
            $sqlquery = "INSERT INTO admin (uname, upass, email, ctime) VALUES ('{$uname}', '{$pw}', '{$email}', '{$ctime}')";
            if (mysqli_query($conn, $sqlquery)) {
                echo "注册成功";
            } else {
                echo "Error: " .$sqlquery . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }

    }else{
        echo "<span>用户信息不能为空！</span>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册</title>
</head>
<body>
   <div class="register-box">
        <form action="register.php" method="POST" class="form-inline" role="form">
            <div class="form-group">
            <label class="sr-only" for="">用户名：</label>
                <input type="text" name="uname" class="form-control" id="" placeholder="请输入">
            </div>
            <label class="sr-only" for="">邮箱：</label>
                <input type="text" name="email" class="form-control" id="" placeholder="请输入">
            </div>
            <div class="form-group">
                <label class="sr-only" for="">密码：</label>
                <input type="password" name="upass" class="form-control" id="" placeholder="请输入">
            </div>
            <div class="form-group">
                <label class="sr-only" for="">确认密码：</label>
                <input type="password" name="upass1" class="form-control" id="" placeholder="请输入">
            </div>
            <button type="submit" name="regSubmit" class="btn btn-primary">登录</button>
        </form>
   </div>
</body>
</html>