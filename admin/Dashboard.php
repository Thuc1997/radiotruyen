<?php
 require_once "../DB/conect.php";
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location: index.php');
    }

  if(isset($_GET['login'])){
      $dangxuat = $_GET['login'];
  } else{
      $dangxuat = "";
  } 
  if($dangxuat == 'dangxuat'){
     session_destroy();
      header('Location: index.php');
  }
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa = mysqli_query($con,"DELETE FROM tbl_producation WHERE produca_id ='$id'");
        header('Location: Dashboard.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Trang chủ admin</title>
</head>
<body>
    <div class="admin">

       <div class="head">
           
            <div class="left_admin">
                <div class="head1 head2">
                    <h1><i class="fas fa-cog"></i>&ensp;Admin Control</h1>
                </div>
                        <div class="adminn">
                                    <img src="../image/<?php echo $_SESSION['admin_avatar']?>" alt="">
                                    <span class="admin_welcome">Xin chào<br/><p class="admin_name"><?php echo $_SESSION['dangnhap']?></p></span>
                        </div>
                        <button class="add_sp">+ Thêm sản phẩm</button>
                        <button class="add_au">+ Thêm Audio</button>
                        <button class="add_sl">+ Thêm Slider</button>

            </div>
            <div class="right_admin">
                 <div class="head1">
                     <a href="?login=dangxuat"class="logout" onclick="return confirm('Bạn thực sự muốn thoát?')">Đăng Xuất</a>
                </div>
                        <div class="hed_title">tất cả sản phẩm</div>
                    <div class="box_admin">
                          <div class="box_admin1"></div>
                            <table>
                                    <thead>
                                                <th>STT</th>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Ảnh Sản Phẩm</th>
                                                <th>Mô Tả</th>
                                                <th>Trạng thái</th>
                                                <th>Thể Loại</th>
                                                <th>Quản lý</th>

                                    </thead>
                                    <tbody>
                                        <?php
                                       
                                            $select_sp = mysqli_query($con,"SELECT * FROM tbl_producation,tbl_menu WHERE tbl_producation.menu_id=tbl_menu.menu_id ORDER BY tbl_producation.produca_id DESC");
                                            $i = 0;
                                            while($select_sp1 = mysqli_fetch_array($select_sp)){
                                                $i++;
                                        ?>
                                        <tr>
                                                <td class="td_id"><?php echo $i?></td>
                                                <td class="td_name"><?php echo $select_sp1['produca_name']?></td>
                                                <td class="td_img"><img src="../image/<?php echo $select_sp1['produca_image']?>" alt=""></td>
                                                <td class="td_mota"><?php echo $select_sp1['produca_mota']?></td>
                                                <td class="td_hien">Hiển thị</td>
                                                <td class="td_theloai"><?php echo $select_sp1['menu_name']?></td>
                                                <td class="td_quanly">
                                                    <a href="" class="sua_active" onclick="return alert('Chưa code?')">sửa</a>
                                                    <a href="?xoa=<?php echo $select_sp1['produca_id']?>" class="xoa_active" onclick="return confirm('Tiếp tục xóa?')">xóa</a>
                                                </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>

                                    </tbody>
                            </table>
                    </div>
            </div>

        </div>

    </div>
<?php
 ///thêm sản phẩm
 if(isset($_POST['themsanphamm'])){
    $tenanh = $_FILES['hinhanh']['name'];
    $tensp = $_POST['tentruyen'];
    $mota  = $_POST['mota'];
    $giongdoc = $_POST['giongdoc'];
    $phan  = $_POST['phan'];
    $luotnghe = $_POST['luotnghe'];
    $theloai  = $_POST['theloai'];
    $parth = '../image/'; 
    $hinh_tmp = $_FILES['hinhanh']['tmp_name'];

    $insert_sp = mysqli_query($con,"INSERT INTO tbl_producation(produca_image,produca_name,produca_mota,produca_move,
    produca_part,produca_listen,menu_id)VALUES('$tenanh','$tensp','$mota','$giongdoc','$phan','$luotnghe','$theloai')");
    move_uploaded_file($hinh_tmp,$parth.$tenanh);
    echo '<script>window.location.reload();</script>';
   

}


?>

<div id="modal">
        <div class="modal_container">
                <div class="model_hed">
                        <h5>Thêm sản phẩm</h5>
                        <i class="xquit fas fa-times"></i>               
                </div>
            <form action="" method="POST" enctype="multipart/form-data"> 

                <label for="" class="label1">Hình ảnh</label><br> 
                     <input type="file" name="hinhanh"><br>
                <label for="" class="label1">Tên sản phẩm</label><br>                               
                     <input type="text" name="tentruyen" placeholder="Nhập tên truyện"><br> 
                 <label for="" class="label1">Mô tả truyện</label><br>
                      <textarea name="mota" id="" cols="59" rows="7" placeholder="Mô tả" class="textareaa"></textarea>
                <label for="" class="label1">Giọng đọc</label><br>
                      <select name="giongdoc">
                      <option value="0">--Chọn giọng đọc--</option>
                <?php
                    $giong = mysqli_query($con,"SELECT * FROM tbl_menu WHERE parent=3 ORDER BY menu_id DESC");
                    while($giong1 = mysqli_fetch_array($giong)){
                ?>
                            <option value="<?php echo $giong1['menu_id']?>"><?php echo $giong1['menu_name']?></option>
                     <?php }?>                        
                      </select><br>                      
                 <label for="" class="label1">Phần</label><br>
                        <input type="text" name="phan" placeholder="Phần"><br>                    
                 <label for="" class="label1">Lượt nghe</label><br>
                        <input type="text" name="luotnghe" placeholder="lượt nghe"><br>
                <label for="" class="label1">Thể loại</label><br>
                      <select name="theloai">
                      <option value="0">--chọn thể loại--</option>
                 <?php
                    $the = mysqli_query($con,"SELECT * FROM tbl_menu WHERE parent=2 ORDER BY menu_id DESC");
                    while($the1 = mysqli_fetch_array($the)){
                ?>
                            <option value="<?php echo $the1['menu_id']?>"><?php echo $the1['menu_name']?></option>    
                <?php }?>                      
                      </select><br>  
                <input type="submit" name="themsanphamm" value="Thêm" class="add_sppp">  

            </form>                              
        </div>
</div>

<!-- thêm audio -->
<?php

     if(isset($_POST['themaudioo'])){
            $audio_mp3 = $_FILES['audio']['name'];
            $tenaudio = $_POST['tentaudio'];
            $chonaudio = $_POST['chonaudio'];
            $parthh = '../audio/'; 
            $audio_tmp = $_FILES['audio']['tmp_name'];
        $insert_audio = mysqli_query($con,"INSERT INTO tbl_audio(audio_name,audio_title,produca_id)VALUES('$audio_mp3','$tenaudio','$chonaudio')");
        move_uploaded_file($audio_tmp,$parthh.$audio_mp3);
      
     }

?>
<div id="modal2">
              <div class="modal2_container">
                     <div class="modal_tit">
                            <h5>Thêm Audio</h5>
                            <i class="xquitt fas fa-times"></i> 
                     </div>   

                     <form action="" method="POST" enctype="multipart/form-data">
                        <label for="" class="label1">Audio</label><br> 
                            <input type="file" name="audio"><br>
                        <label for="" class="label1">Tên Audio</label><br>                               
                            <input type="text" name="tentaudio" placeholder="Nhập tên audio"><br> 
                        <label for="" class="label1">Tên truyện</label><br>
                            <select name="chonaudio">
                            <option value="0">--Thêm vào truyện--</option>
                    <?php
                        $add_audi = mysqli_query($con,"SELECT * FROM tbl_producation ORDER BY produca_id DESC");
                        while($add_audi1 = mysqli_fetch_array($add_audi)){
                    ?>
                                <option value="<?php echo $add_audi1['produca_id']?>"><?php echo $add_audi1['produca_name']?></option>
                    <?php }?>            
                            </select><br>
                        <input type="submit" name="themaudioo" value="Thêm" class="add_sppp1">  
                    </form>
              </div>          
</div>

<!-- thêm slider blog -->
<?php
 if(isset($_POST['themvideo'])){
    $anhslider = $_FILES['anhslider']['name'];
    $anhslider_tmp = $_FILES['anhslider']['tmp_name'];
    $tenslider =  $_POST['tentslider'];
    $motaslider  = $_POST['motaslider'];
    $noidungslider = $_POST['noidungslider'];
    $videoslider = $_FILES['videoslider']['name'];
    $videoslider_tmp = $_FILES['videoslider']['tmp_name'];
    $parth_a = '../image/';
    $parth_v = '../video/';
    $insert_slider = mysqli_query($con,"INSERT INTO tbl_slider(slider_image,slider_ten,slider_mota,slider_noidung,slider_name)VALUES('$anhslider','$tenslider','$motaslider','$noidungslider','$videoslider')");
    move_uploaded_file($anhslider_tmp,$parth_a.$anhslider);
    move_uploaded_file($videoslider_tmp,$parth_v.$videoslider);

 }

?>

<div id="modal3">
          <div class="modal3_container">
                    <div class="modal3_tit">
                             <h5>Thêm Slide</h5>
                             <i class="xquittt fas fa-times"></i> 
                    </div>
                <form action="" method="POST" enctype="multipart/form-data">  
                        <label for="" class="label1">Ảnh slider</label><br> 
                                <input type="file" name="anhslider"><br>
                        <label for="" class="label1">Tên</label><br> 
                                 <input type="text" name="tentslider" placeholder="Nhập tên blog"><br> 
                         <label for="" class="label1">Mô tả</label><br>
                                <textarea name="motaslider" cols="59" rows="7" placeholder="Mô tả" class="textareaa"></textarea><br>
                         <label for="" class="label1">Nội dung</label><br>
                                <textarea name="noidungslider" cols="59" rows="7" placeholder="Nội dung" class="textareaa"></textarea><br>
                        <label for="" class="label1">Video slider</label><br>
                                <input type="file" name="videoslider"><br>
                        <input type="submit" name="themvideo" value="Thêm" class="add_sppp2"> 
                </form>
          </div>                  
</div>

<script src="./xuli.js"></script>
</body>
</html>