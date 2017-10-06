<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>App</title>
    <?php 
        if($_GET['id']){
            $title = $_GET['fname'];
            $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $images = 'http://' .$_SERVER['HTTP_HOST'].'/app/img/'.$_GET['id'].'.jpg';
            $text = $_GET['fname'];
        }
    ?>
    <meta property="og:title" content="<?php echo $title;?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $url;?>" />
    <meta property="og:image" content="<?php echo $images;?>" />
    <meta property="og:description" content="<?php echo  $text;?>" />
    <meta property="fb:app_id" content="1702339276748394" />
    <head>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.5.2/dom-to-image.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <script type="text/javascript" src="app.js"></script>
        <script src="html2canvas.min.js"></script>
        <link href="app.css" rel="stylesheet">
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script> -->
    </head>
    
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
                        <h4 style="margin-top:2%;text-align: left;margin-left:7%;">สวัสดีเพื่อนใหม่ทั้ง 20 คน</h4>
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
</html>
<script>
document.getElementById('logo').src = 'img/'+<?php echo $_GET['id'];?>+'.jpg';


</script>


