<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Routine hãy mặc theo cách của bạn</title>
  <link rel="stylesheet" href="asset/css/customer.css" />
  <link rel="stylesheet" href="asset/js/script.js">
  <link rel="stylesheet" href="asset/css/themify-icons-font/themify-icons/themify-icons.css" />
</head>
<?php
session_start();
include ("config/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $query = "SELECT * FROM user WHERE Email='" . $email . "' AND Password='" . $password . "' LIMIT 1";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row["Permission"] == "Admin") {
        $_SESSION['admin'] = $row["Id_user"];
         echo "<script>
            alert('Đăng nhập thành công');
        </script>";
        header("Location:web/webforadmin/admin/main.php?ID='" . $row["Id_user"] . "'");
       
      } else {
        $_SESSION["customer"] = $row["Id_user"];
        echo "<script>
            alert('Đăng nhập thành công');
        </script>";
        header("Location:web/webforcustomer/mainafterlogin.php");
        
      }
    }
  } else {
    echo "<script>
            alert('Sai mật khẩu hoặc email!!!!');
            window.location.href='index.php';
        </script>";
  }

}
?>

<body>
  <div id="main">
    <div id="header">
      <div class="header__left">
        <a href="index.php" class="logo">
          <img src="asset/img/logo-routine.png" alt="" class="logo__img" />
        </a>
        <ul id="nav">
                <li>
                    <a href="web/webforcustomer/man.php">NAM</a>
                    <?php
                    include("config/config.php");
                    //buoc 2 viet truy van
                    $query = "SELECT * FROM tbl_danhmuccon";
                    //buoc 3 thuc thi cau lenh
                    $result = mysqli_query($conn, $query);
                    //buoc 4 lay du lieu
                    if(mysqli_num_rows($result) >0){
                      echo'<ul class="subnav">';
                      while ($row = mysqli_fetch_assoc($result)){
                        if($row["idloaisanpham"]==1){
                          echo'<li><a href="">'.$row["tendanhmuccon"].'</a></li>';
                        }
                      }
                      echo'</ul>';
                    }
                    ?>
                </li>
                <li>
                    <a href="web/webforcustomer/women.php">NỮ</a>
                    <?php
                    include("config/config.php");
                    //buoc 2 viet truy van
                    $query = "SELECT * FROM tbl_danhmuccon";
                    //buoc 3 thuc thi cau lenh
                    $result = mysqli_query($conn, $query);
                    //buoc 4 lay du lieu
                    if(mysqli_num_rows($result) >0){
                      echo'<ul class="subnav">';
                      while ($row = mysqli_fetch_assoc($result)){
                        if($row["idloaisanpham"]==2){
                          echo'<li><a href="">'.$row["tendanhmuccon"].'</a></li>';
                        }
                      }
                      echo'</ul>';
                    }
                    ?>
                </li>
                <li><a href="#banner">BEST</a></li>
                <li><a href="#content">NEW</a></li>
            </ul>
      </div>
      <div class="header__right">
        <a class="search" href="">
          <i class="ti-search"></i>
          <span class="search__title">Tìm kiếm</span>
        </a>
        <span class="ti-user" id="openlogin" href=""></span>
        <span class="ti-heart" id="openlove" href=""></span>
        <span class="ti-shopping-cart" id="openshopping" href=""></span>
      </div>
    </div>
        <!-- slider -->
        <div id="slider">
          <div class="slider-wrapper">
            <div class="slider-img">
              <?php
              // Mảng chứa đường dẫn tới các hình ảnh slider
              $slider_images = [
                "asset/img/sld1.jpg",
                "asset/img/sld2.webp",
                "asset/img/sld3.webp",
                "asset/img/sld4.webp",
                "asset/img/sld5.webp"
              ];

              // Hiển thị từng hình ảnh trong slider
              foreach ($slider_images as $index => $image) {
                echo '<img src="' . $image . '" alt="Slide ' . ($index + 1) . '" />';
              }
              ?>
            </div>
            <div class="slider-nav">
              <?php
              // Tạo các liên kết điều hướng slider
              foreach ($slider_images as $index => $image) {
                echo '<a href="#img-slider' . ($index + 1) . '" class="slider-nav-link"></a>';
              }
              ?>
            </div>
          </div>
        </div>

    <div id="banner">
      <img src="asset/img/banner1.webp" alt="" />
      <img src="asset/img/banner2.webp" alt="" />
    </div>

    <div id="content">
      <div class="content-items">
        <img src="asset/img/imgitem1.jpg" alt="" />
        <div class="item-title">
          <a href="" class="font-titles">Áo Polo Nam Premium 100% Cotton Phối Sọc Form Fitted -
            10S24POL004P</a>
          <a href="" class="ti-heart"></a>
        </div>
        <b>499.000 đ</b>
      </div>
      <div class="content-items">
        <img src="asset/img/imgitem1.jpg" alt="" />
        <div class="item-title">
          <a href="" class="font-titles">Áo Polo Nam Premium 100% Cotton Phối Sọc Form Fitted -
            10S24POL004P</a>
          <a href="" class="ti-heart"></a>
        </div>
        <b>499.000 đ</b>
      </div>
      <div class="content-items">
        <img src="asset/img/imgitem1.jpg" alt="" />
        <div class="item-title">
          <a href="" class="font-titles">Áo Polo Nam Premium 100% Cotton Phối Sọc Form Fitted -
            10S24POL004P</a>
          <a href="" class="ti-heart"></a>
        </div>
        <b>499.000 đ</b>
      </div>
      <div class="content-items">
        <img src="asset/img/imgitem1.jpg" alt="" />
        <div class="item-title">
          <a href="" class="font-titles">Áo Polo Nam Premium 100% Cotton Phối Sọc Form Fitted -
            10S24POL004P</a>
          <a href="" class="ti-heart"></a>
        </div>
        <b>499.000 đ</b>
      </div>
    </div>
  </div>

  <div class="model" id="modal-login">
    <div class="model-overlay"></div>
    <div class="model-body">
      <div class="model-inner">
        <span class="ti-close"></span>
        <div class="auth">
          <h2>Đăng nhập</h2>
          <p>
            Đăng nhập thành viên Routine để nhận nhiều những chương trình ưu
            đãi hấp dẫn
          </p>
        </div>

        <form method="POST">
          <div class="auth-form">
            <div class="auth-group">
              <p>Email</p>
              <input type="text" placeholder="Email" name="email" />
            </div>
            <div class="auth-group">
              <p>Mật khẩu</p>
              <input type="password" placeholder="Mật khẩu" name="password" />
            </div>
          </div>
          <div class="auht-control">
            <div class="forgot">
              <a href="">Quên mật khẩu?</a>
            </div>
            <input type="submit" name="dangnhap" class="btn" value="ĐĂNG NHẬP"></input>
          </div>
        </form>
        <div class="auth-switch">
          <p>Bạn chưa có tài khoản?</p>
          <a href="#modal-signin" id="opensignin">Đăng kí thành viên -></a>
        </div>
      </div>
    </div>
  </div>

  <div class="model" id="modal-signin">
    <div class="model-overlay"></div>
    <div class="model-body">
      <div class="model-inner">
        <span class="ti-close"></span>
        <div class="auth">
          <h2>Đăng ký</h2>
          <p>
            Trở thành thành viên Routine để nhận nhiều những chương trình ưu
            đãi hấp dẫn
          </p>
        </div>
        <form method="post">
          <div class="auth-form">
            <div class="auth-group">
              <p>Họ và tên</p>
              <input type="text" placeholder="Họ và tên" />
            </div>
            <div class="auth-group">
              <p>Email</p>
              <input type="text" placeholder="Email" />
            </div>
            <div class="auth-group">
              <p>Mã OTP</p>
              <input type="text" placeholder="OTP" />
            </div>
            <div class="auth-group">
              <p>Mật khẩu</p>
              <input type="password" placeholder="Mật khẩu" />
            </div>
            <div class="auth-group">
              <p>Nhắc lại mật khẩu</p>
              <input type="password" placeholder="Nhập lại mật khẩu" />
            </div>
          </div>
          <div class="auht-control">
            <div class="dk">
              <input type="checkbox" />
              <a href="">
                Tôi chấp nhận <u>điều khoản quyền riêng tư và bảo mật</u>
              </a>
            </div>
            <button class="btn">ĐĂNG KÍ TÀI KHOẢN</button>
        </form>
        </div>
        <div class="auth-switch">
          <a href="#modal-login" id="openlogin2"><- Đăng nhập</a>
        </div>
      </div>
    </div>
  </div>

  <div class="model" id="modal-love">
    <div class="model-overlay"></div>
    <div class="modal-right">
      <div class="modal-love">
        <div class="love-heading">
          <p>
            <i class="ti-heart"></i>
            <b>Sản phẩm yêu thích</b>
          </p>
          <span class="ti-close"></span>
        </div>
      </div>
    </div>
  </div>

  <div class="model" id="modal-shopping">
    <div class="model-overlay"></div>
    <div class="modal-right">
      <div class="modal-love">
        <div class="love-heading">
          <p>
            <i class="ti-shopping-cart"></i>
            <b>Giỏ hàng</b>
          </p>
          <span class="ti-close"></span>
        </div>
      </div>
    </div>
  </div>

  <script src="asset/js/main.js"></script>
</body>

</html>