<?php
  session_start();
    include('../DB/conect.php');
?>
<?php
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['tk'];
        $matkhau  = md5($_POST['mk']);
        if($taikhoan == '' || $matkhau ==''){
         $erro = "Bạn chưa nhập dữ liệu";
        }else{
          $sql_admin = mysqli_query($con,"SELECT * FROM tbl_admin WHERE accountt = '$taikhoan' AND passwordd ='$matkhau'
          LIMIT 1");
          $count = mysqli_num_rows($sql_admin);
          $row_login = mysqli_fetch_array($sql_admin);

          if($count > 0){
            $_SESSION['dangnhap'] = $row_login['admin_name'];
            $_SESSION['admin_avatar']   = $row_login['admin_avatar'];
            $_SESSION['admin_id'] = $row_login['admin_id'];
              header('Location: Dashboard.php');

          }else{
            $erro = "Tài khoản hoặc mật khẩu bị sai";
          }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="../css/adminsp.css">
</head>
<body>


  <div class="main">

    <form action="" method="POST" class="form" id="form-1">
      <h1 class="heading">ĐĂNG NHẬP</h1>
  
      <div class="spacer"></div>
  
      <div class="form-group">
        <label for="email" class="form-label">Tài khoản</label>
        <input id="email" name="tk" type="text" placeholder="Nhập tài khoản" class="form-control">
      </div>
  
      <div class="form-group">
        <label for="password" class="form-label">Mật khẩu</label>
        <input id="password" name="mk" type="password" placeholder="Nhập mật khẩu" class="form-control">
        <span class="form-message"><?php echo isset($erro) ? $erro : ""; ?></span>
      </div>
  
      <button class="form-submit" name="dangnhap">Đăng Nhập</button>
    </form>
  
  </div>
</body>
</html>