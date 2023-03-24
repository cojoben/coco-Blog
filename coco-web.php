<?php 
session_start();
if(@$_SESSION['password']!=1)
{
    die('未登录');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url('./wb_20221209152653.jpg');
            color: white;
        }
        #out{
            border: 0px solid red;
            width: 60%;
            height: 400px;
            margin:auto;
            margin-top: 150px;
        }
        #out div{
            float: left;
            border: 1px solid black;
            height: 40px;
        }
        .one{
            width: 10%;
            text-align: center;
        }
        .two{
            width: 50%;
            text-align: center;
        }
        .three{
            width: 10%;
            text-align: center;
        }
        .menu{
            width:10%
        }
        #link{
            text-align: center;
        }
        #top{
            color: orange;
            width: 300px;
            margin: auto;
            font-size: 30px;
        }
        button{
            margin-top: 10px;
            margin-left: 18px;
            font-size: 16px;
        }
        a{
            color: white;
            text-decoration: none;
        }
        #exit{
            float: right;
        }
    </style>
    <script>
        function doEdit(id){
            location.href="doedit-web.php?id="+id;
        }
        function doDel(id){
            var clickresult=false;
            clickresult=window.confirm("你确定要删除该文章吗?");
            if(clickresult==true){
            location.href="./dodel.php?id="+id;
            }
        }
    </script>
</head>
<body>
    <div id="top">个人中心<div id="exit"><a href="./index-u.php">返回首页</a></div></div>
    <div id='out'>
    <?php
    echo "<div class='one'>编号</div> ";
    echo "<div class='two'>标题</div>";
    echo "<div class='three'>作者</div>";
    echo "<div class='three'>操作1</div>";
    echo "<div class='three'>操作2</div>";
    //数据库查询数据，显示在当前页面，select 
    include 'mysql.php';
    $user=$_SESSION['username'];
    $rsp=query_fetch_all("select id,headname,author from php.blog where author='$user'",$con);
    foreach($rsp as $res){
        $id=$res['id'];
        $id=htmlspecialchars($id);
        $headname=$res['headname'];
        $headname=htmlspecialchars($headname);
        $author=$res['author'];
        $author=htmlspecialchars($author);
        echo "<div  class='one'>$id</div> ";
        echo "<div class='two'><a href=blog-web.php?id=$id>$headname<a></div>";
        echo "<div class='three'>$author</div>";
        echo "<div class='menu'><button onclick='doEdit($id)'>编辑</button></div>";
        echo "<div class='menu'><button onclick='doDel($id)'>删除</button></div>";
    }
    ?>
    </div>
    <div id ='link'><a href="./doblog-web.php" >发表文章</a></div> 
</body>
</html>