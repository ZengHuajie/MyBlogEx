<?php
    $host = "116.62.50.190";
    $username = "root";
    $password = "password";
    $dbName = "dylan";
    $conn = new mysqli($host, $username, $password, $dbName, $port);
    if (!$conn) {
        die("error:" . $conn->connect_error);
    }
    $sql = "select * from BlogInfo";
    //设置查询结果的编码，一定要放在query之前
    $conn->query("SET NAMES 'UTF8'");
    $result = array();
    //$conn->query()获取的是二进制
    //将查询的结果集封装到一个数组里
    $result_query =;
    while ($row = mysqli_fetch_assoc($result_query)) {
        $result[] = $row;
    }
    if ($result) {
        echo json_encode($result);
    } else {
        echo mysqli_errno();
    }
    //以json的格式发送ajax的success中由data接收


?>