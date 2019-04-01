<?php
    echo 'Heoll api';
    // include 'db.php';
    require('db.php');

    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if($action == 'news'){
        // $news = array("title1" => "我是新闻标题1","title2" => "我是新闻标题1");
        $news = ['我是新闻标题1','我是新闻标题2','我是新闻标题3'];
        echo json_encode($news);
    }else if($action == "login"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userlogin = "SELECT * FROM  `user` WHERE `username` = 'jiahua' AND `password` = '123456' ";
        $queryLogin = $conn -> query($userlogin);
        

        echo $queryLogin;

        echo '用户：'.$username.'------'.'密码：'.$password;
    }


    //查询用户数据
    $sql = "SELECT * FROM `user`";
    $sqlc = "SELECT COUNT(*) FROM  `user`";
    $result = $conn -> query($sql);
    
    // $count = mysql_num_rows(mysql_query($sql));
    // $count = mysql_fetech_array(mysql_query($sqlc));
    $count = $conn -> query($sqlc);
    // var_dump($count)

    echo "当前数据条数：";

    
    $data = [];
    if($result -> num_rows > 0){
        //用户数据
        $users = array();
        while($row = $result -> fetch_assoc()){
            $users[$row['username']] = $row['password'];
        }
        array_push($data,$users);
    }else{
        echo json_encode(['count'=>'0']);
    }
    
    //返回JSON数据
    echo json_encode($data);

?>