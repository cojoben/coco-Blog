<?php 
//设定时区为中国时区
date_default_timezone_set("PRC");
//开启session会话
session_start();
//采集前端数据
$user=addslashes($_POST["username"]);
$pwd=addslashes($_POST["password"]);
$code=strtolower($_POST["vcode"]);//万能验证码
$time2=date('Y-m-d H:i:s');
//验证码校验
if($code!==@$_SESSION['code'] and $code!=='0000'){
    die('验证码错误');
    echo  "<script>location.href='sign.html'</script>";
}
else{
    unset($_SESSION['code']);
}
//数据库校验
include 'mysql.php';//连接到数据库php
$sql="SELECT php.`user`.role FROM `user` WHERE username='$user'";
$role=query_fetch_all($sql,$con);
if($role[0]['role']=='blacklist' && (strtotime($time2)-strtotime($time1))<3600){
    die ("输入错密码三次,请稍后再试");
}
if($role[0]['role']=='blacklist' && (strtotime($time2)-strtotime($time1))>3600){
    $sql="update php.`user` set role='guest' where username='$user';";
    dml_detail($sql,$con);
}
$sql="SELECT * FROM php.`user` WHERE php.`user`.`password`='$pwd'and php.`user`.username='$user';";
$num=dql_detail($sql,$con);
if($num==1){
    $_SESSION['username']=$user;
    $_SESSION['password']=true;
    $sql="update php.`user` set num='0' where username='$user';";
    dml_detail($sql,$con);
    echo "<script>location.href='index-u.php'</script>";
}
else{
    //校验输入用户是否存在
    $sql="SELECT * FROM php.`user` WHERE php.`user`.username='$user';";
    $num=dql_detail($sql,$con);
    if($num==1){
        //存在则更新用户状态
        $sql="update php.`user` set num=num+1 where username='$user';";
        dml_detail($sql,$con);
        //判断用户是否输错密码3次
        $sql="SELECT php.`user`.num FROM `user` WHERE username='$user'";
        $num2=query_fetch_all($sql,$con);
        if($num2[0]['num']>4){
            //将用户加入黑名单
            $sql="update php.`user` set role='blacklist' where username='$user';";
            dml_detail($sql,$con);
            //将用户次数清零
            $sql="update php.`user` set num='0' where username='$user';";
            dml_detail($sql,$con);
            $time1=date('Y-m-d H:i:s');
        }
    }
    echo "账号或密码错误";
}
// <script>location.href='index.php'</script> //跳转到登录完成php
?>