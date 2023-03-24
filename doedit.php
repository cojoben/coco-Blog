<?php 
include 'mysql.php';
session_start();
$headname=$_POST['headline'];
$content=$_POST['content'];
$user=$_SESSION['username'];
$id=$_POST['id'];
//空校验
if($headname==null or $content==null)
{
    echo "headname or content is empty";
}
else{
    $sql="update php.blog set headname='$headname',content='$content' WHERE id=$id;";
                $num=dml_detail($sql,$con);
                if($num==1){
                    echo "Publish successfully";
                }
                else{
                    echo "failed";
                }               
    }
?>