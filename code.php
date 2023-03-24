<?php
session_start();
$code=vcode();
$code=strtolower($code);
$_SESSION['code']=$code;
function vcode(){
//声明PHP头部内容类型：图片
header("content-type:image/png");
//准备画布
$image=imagecreate(80,20);
//准备随机字符
$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$code=substr(str_shuffle($chars),0,4);#设置前4位的随机字符
//设置背景色
imagecolorallocate($image,100,200,100);
//设置字体颜色
$color=imagecolorallocate($image,0,0,0);
//装载随机字符在图片上
imagestring($image,5,20,5,$code,$color);//5：font默认字体,20- X坐标,5- Y坐标
//设置干扰元素
for ($i=0;$i<10;$i++){
    imagesetpixel($image,rand(0,80),rand(0,20),$color);
}
//输出图片
imagepng($image);
//销毁历史图片
imagedestroy($image);
return $code;
}
?>
