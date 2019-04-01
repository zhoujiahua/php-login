<?php
    //cookie销毁 方式
    $name = setcookie("name","",time()-3600);
    $name = setcookie("name","");
    $name = setcookie("name",NULL);
    echo time();
?>
