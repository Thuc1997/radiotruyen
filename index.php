<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/radiotruyenn/">
    <link rel="stylesheet" href="./css/toantrang.css">
    <link rel="stylesheet" href="./css/reponsiive.css">
    <link rel="stylesheet" href="./css/chitietsp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    <link rel="shortcut icon" href="https://radiotruyen.info/upload/images/logo/logoradio.png" />
    <title>Truyện Audio Online - Kho Truyện MP3 Hay Nhất</title>
</head>
<body class="preloading">
<div class="app">           
            <?php  
            
///đặt biến tạm
                if(isset($_GET['quanly'])){
                    $tam = $_GET['quanly'];
                }else{
                    $tam = '';
                }
             include('./DB/conect.php');
             include('./include/header.php');
                
            ?>  
    <div class="max-wapp">
            <?php   
///xử lý kéo các phần vào
                if($tam=='danhmuc'){
                    include('./include/danhmuc.php');
                }else if($tam=='search'){    
                    include('./include/search.php');       
                }else if($tam=='chitietsp'){
                    include('./include/chitietsp.php');
                }else if($tam=='blog'){
                    include('./include/blog.php');
                }else{
                    include('./include/slider.php');
                    include('./include/main.php');
                }
            ?>
          
    </div>
            <?php
                include('./include/footer.php');          
            ?>
</div>
<a class="back-top">
        <img src="https://blogradio.vn/frontend_res/assets/img/svg/icon-back-top.svg" alt="">
</a>
<div class="loader">
            <div class="loadd1">
                    <span class="fab fa-react xoay icon"></span>
            </div>
       <p>React JS</p>
</div>  
    <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>  
    <script src="./java/jquery-3.6.0.min.js"></script>
    <script src="./java/active.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


<script type="text/javascript">
const player = new Plyr('video', {captions: {active: true}});

// Expose player so it can be used from the console
window.player = player;
</script>

</body>
</html>