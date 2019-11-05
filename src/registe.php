<?php

    header("Content-Type:text/html;charset=utf-8");

    // 获取账号、用户名、密码
    $account = $_POST["exampleInputEmail1"];
    $userName = $_POST["exampleInputName1"];
    $password = $_POST["exampleInputPassword1"];

    // 连接数据库
    $con = mysqli_connect("116.62.50.190","root","password");
    //mysql_select_db("dylan", $con);
    mysqli_select_db($con, "dylan");
    mysqli_query($con, "SET NAMES UTF8");

    // 查询数据库是否存在该用户
    $exist = mysqli_query($con, "SELECT * FROM Account WHERE account = '$account'");
    $exist_result = mysqli_num_rows($exist);

    if($account == "" && $userName == "" && $password) {
        echo "账号、用户名、密码不能为空！";
    }else if($account == "" && $userName == "") {
        echo "账号、用户名不能为空！";
    }else if($account == "" && $password == "") {
        echo "账号、密码不能为空！";
    }else if($account == "") {
        echo "账号不能为空！";
    }else if($userName == "" && $password == "") {
        echo "用户名、密码不能为空！";
    }else if($userName == "") {
        echo "用户名不能为空！";
    }else if($password == "") {
        echo "密码不能为空！";

    }else {
        // 判断这些字符串是否由数字组成
        if(preg_match("/^[0-9]*(\.[0-9]+)*$/", $account)) {
            if(!(preg_match('/^0?1[3|4|5|6|7|8][0-9]\d{8}$/', $account))) {
                // 判断这些字符串是否为手机号码的格式
                echo "请输入正确的手机号码";
            }else {
                if($exist_result) {
                    // 如果存在该用户
                    echo "该账号已被注册";
                } else {
                  // 插入数据库
                  mysqli_query($con, "INSERT INTO Account (account, userName, password) VALUES ('$account', '$userName', '$password')");
                  echo "注册成功！";
                }
            }

        // 判断这些字符串是否为邮箱的格式
        }else if(!(preg_match('/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/', $account))) {
            echo "请输入正确的邮箱格式";
        }else {
            if($exist_result) {
                // 如果存在该用户
                echo "该账号已被注册";
            } else {
              // 插入数据库
              mysqli_query($con, "INSERT INTO Account (account, userName, passWord) VALUES ('$account', '$userName', '$password')");
              echo "注册成功！";
            }
        }

    }

?>