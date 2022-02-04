
<?php 
  if(isset($_SESSION['views']))
      $_SESSION['views'] = $_SESSION['views']+1;
  else
      $_SESSION['views']=0;
    
    //echo"views = ".$_SESSION['views'];
  ?>
<div class="slider">
        <div class="back">
            <span><i class="icon fas fa-chevron-left"></i></span>
        </div>   
            <?php
                $sql_slide = mysqli_query($con,"SELECT * FROM tbl_slider ORDER BY slider_id DESC LIMIT 5");
                 while($row_slide = mysqli_fetch_array($sql_slide)){
            ?>
                <a href="<?php echo convert_name($row_slide['slider_ten'])?>/<?=$row_slide['slider_id']?>.html" class="slider_img">
                    <img src="./image/<?php echo $row_slide['slider_image']?>" alt="">
                </a>
            <?php
                  }
            ?>   
        <div class="next">
            <span><i class="icon fas fa-chevron-right"></i></span>
        </div>     
</div>

<div id="sizebar">
            <?php
                $sql_category = mysqli_query($con,"SELECT * FROM category,tbl_menu WHERE category.menu_id=tbl_menu.menu_id ORDER BY category_id DESC");
                while($row_category = mysqli_fetch_array($sql_category)){
             ?>
                <a class="athour_item" href="<?php echo convert_name($row_category['menu_name'])?>-<?php echo convert_name($row_category['menu_id'])?>.html">
                    <img src="./image/<?php echo $row_category['category_image']?>" alt="">
                    <span class="athour_text"><?php echo $row_category['menu_name']?></span>
                </a>
             <?php
                }
             ?>       
</div>

<div id="container">
                    <h2 class="container_title"><i class="icon_link fas fa-headphones-alt"></i>truyện bạn đang nghe</h2>
                    <span class="container_item"><i class="icon_link fas fa-globe-africa"></i>số lượt truy cập trang: <b style="color:red"><?php echo $_SESSION['views']?></b></span>
</div>
    