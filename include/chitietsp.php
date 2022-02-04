<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }
 
    $chitiet = mysqli_query($con,"SELECT * FROM tbl_producation,tbl_audio WHERE tbl_producation.produca_id=tbl_audio.produca_id 
    AND tbl_producation.produca_id ='$id'");
    $titlee = mysqli_query($con,"SELECT * FROM tbl_producation WHERE tbl_producation.produca_id ='$id'");
    $athor = mysqli_query($con,"SELECT * FROM tbl_producation,tbl_menu WHERE tbl_producation.produca_id = '$id' AND tbl_producation.produca_move = tbl_menu.menu_id");
    require_once "laytin.php";
?>

<div class="main">
<div class="main_one">
<div id="slider">
        <img onerror="this.src='http://placehold.it/1160x280'" src="<?php echo $matchet1[5]?>" alt="" >
</div>
    <div class="play">
        <div class="main_left">
            <?php
                while($titlee1 = mysqli_fetch_array($titlee)){
                ?>
 
                <img src="./image/<?php echo $titlee1['produca_image']?>" alt="">

        </div>
        <div class="main_right">
                <h1><?php echo $titlee1['produca_name']?></h1>

            <div class="play_list">
                <div class="top_play">
                                <div class="progress-area">
                                        <div class="progress-bar">
                                                <audio id="main-audio" src=""></audio>
                                        </div>
                                        <div class="song-timer">
                                                <span class="current-time">0:00</span>
                                                <span class="max-duration">0:00</span> 
                                        </div>
                                </div>

                                <div class="controls">
                                    <i id="prev" class="fas fa-backward"></i>
                                        <div class="play-pause">
                                            <i class="material-icons play">play_arrow</i>
                                        </div>
                                    <i id="next" class="fas fa-forward"></i>
                                </div> 
                </div>
                        <div class="bottom_list">
                            <ul>
                                <?php
                                    while($chitiet2=mysqli_fetch_array($chitiet)){  
                                ?>
                                    <li><a class="play_media" href="javascript:void(0)" data-file="../audio/<?php echo $chitiet2['audio_name']?>"><?php echo $chitiet2['audio_title']?></a></li>

                                    <?php
                                    }
                                    ?>
                            </ul>
                        </div>
                </div>
                <div class="tua">
                        <div class="tua_left">
                                <input type="button" value="-2m">
                                <input type="button" value="-1m">
                                <input type="button" value="-30s">
                                <input type="button" value="-10s">
                        </div>
                        <div class="tua_right">
                                <input type="button" value="+10s">     
                                <input type="button" value="+30s">
                                <input type="button" value="+1m">
                                <input type="button" value="+2m">
                                <input type="button" value="+5m">
                                <input type="button" value="Tốc độ phát 1x" id="end_btn">
                        </div>
                </div>
                <div class="hengio">
                        <img src="https://radiotruyen.info/public/resource/image/timer-icon.png" alt="">
                        <button id="hengio">hẹn giờ</button>
                        <button id="tathen">tắt hẹn giờ</button>                    
                </div>


                  <div class="useronline">
                        <p><span class="listen_color">11</span> người đang nghe</p>
                         <p><i class="fa fa-headphones"></i>&nbsp lượt nghe: <span class="listen_top"><?php echo number_format($titlee1['produca_listen'])?></span></p>           
                  </div>   

                <div class="tacgiaa">
                <?php
                while($atho = mysqli_fetch_array($athor)){
                ?>
                         <p><label for="">Giọng đọc: </label><a href=""><?php echo $atho['menu_name']?></a></p>                  
                         <p><label for="">Thể loại: </label><a href="">đang cập nhật</a></p>
                 <?php
                    }
                ?>      
                </div>

            </div>
   
        </div>  
        <div class="description">
            <span><?php echo $titlee1['produca_mota']?></span>                    
        </div>
<?php
        }
?>        

        <div id="slider">
                    <img onerror="this.src='http://placehold.it/1160x280'" src="<?php echo $matchet1[6]?>" alt="" class="none_mobile">
        </div>  

        </div>
        
</div>
