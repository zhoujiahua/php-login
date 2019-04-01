<?php
include_once './config.inc.php';
 
$sqlData = "SELECT * FROM admin";
$sqlUser = "SELECT * FROM admin where username = 'jiahua' and  `password` = '123456' ";

$result = $conn->query($sqlUser);
 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. "-Pass: " . $row["password"]. "<br>";
    }
    
} else {
    echo "0 结果";
}
$conn->close();

?>
 