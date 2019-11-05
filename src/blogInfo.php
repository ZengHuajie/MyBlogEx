<?php
    header("Content-Type:text/html;charset=UTF-8");
    $blog_account = $_POST["blog-account"];
    $blog_title = $_POST["blog-title"];
    $blog_content = $_POST["blog-content"];

    /*
    $servername = "116.62.50.190";
    $username = "root";
    $password = "password";
    $dbname = "dylan";
    // 创建链接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检查数据库
    if($conn->connect_error) {
        die("连接失败：" .$conn->connect_error);
    }
    // 设置数据库格式
    mysqli_query($conn, "SET NAMES UTF8");
    // sql语句，插入数据
    //mysqli_query($con, "INSERT INTO Account (account, userName, password) VALUES ('$account', '$userName', '$password')");
    mysqli_query($conn, "INSERT INTO BlogInfo (blogAccount, blogTitle, blogContent) VALUES ('$blog_account', '$blog_title', '$blog_content')");
    */

    // 连接数据库
    $con = mysqli_connect("116.62.50.190","root","password");
    mysqli_select_db($con, "dylan");
    mysqli_query($con, "SET NAMES UTF8");
    $sql = "INSERT INTO BlogInfo (blogAccount, blogTitle, blogContent) VALUES ('$blog_account', '$blog_title', '$blog_content')";
    if(mysqli_query($con, $sql)) {
        echo "新纪录插入成功";
    } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    echo $blog_account;
    echo $blog_title;
    echo $blog_content;

?>