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
    function doPost(){
        location.href="./coco-web.php";
    }
    
</script>
<body>
    <fieldset>
        <?php 
            include 'mysql.php';
            $id=$_GET['id'];
            $rsp=query_fetch_all("select headname,content from php.blog WHERE id='$id'",$con);
            foreach($rsp as $res){
                $headname=$res['headname'];
                $headname=htmlspecialchars($headname);
                $content=$res['content'];
                $content=htmlspecialchars($content);
                echo "<div style='height: 20%;'>$headname</div>";
                echo "<div style='height: 70%;'>$content</div>";
            }
        ?>
        <div style="height: 12%;"><input type="button" style="background-color: rgb(198, 234, 234);" onclick="doPost()" value="返回"></div>
    </fieldset>
</body>
</html>