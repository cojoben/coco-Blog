<?php

use LDAP\Result;
$ip="localhost";//数据库地址
$dbuser="root";//数据库用户
$passwd="kk515638680";//数据库密码
$dbname="php";//数据库名称
$dbport=3306;//数据库端口，默认为3306

$con=mysqli_connect($ip,$dbuser,$passwd,$dbname,$dbport);
//校验用户名和密码
function dql_detail($sql,$con){   
    mysqli_query($con,'set names utf8');
    $res=mysqli_query($con,$sql);
    $results=mysqli_num_rows($res);
    return $results;
}
//查询有多少行
function dorecord($mysql,$table,$con){
    $sql="SELECT * FROM $mysql.`$table`;";
    $res=mysqli_query($con,$sql);
    $results=mysqli_num_rows($res);
    print_r($results);
}
//手机号校验
function verification($phone){
    $pattern="/^1[3-9][0-9]{9}$/";
    $out=preg_match($pattern,$phone);
    return $out;
}
//校验dml语句是否执行成功
function dml_detail($sql,$con){
    mysqli_query($con,'set names utf8');
    $res=mysqli_query($con,$sql);
    return $res;
}
//查询数据
function query_fetch_all($sql,$con)
{
    mysqli_query($con,'set names utf8');
    $res=mysqli_query($con,$sql);
    $result=mysqli_fetch_all($res,MYSQLI_ASSOC);
    return $result;
}
?>