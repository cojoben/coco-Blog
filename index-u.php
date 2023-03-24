<?php 
session_start();
if(@$_SESSION['password']!=1)
{
    die('未登录');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="./css.css">
    <title>主页</title>
</head>
<body>
    <div class="wrapin">
        <div class="top">
            <div class="tx"><img src="./img/1.jpg"></div>
            <font color="white">
                <p class="Name">ReggaeShark</p>
                <?php
                $user=$_SESSION['username'];
                echo "<div class='autograph'style='color:red ;'>$user</div>"
                ?>
        </font></div>
        <div class="menu"> <a href="./index.php">注销</a><a href="./coco-web.php">个人中心</a>
        </div>
        <div class="index_word1">
            <div class="personal">
                <h3 style="color:red ;">X神黑客技术联盟</h3>
                <p>欢迎来到coco的私人博客</p>
                <p>管理员QQ:515638680</p>
            </div>
            <div class="audio">
                <h3>歌曲名称</h3>
                <audio width="100%" height="30" controls="controls">
          <source src="./index.mp3">
        </audio>
            </div>
        </div>
        <div class="right">
            <div class="index_word2">
                <h3 class="bar">留言板</h3>
                <div class="msg pad">
                    <form>
                        <div> <span class="fl">姓名：</span>
                            <input type="text" size="50" class="ip">
                        </div>
                        <div> <span class="fl">内容：</span>
                            <textarea class="ip" rows="4"></textarea>
                        </div>
                        <div> <span class="fl">提交：</span>
                            <input type="submit" value="提交">
                        </div>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
            <?php
            include 'mysql.php';
            $rsp=query_fetch_all("select id,headname,author from php.blog",$con);
            foreach($rsp as $res){
                $id=$res['id'];
                $headname=$res['headname'];
                $headname=htmlspecialchars($headname);
                $author=$res['author'];
               echo"<div class='index_word2'>
                <h3 class='bar'>最新文章</h3>
                <ul>
                    <li><a href=blog-web.php?id=$id>$headname</a></li>
                </ul>
                <div class='clear'></div>
            </div>";}
            ?>
        
            
            <div class="index_word2">
                <h3 class="bar">留言</h3>
                <ul>
                    <li><a href="liuyan.html">· [simle]好久不见，顺便来看看你，最近好吗？</a></li>
                    <li><a href="liuyan.html">· [清风]那些年我们一起吃过的泡面</a></li>
                    <li><a href="liuyan.html">· [不怕啦]我又来了...</a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="banner">
        <div id="photo">
            <img src="./img/2.jpg">
            <img src="./img/3.jpeg">
            <img src="./img/4.jpeg">
            <img src="./img/5..jpg">
        </div>
    </div>



    <!-- <embed src="file/v.mp3" hidden="true" autostart="true" loop="true"> -->
    <div class="clear"></div>
</body>

</html>
