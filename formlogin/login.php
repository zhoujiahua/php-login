<?php
if (isset($_POST["loginSubmit"])) {
    $userInfo = trim($_POST["user"]);
    $passInfo = trim($_POST["pass"]);
    if (strlen($userInfo) && strlen($passInfo)) {
        session_start();
        $_SESSION["adminInfo"]['userInfo'] = $userInfo;
        $_SESSION["adminInfo"]['passInfo'] = md5($passInfo);
        header("location:admin.php");
    }else{
        echo "<span style='color:red;'>账户或密码不能为空！</span>";
    }
}
?>

