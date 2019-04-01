<?php 
date_default_timezone_set("PRC");   //系统使用北京时间

require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

define('KEY', '1gHuiop975cdashyex9Ud23ldsvm2Xq');

// header('Access-Control-Allow-Origin:*');  
$res['result'] = 'failed';

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'login') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = htmlentities($_POST['user']);
        $password = htmlentities($_POST['pass']);
        
        if ($username == 'cnki' && $password == 'cnki123') { //用户名和密码正确，则签发tokon
            $nowtime = time();
            $token = [
                'iss' => 'http://www.cnki.net', //签发者
                'aud' => 'http://www.cnki.net', //jwt所面向的用户
                'iat' => $nowtime, //签发时间
                'nbf' => $nowtime + 10, //在什么时间之后该jwt才可用
                'exp' => $nowtime + 600, //过期时间-10min
                'data' => [
                    'userid' => 1,
                    'username' => $username
                ]
            ];
            $jwt = JWT::encode($token, KEY);
            $res['result'] = 'success';
            $res['jwt'] = $jwt;
        } else {
            $res['msg'] = '用户名或密码错误!';
        }
    }
    
    echo json_encode($res);

} else {
    $jwt = isset($_SERVER['HTTP_X_TOKEN']) ? $_SERVER['HTTP_X_TOKEN'] : '';

    //验证Token是否存在
    if (empty($jwt)) {
        $res['msg'] = 'You do not have permission to access.';
        echo json_encode($res);
        exit;
    }

    //Token验证
    try {
        JWT::$leeway = 60;
        $decoded = JWT::decode($jwt, KEY, ['HS256']);
        $arr = (array)$decoded;
        if ($arr['exp'] < time()) {
            $res['msg'] = '请重新登录';
        } else {
            $res['result'] = 'success';
            $res['info'] = $arr;
        }
    } catch(Exception $e) {
        $res['msg'] = 'Token验证失败,请重新登录';
    }

    echo json_encode($res);
}
