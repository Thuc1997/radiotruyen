
<?php 
require_once "laytin.php";
?>

<div id="slider">
                    <img onerror="this.src='http://placehold.it/1160x280'" src="<?php echo $matchet1[0]?>" alt="" >
</div>

<div class="main_container">
    <div class="newupdate">
            <div class="newupdate_title">
                <a class="newupdate_title-left" href="javascript:void(0)"><i class="newupdate-icon fas fa-play"></i>Truyện mới cập nhật</a>
                    <a class="newupdate_title-right" href="javascript:void(0)"><i class="newupdate-icon fas fa-external-link-alt"></i>Xem thêm</a>
            </div>
            <div class="newupdate_images">
                      <?php 
                        $sql_new = mysqli_query($con,"SELECT DISTINCT * FROM tbl_producation,tbl_menu WHERE tbl_producation.produca_move = tbl_menu.menu_id ORDER BY produca_id DESC LIMIT 16");
                        while($row_new = mysqli_fetch_array($sql_new)){
                            $sp = $row_new['produca_name'];
                            $namee_ct = $row_new['menu_name'];
                    ?> 
                        <a class="newupdate_main" href="<?php echo convert_name($namee_ct)?>/<?php echo convert_name($sp)?>-<?php echo $row_new['produca_id']?>.html">
                            <img src="./image/<?php echo $row_new['produca_image']?>" alt="">
                            <div class="newupdate_time">
                                <h4><?php echo $row_new['produca_name']?></h4>
                                    <p><?php echo $row_new['menu_name']?></p>
                                        <span><i class="newupdate-icon1 fas fa-stopwatch"></i>01:11:25  &emsp; 
                                        <i class="newupdate-icon1 far fa-list-alt"></i><?php echo $row_new['produca_part']?> phần<br>
                                        <i class="newupdate-icon1 fas fa-headphones-alt"></i>Lượt nghe: <?php echo number_format($row_new['produca_listen'])?></span>
                            </div>                   
                        </a>
                    <?php
                        }
                    ?> 
               </div> 
</div>
<div id="slider">
    <img onerror="this.src='http://placehold.it/1160x280'" src="<?php echo $matchet1[1]?>" alt="" class="none_mobile">
</div>  

    <div class="love_story">

        <div class="newupdate_title">
            <a class="newupdate_title-left" href="ngon-tinh-14.html"><i class="newupdate-icon fas fa-play"></i>TRUYỆN NGÔN TÌNH</a>
                <a class="newupdate_title-right" href="ngon-tinh-14.html"><i class="newupdate-icon fas fa-external-link-alt"></i>Xem thêm</a>        
        </div>
        <div class="newupdate_images">
                <?php
                    $sql_lovestory = mysqli_query($con,"SELECT * FROM tbl_producation,tbl_menu WHERE tbl_producation.produca_move = tbl_menu.menu_id AND tbl_producation.menu_id='14' ORDER BY produca_id DESC LIMIT 12");
                   while($row_lovestory = mysqli_fetch_array($sql_lovestory)){
                    
                ?>
            <a class="newupdate_main" href="ngon-tinh/<?php echo convert_name($row_lovestory['produca_name'])?>-<?php echo $row_lovestory['produca_id']?>.html">
                <img src="./image/<?php echo $row_lovestory['produca_image']?>" alt="">
                 <div class="newupdate_time">
                    <h4><?php echo $row_lovestory['produca_name']?></h4>
                        <p><?php echo $row_lovestory['menu_name']?></p>
                            <span><i class="newupdate-icon1 fas fa-stopwatch"></i>02:43:12  &emsp;
                              <i class="newupdate-icon1 far fa-list-alt"></i><?php echo $row_lovestory['produca_part']?> phần<br>
                              <i class="newupdate-icon1 fas fa-headphones-alt"></i>Lượt nghe: <?php echo number_format($row_lovestory['produca_listen'])?></span>
                </div> 
            </a>
                <?php
                    }
                ?>
    </div>
            <div class="button_more-book">        
                <a class="button_more-book1" href="ngon-tinh-14.html">Xem thêm truyện ngôn tình</a>
            </div>

            <div id="slider">
                <img onerror="this.src='http://placehold.it/1160x280'" src="<?php echo $matchet1[2]?>" alt="" class="none_mobile">
            </div>  
            
</div>
        <div class="ghost_story">
            <div class="newupdate_title">
                <a class="newupdate_title-left" href="truyen-ma-5.html"><i class="newupdate-icon fas fa-play"></i>TRUYỆN MA</a>
                    <a class="newupdate_title-right" href="truyen-ma-5.html"><i class="newupdate-icon fas fa-external-link-alt"></i>Xem thêm</a>
            </div>
            <div class="newupdate_images">
                    <?php
                        $sql_gost = mysqli_query($con,"SELECT * FROM tbl_producation,tbl_menu WHERE tbl_producation.produca_move = tbl_menu.menu_id AND tbl_producation.menu_id='5' ORDER BY produca_id DESC LIMIT 12");
                        while($row_gost = mysqli_fetch_array($sql_gost)){
                    ?>
                <a class="newupdate_main" href="truyen-ma/<?php echo convert_name($row_gost['produca_name'])?>-<?php echo $row_gost['produca_id']?>.html">
                    <img src="./image/<?php echo $row_gost['produca_image']?>" alt="">
                    <div class="newupdate_time">
                        <h4><?php echo $row_gost['produca_name']?></h4>
                            <p><?php echo $row_gost['menu_name']?></p>
                                <span><i class="newupdate-icon1 fas fa-stopwatch"></i>01:16:46  &emsp;  
                                <i class="newupdate-icon1 far fa-list-alt"></i><?php echo $row_gost['produca_part']?> phần<br>
                                <i class="newupdate-icon1 fas fa-headphones-alt"></i>Lượt nghe: <?php echo number_format($row_gost['produca_listen'])?></span>
                    </div>
                </a>
                    <?php
                            }
                    ?>
            </div> 
        <div class="button_more-book">                
                <a class="button_more-book1" href="truyen-ma-5.html">Xem thêm truyện ma</a>
        </div>

        <div id="slider">
            <img onerror="this.src='http://placehold.it/1160x280'" src="<?php echo $matchet1[3]?>" alt="" class="none_mobile">
        </div>  

</div>
        <div class="comic_swordplay">
            <div class="newupdate_title">
                <a class="newupdate_title-left" href="truyen-kiem-hiep-8.html"><i class="newupdate-icon fas fa-play"></i>TRUYỆN KIẾM HIỆP</a>
                    <a class="newupdate_title-right" href="truyen-kiem-hiep-8.html"><i class="newupdate-icon fas fa-external-link-alt"></i>Xem thêm</a>
            </div>
            <div class="newupdate_images">
                <?php
                $sql_swordhero = mysqli_query($con,"SELECT * FROM tbl_producation,tbl_menu WHERE tbl_producation.produca_move = tbl_menu.menu_id AND tbl_producation.menu_id='8' ORDER BY produca_id DESC LIMIT 12");
                while($row_swordhero = mysqli_fetch_array($sql_swordhero)){
                ?>
                <a class="newupdate_main" href="truyen-kiem-hiep/<?php echo convert_name($row_swordhero['produca_name'])?>-<?php echo $row_swordhero['produca_id']?>.html">
                    <img src="./image/<?php echo $row_swordhero['produca_image']?>" alt="">
                     <div class="newupdate_time">
                        <h4><?php echo $row_swordhero['produca_name']?></h4>
                            <p><?php echo $row_swordhero['menu_name']?></p>
                                <span><i class="newupdate-icon1 fas fa-stopwatch"></i>03:08:43  &emsp;  
                                <i class="newupdate-icon1 far fa-list-alt"></i>6<?php echo $row_swordhero['produca_part']?> phần<br>
                                <i class="newupdate-icon1 fas fa-headphones-alt"></i>Lượt nghe: <?php echo number_format($row_swordhero['produca_listen'])?></span>
                    </div>
                </a>
                <?php
                    }
                ?>
            </div>
        <div class="button_more-book">                
                <a class="button_more-book1" href="truyen-kiem-hiep-8.html">Xem thêm truyện kiếm hiệp</a>
        </div>
        <div id="slider">
            <img onerror="this.src='http://placehold.it/1160x280'" src="<?php echo $matchet1[4]?>" alt="" class="none_mobile">
    </div>  
