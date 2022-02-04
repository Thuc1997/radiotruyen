
<div class="blog">

<div class="blog_left">
    <h4>truyện audio</h4>
        <ul>
            <?php
                      $menu_barr = mysqli_query($con,"SELECT * FROM tbl_menu WHERE tbl_menu.parent =2");
                      while($menu_barr1=mysqli_fetch_array($menu_barr)){  
              ?>
                    <li><a href="?quanly=danhmuc&id=<?php echo $menu_barr1['menu_id']?>"><?php echo $menu_barr1['menu_name']?></a></li>
              <?php
                      }
              ?>

          </ul>
</div>  
  <div class="blog_right">
<?php
    if(isset($_GET['slider'])){
     $idd = $_GET['slider'];
  }else{
      $idd = '';
  }
        $slider = mysqli_query($con,"SELECT * FROM tbl_slider WHERE tbl_slider.slider_id ='$idd'");
        while($slider1=mysqli_fetch_array($slider)){  
?>
        <div class="date_up">
            <span><i class="fas fa-calendar-alt"></i>&nbsp;09/07/2018 01:27 - <i class="far fa-eye"></i>&nbsp;Lượt xem: 2555</span>
        </div>
        <div class="clear"></div>
        <h1><?php echo $slider1['slider_ten']?></h1>
        <h3><?php echo $slider1['slider_mota']?></h3>
        
        <div class="container_video">
            <video autoplay controls crossorigin playsinline poster="./video/<?php echo $slider1['slider_name']?>">
                    <source src="./video/<?php echo $slider1['slider_name']?>" type="video/mp4" size="1080">
            </video>
        </div>
        <p><?php echo $slider1['slider_noidung']?></p>
<?php
      }
?>

  </div>

</div>