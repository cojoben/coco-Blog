<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="./jquery-3.4.1.min.js"></script>
<style>
    body{
        background-image: url('./wb_20221209152653.jpg');
    }
    fieldset{
        width: 50%;
        height: 300px;
        margin: auto;
        margin-top: 200px;
        background-repeat: no-repeat;
        background-size: 100%;
        border-radius: 10px;
    }
    div{
        border:  1px solid gray;
        text-align: center;
        font-size: 20px;
    }
    input{
        width: 50%;
        height: 30px;
        font-size: 15px;
    }
</style>
<script>
    function doPost(id){
        var headline=$('#headline').val();
        var content=$('#content').val();
        var data="headline="+headline+"&content="+content+"&id="+id;
        $.post(
            './doedit.php',
            data,
            function (data){
                alert(data);
                if(data=='Publish successfully'){
                    alert('发表成功');
                    location.href="./coco-web.php"
                }
                else if(data=='headname or content is empty')
                {
                    alert('文章名称或内容不能为空');
                    location.href="./coco-web.php.php"
                }
                else{
                    alert('发表失败');
                    location.href="./coco-web.php"
                }
            }
        );
    }
</script>
<body>
    <?php 
    session_start();
    if(@$_SESSION['password']!=1)
    {
        die('未登录');
    }
    ?> 
    <fieldset>
        <?php
        include 'mysql.php';
        $id=$_GET['id'];
        $rsp=query_fetch_all("select headname,content from php.blog WHERE id='$id'",$con);
        foreach($rsp as $res){
            $headname=$res['headname'];
            $content=$res['content'];
            echo "<div style='height: 20%;'><input type='text' id='headline' name='headline' placeholder=文章标题 value='$headname'></div>";
            echo "<div style='height: 70%;'><textarea name='content' id='content' cols='100' rows='15' placeholder=请发表文章>$content</textarea></div>";
            echo "<div style='height: 12%;'><input type='submit' style='background-color: rgb(198, 234, 234);'onclick='doPost($id)'></div>";
        }
        ?>
    </fieldset>
</body>
</html>