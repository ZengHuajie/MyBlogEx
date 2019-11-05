<?php
                      
header("Content-Type:text/html;charset=utf-8");

$account = $_POST["exampleInputEmail1"];
$password = $_POST["exampleInputPassword1"];

if($account == "" && $password == "") {
    echo "账号密码不能为空";
}else if($account == "") {
    echo "账号不能为空";
}else if($password == "") {
    echo "密码不能为空";
}else {
    // 数据库连接
    //$db 是数据库的连接资源 
    /*
    $db = new MySQLi("116.62.50.190","root","password","dylan");
    !mysqli_connect_error() or die("数据库连接错误");
    $db->query("set names utf8");
     */
    
    $con = mysqli_connect("116.62.50.190","root","password");
    //mysql_select_db("dylan", $con);
    mysqli_select_db($con, "dylan"); 
    mysqli_query($con, "SET NAMES UTF8");
    
    $exist = mysqli_query($con, "SELECT * FROM Account WHERE account = '$account' AND passWord = '$password'");
    $exist_result = mysqli_num_rows($exist);
    if($exist_result) {
        echo "登录成功";
    }else {
        echo "账号或密码错误！登录失败";
    }    
}

?>