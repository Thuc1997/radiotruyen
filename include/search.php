<?php 
if(isset($_POST['text'])){
    $text = $_POST['text'];
}else{
    $text= '';
}


?>
<div id="slider">
                    <img onerror="this.src='http://placehold.it/1160x280'" src="./image/nabarr.jpg" alt="" >
</div>

<div class="main_container">
    <div class="newupdate">
            <div class="newupdate_title">
                <a class="newupdate_title-left" href="#"><i class="newupdate-icon fas fa-play"></i>kết quả tìm kiếm</a>
                    <a class="newupdate_title-right" href="#"><i class="newupdate-icon fas fa-external-link-alt"></i>Xem thêm</a>
            </div>
            <div class="newupdate_images">
                      <?php 
                      if($_POST['text']==""){
                          echo '<img src="https://rankfrog.com/wp-content/uploads/2018/05/Wordpress-Bugs.jpg"/>';      
                      }else{
                        $sql_search = mysqli_query($con,"SELECT * FROM tbl_producation,tbl_menu WHERE tbl_producation.menu_id= tbl_menu.menu_id
                         AND tbl_producation.produca_name LIKE '%".$text."%'");
                        while($row_search = mysqli_fetch_array($sql_search)){

                    ?> 
                        <a class="newupdate_main" href="<?php echo convert_name($row_search['menu_name'])?>/<?php echo convert_name($row_search['produca_name'])?>-<?php echo $row_search['produca_id']?>.html">
                            <img src="./image/<?php echo $row_search['produca_image']?>" alt="">
                            <div class="newupdate_time">
                                <h4><?php echo $row_search['produca_name']?></h4>
                                    <p><?php echo $row_search['menu_name']?></p>
                                        <span><i class="newupdate-icon1 fas fa-stopwatch"></i>01:11:25  &emsp; 
                                        <i class="newupdate-icon1 far fa-list-alt"></i><?php echo $row_search['produca_part']?> phần<br>
                                        <i class="newupdate-icon1 fas fa-headphones-alt"></i>Lượt nghe: <?php echo number_format($row_search['produca_listen'])?></span>
                            </div>                   
                        </a>
                    <?php
                        }
  
                    }
                    ?> 
               </div> 
</div>
