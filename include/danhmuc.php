
<?php
    require_once "laytin.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }

    $sanpham =20;
    $trang = !empty($_GET['trang']) ? $_GET['trang']:1;
    $tong = ($trang - 1)*$sanpham;
    $danhmuc = mysqli_query($con,"SELECT * FROM tbl_menu,tbl_producation WHERE tbl_menu.menu_id=tbl_producation.produca_move
    AND tbl_producation.produca_move='$id' OR tbl_menu.menu_id=tbl_producation.produca_move AND tbl_producation.menu_id='$id' ORDER BY tbl_producation.produca_id DESC LIMIT ".$sanpham." OFFSET ".$tong.""); 

    $danhmuc_theloai = mysqli_query($con,"SELECT * FROM tbl_menu,tbl_producation WHERE tbl_menu.menu_id ='$id'"); 

   $danhmuc2 = mysqli_query($con,"SELECT * FROM tbl_menu,tbl_producation WHERE tbl_menu.menu_id=tbl_producation.produca_move
   AND tbl_producation.produca_move='$id' OR tbl_menu.menu_id=tbl_producation.menu_id AND tbl_producation.menu_id='$id' ORDER BY tbl_producation.produca_id DESC"); 
   
   $danhmuc_title=mysqli_fetch_array($danhmuc2);
        $title = $danhmuc_title['menu_name'];

   $danhmuc2 = $danhmuc2->num_rows;
   $tongtrang = ceil($danhmuc2 / $sanpham);

?>


<div id="slider">
    <img onerror="this.src='http://placehold.it/1160x280'" src="<?php echo $matchet1[7]?>" alt="" class="none_mobile">
</div>  
    <div class="love_story">
        <div class="newupdate_title">
            <a class="newupdate_title-left" href=""><i class="newupdate-icon fas fa-play"></i><?php echo $title?></a>
            <a class="newupdate_title-right" href=""><i class="newupdate-icon fas fa-external-link-alt"></i>Xem thêm</a>
        </div>
       <div class="newupdate_images">
            <?php
             
                while($danhmuc3=mysqli_fetch_array($danhmuc)){
                    $danhmuc_theloai1 = mysqli_fetch_array($danhmuc_theloai);
            ?>
            <a class="newupdate_main" href="<?php echo convert_name($danhmuc_theloai1['menu_name'])?>/<?php echo convert_name($danhmuc3['produca_name'])?>-<?php echo $danhmuc3['produca_id']?>.html">
                <img src="./image/<?php echo $danhmuc3['produca_image']?>" alt="">
                 <div class="newupdate_time">
                    <h4><?php echo $danhmuc3['produca_name']?></h4>
                        <p><?php echo $danhmuc3['menu_name']?></p>
                            <span><i class="newupdate-icon1 fas fa-stopwatch"></i>02:43:12  &emsp;
                              <i class="newupdate-icon1 far fa-list-alt"></i><?php echo $danhmuc3['produca_part']?> phần <br>
                                <i class="newupdate-icon1 fas fa-headphones-alt"></i>Lượt nghe: <?php echo number_format($danhmuc3['produca_listen'])?></span>
                </div> 
            </a>   
            <?php
                }
            ?>
</div>

<div class="page">
    <?php
       $danhmuc_theloai3 = mysqli_fetch_array($danhmuc_theloai);
    ?>
    <ul>
        <?php if($trang >3){ $first_page = 1; ?>
            <li><a class="page_link" href="<?php echo convert_name($danhmuc_theloai3['menu_name'])?>-<?=$id?>/page=<?php echo $first_page?>"><i class="icon_page1 fas fa-step-backward"></i></a></li>
            <?php } ?>

            <?php if($trang >1){ $prev_page = $trang -1 ?>
                <li><a class="page_link" href="<?php echo convert_name($danhmuc_theloai3['menu_name'])?>-<?=$id?>/page=<?php echo $prev_page?>"><i class="icon_page fas fa-chevron-left"></i></a></li>   
            <?php  }?>

          <?php for($num = 1; $num <= $tongtrang;$num++){ ?>
              <?php if($num != $trang){ ?>
                     <?php if($num > $trang- 3 && $num <$trang+3){?>
                  <li><a class="page_link" href="<?php echo convert_name($danhmuc_theloai3['menu_name'])?>-<?=$id?>/page=<?php echo $num?>"><?=$num?></a></li>
                        <?php }?>
               <?php } else{?>  
                    <span class="trangg page_link"><?=$num?></span>
               <?php } ?> 
          <?php } ?>      
                    <?php if($trang < $tongtrang -1){ $next_page = $trang +1?>
                        <li><a class="page_link" href="<?php echo convert_name($danhmuc_theloai3['menu_name'])?>-<?=$id?>/page=<?php echo $next_page?>"><i class="icon_page fas fa-chevron-right"></i></a></li>   
                       <?php  }?> 

     <?php if($trang < $tongtrang-3){ $end_page = $tongtrang; ?>
        <li><a class="page_link" href="<?php echo convert_name($danhmuc_theloai3['menu_name'])?>-<?=$id?>/page=<?php echo $end_page?>"><i class="icon_page1 fas fa-step-forward"></i></a></li>
     <?php } ?>
          
    </ul>
</div> 

