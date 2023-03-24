<?php
include "mysql.php";
$id=$_GET['id'];
$sql="delete from php.blog WHERE id='$id';";
$num=dml_detail($sql,$con);
if($num==1)
{
    echo "<script>location.href='coco-web.php'</script>";
}
else{die ("删除失败");}
?>