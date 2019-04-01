<?php
    session_start();
    //session 写入
    $_SESSION["user"] = "JiaHua";
    header("location:page2.php");
?>