<?php
session_start();
if(isset($_SESSION["adminInfo"]["userInfo"]) && isset($_SESSION["adminInfo"]["passInfo"]) ){
    $userName = $_SESSION["adminInfo"]["userInfo"];
}else{
    header("location:login.html");
}

if (isset($_POST["uname"]) && isset($_POST["upass"])) {
    $userInfo = trim($_POST["uname"]);
    $passInfo = trim($_POST["upass"]);
   
    if (strlen($userInfo) && strlen($passInfo)) {
        if ($userInfo == 'cnki' && $passInfo == "cnki123") {
            $_SESSION["adminInfo"]['userInfo'] = $userInfo;
            $_SESSION["adminInfo"]['passInfo'] = md5($passInfo);
            // header("location:admin.php");
            echo json_encode(["code" => "success"]);
        }else{
            echo json_encode(["code" => "error"]);
        }
    } else {
        // echo "<span style='color:red;'>账户或密码不能为空！</span>";
        echo json_encode(["code" => "error"]);  
    }
}
 
?>