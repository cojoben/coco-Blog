<?php
include 'mysql.php';
$user=$_POST["user"];
$pwd=$_POST['pass'];
$repwd=$_POST["repass"];
$phone=$_POST["phone"];
//空校验
if($user==null or $pwd==null)
{
    echo "User or password is empty";
}
else{
        //手机号校验
    $num=verification($phone);
    if($num!==1)
    {
        echo "Illegal mobile phone number";
    }
    else{
        //密码校验
        if($pwd!=$repwd)
        {
            echo "Inconsistent passwords";
        }
        //已经注册的用户不允许注册
        else{
            $sql="SELECT * FROM php.`user` WHERE php.`user`.username='$user';";
            $num=dql_detail($sql,$con);
            if($num==1){
                echo "User exists";
            }
        //未注册的用户进行注册
            else{
                $sql="insert into php.`user`(username,`password`,tel) values('$user','$pwd','$phone');";
                $num=dml_detail($sql,$con);
                if($num==1){
                    echo "login success";
                }
                else{
                    echo "login failed";
                }
            }
        }
    }
}




?>