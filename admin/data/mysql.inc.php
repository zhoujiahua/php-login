<?php
include "config.inc.php";

# 数据库连接
function connect($host = DB_HOST, $user = DB_USER, $password = DB_PASSWORD, $database = DB_DATABASE, $port = DB_PORT)
{
    # 创建连接
    $conn = new mysqli($host, $user, $password, $database, $port);
    # 判断数据库是否连接成功
    if ($conn->connect_error) {
        exit("连接失败: " . $conn->connect_error);
    }
    # 设置数据库查询数据编码
    $conn->query("SET NAMES UTF8");
    return $conn;
}

# 执行一条SQL语句,返回结果集对象或者返回布尔值
function execute($conn, $query)
{
    $result = $conn->query($query);
    if ($conn->connect_error) {
        exit($conn->connect_error);
    }
    return $result;
}

# 执行一条SQL语句，只会返回布尔值
function execute_bool($conn, $query)
{
    $bool = mysqli_real_query($conn, $query);
    if (mysqli_errno($conn)) {
        exit(mysqli_error($conn));
    }
    return $bool;
}

# 执行多条SQL语句
function execute_multi($conn, $arr_sqls, &$error)
{
    $sqls = implode(';', $arr_sqls) . ';';
    if (mysqli_multi_query($conn, $sqls)) {
        $data = array();
        $i = 0; #计数
        do {
            if ($result = mysqli_store_result($conn)) {
                $data[$i] = mysqli_fetch_all($result);
                mysqli_free_result($result);
            } else {
                $data[$i] = null;
            }
            $i++;
            if (!mysqli_more_results($conn)) break;
        } while (mysqli_next_result($conn));
        if ($i == count($arr_sqls)) {
            return $data;
        } else {
            $error = "sql语句执行失败：<br />&nbsp;数组下标为{$i}的语句:{$arr_sqls[$i]}执行错误<br />&nbsp;错误原因：" . mysqli_error($conn);
            return false;
        }
    } else {
        $error = '执行失败！请检查首条语句是否正确！<br />可能的错误原因：' . mysqli_error($conn);
        return false;
    }
}

# 获取记录数
function num($conn, $sql_count)
{
    $result = execute($conn, $sql_count);
    $count = mysqli_fetch_row($result);
    return $count[0];
}

# 数据入库之前进行转义，确保，数据能够顺利的入库
function escape($conn, $data)
{
    if (is_string($data)) {
        return mysqli_real_escape_string($conn, $data);
    }
    if (is_array($data)) {
        foreach ($data as $key => $val) {
            $data[$key] = escape($conn, $val);
        }
    }
    return $data;
    # mysqli_real_escape_string($conn,$data);
}

# 关闭与数据库的连接
function close($conn)
{
    // mysqli_close($conn);
    $conn->close();
}

?>