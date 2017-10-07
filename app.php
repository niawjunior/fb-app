<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>App</title>
    <?php 
    date_default_timezone_set("Asia/Bangkok");
    $id = $_GET['id'];
        if($_GET['id']){
            $title = $_GET['fname'];
            $time = $_GET['time'];
            
            $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $images = 'http://' .$_SERVER['HTTP_HOST'].'/app/img/'.$_GET['id'].$time.'.jpg';
            $text = 'เช็คเพื่อนใหม่ของคุณได้ที่นี่ ->';
        }
    ?>
    <meta property="og:title" content="<?php echo 'นี่คือเพื่อนใหม่ทั้ง 20 คนของคุณ '.$title;?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $url;?>" />
    <meta property="og:image" content="<?php echo $images;?>" />
    <meta property="og:description" content="<?php echo  $text;?>" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="500" />
    <meta property="fb:app_id" content="1702339276748394" />
        <script src="jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <script src="html2canvas.min.js"></script>
        <link href="app.css" rel="stylesheet">
    </head>
    <a href="https://github.com/niawjunior/fb-app"><img style="position: absolute; top: 0; right: 0; border: 0; width: 149px; height: 149px;" src="img/fork-me.png" alt="Fork me on GitHub"></a>
    <body>
        <div id="fb-root"></div>
        <div class="container" style="margin-top:5%">
            <div class="col-xs-12">
                <?php
                    $image_url = $_GET["url"];
                    $name = $_GET["id"];
                    $fname = $_GET["fname"];
                    $lname = $_GET["lname"];
                    copy($image_url, 'img/'.$name.'.jpg');
                    ?>
                    <center>
                    <div id="content_page_data">
                        <div id="capture-area" style="box-shadow: 10px 10px 5px #1d2935; display:block;color:#000;">
                        <br/>
                        <h4 style="margin-top:2%;text-align: left;margin-left:7%;">สวัสดีเพื่อนใหม่ทั้ง 25 คน</h4>
                        <div id="logo"></div>
                        <div style="margin-bottom:2%;margin-top:2%" id="friends"></div>
                        </div>
                        <br/>
                        <button onclick="window.location.href='index.php'" style="margin-top:2%;cursor: pointer;" class="btn btn-success btn-lg">HOME</button>
                        <button style="margin-top:2%;cursor: pointer;" id="share" class="btn btn-primary btn-lg">SHARE <img width="20px" src="img/social.png"></button>
                    </div>
                    </center>
            </div>
        </div>
        </div>
        <br/>
        <br/>
        </div>
    </body>
    <script>
        document.getElementById('logo').src = 'img/'+<?php echo $_GET['id'];?>+'.jpg';
    </script>
    <script type="text/javascript" src="app.js"></script>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $time = $_POST['time'];
    $img = $_POST['img'];
    $id = $_POST['id'];
    $img = substr(explode(";",$img)[1], 7);
    $target=$id.$time.'.jpg';
    file_put_contents('img/'.$target, base64_decode($img)); 
}
?>

<input id="log_time" type="text" value="<?php echo $time?>" style="display:none">