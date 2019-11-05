<?php

//$db 是数据库的连接资源
$db = new MySQLi("116.62.50.190","root","password","dylan");
!mysqli_connect_error() or die("数据库连接错误");
$db->query("set names utf8");
 
//写sql语句
//$sql = "select * from Account";
$sqlCommand = $_POST['sqlCommand'];

//$sqlSelect = 'SELECT * FROM Account WHERE account = \'855876@qq.com\'';
$sqlCommandRes = $db->query($sqlCommand);
//$test = $db->query($sqlSelect);

var_dump("test-->", $test);
if($sqlCommandRes->num_rows == 0){
    echo "'Empty result!'";
} 
else {
    while ($row = $sqlCommandRes->fetch_assoc()) {
    var_dump($row, " </br>");
    echo json_encode($row); 
    }  
}
//执行sql 语句 返回 <b>结果集</b>
//$res = $db->query($sqlSelect);
//把结果集转成数组 from form    

/*      
var_dump("db->query->res->",$res);
while ($row = $res->fetch_assoc()) {
    var_dump("</br> </br>",$i,"-->",$row, " </br>");         
    $i++;       
    //$brr[] = implode(",", $row['user_name']);
    //echo json_encode($row); 
    
}        */   
    
//echo $sqlSelect;       
//echo 'SELECT * FROM Account WHERE account = \'857875876@qq.com\'';                  
?>