<?php 
include 'mysql.php';
session_start();
$headname=$_POST['headline'];
$headname=addslashes($headname);
$content=$_POST['content'];
$content=addslashes($content);
$user=$_SESSION['username'];
//空校验
if($headname==null or $content==null)
{
    echo "headname or content is empty";
}
else{
    $sql="INSERT php.blog(headname,content,author) VALUES('$headname','$content','$user');";
                $num=dml_detail($sql,$con);
                if($num==1){
                    echo "Publish successfully";
                }
                else{
                    echo "failed";
                }               
}
?>