<?php
# 设置时区
date_default_timezone_set('Asia/Shanghai');

# 开启SESSION
session_start();

# 设置网页字符编码
header('Content-type:text/html;charset=utf-8');
if(version_compare(PHP_VERSION,'5.4.0')<0){
	exit('您的PHP版本为'.PHP_VERSION.',我们的程序要求是PHP版本不低于5.4.0!');
}

# 数据库配置信息
$db_host = "localhost";
$db_name = "root";
$db_password = "123456";
$db_name = "acom";
$db_port = "3306";

# 设置全局常量
define('DB_HOST',$db_host);
define('DB_USER',$db_name);
define('DB_PASSWORD',$db_password);
define('DB_DATABASE',$db_name);
define('DB_PORT',$db_port);

# 项目（程序），在服务器上的绝对路径
define('SA_PATH',dirname(dirname(__FILE__)));

# 项目在web根目录下面的位置（哪个目录里面）
define('SUB_URL',str_replace($_SERVER['DOCUMENT_ROOT'],'',str_replace('\\','/',SA_PATH)).'/');
// if(!file_exists(SA_PATH.'/inc/install.lock')){
// 	header('Location:'.SUB_URL.'install.php');
// }

?>