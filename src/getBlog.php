<?php

header("Content-Type:text/html;charset=utf-8"); 
// 连接数据库
$conn = mysqli_connect("116.62.50.190","root","password");
mysqli_select_db($conn, "dylan"); 
mysqli_query($conn, "SET NAMES UTF8");
 
if($conn->connect_error){
 die("连接失败:".$conn->connect_error);
}

//$sql = "SELECT * FROM BlogInfo";
//$sql_notice = $conn->query($sql);
//$notice = mysqli_fetch_array($sql_notice, MYSQLI_ASSOC);
//$str = json_encode($notice);
//$str= preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2', 'gbk', pack('H4', '\\1'))", $str);
//echo $str;

$result = $conn->query("SELECT * FROM BlogInfo");
//$conn->query()获取的是二进制
//将查询的结果集封装到一个数组里
$css=$result->fetch_all();
//$str = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", json_encode($css));  
                         
echo json_encode($css);


?>