<?php

//$db �����ݿ��������Դ
$db = new MySQLi("116.62.50.190","root","password","dylan");
!mysqli_connect_error() or die("���ݿ����Ӵ���");
$db->query("set names utf8");
 
//дsql���
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
//ִ��sql ��� ���� <b>�����</b>
//$res = $db->query($sqlSelect);
//�ѽ����ת������ from form    

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