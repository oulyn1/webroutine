<?php
session_start();
if (isset($_SESSION["admin"])) {
    header("location:web/webforadmin/admin/main.php?ID=".$_SESSION['admin']."");
}else if(isset($_SESSION["customer"])) {
  header("location:web/webforcustomer/mainafterlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Routine hãy mặc theo cách của bạn</title>
  <link rel="stylesheet" href="asset/css/customer.css" />
  <link rel="stylesheet" href="asset/js/script.js">
  <link rel="stylesheet" href="asset/css/themify-icons-font/themify-icons/themify-icons.css" />
  <link rel="stylesheet" href="asset/css/footer.css">
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
        $_SESSION["email"] = $row["Email"];
       echo "<script>
            alert('Đăng nhập thành công');
            window.location.href='web/webforadmin/admin/main.php?ID=".$row["Id_user"]."';
        </script>";
      } else {
        $_SESSION["customer"] = $row["Id_user"];
        $_SESSION["email"] = $row["Email"];
         echo "<script>
            alert('Đăng nhập thành công');
            window.location.href='web/webforcustomer/mainafterlogin.php';
        </script>";
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
                          echo'<li><a href="web/webforcustomer/aonam.php?IDDM='.$row["iddanhmuccon"].'&IDLSP='.$row["idloaisanpham"].'">'.$row["tendanhmuccon"].'</a></li>';
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
                          echo'<li><a href="web/webforcustomer/aonam.php?IDDM='.$row["iddanhmuccon"].'&IDLSP='.$row["idloaisanpham"].'">'.$row["tendanhmuccon"].'</a></li>';
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
        <a class="search" href="web/webforcustomer/timkiem.php">
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
      <a href="web/webforcustomer/man.php"><img src="asset/img/banner1.webp" alt="" /></a>
      <a href="web/webforcustomer/women.php"><img src="asset/img/banner2.webp" alt="" /></a>
    </div>

    <?php
        include("config/config.php");
        //buoc 2 viet truy van
        $query = "SELECT * FROM tbl_sanpham ORDER BY idsanpham DESC limit 4";
        //buoc 3 thuc thi cau lenh
        $result = mysqli_query($conn, $query);
        //buoc 4 lay du lieu
        if(mysqli_num_rows($result) >0){
            echo'<div class="maincontent" id="content">
                <div class="product_list">';
            while ($row = mysqli_fetch_assoc($result)){
                    echo'<div>
                    <a href="">
                        <img src="asset/img/'.$row["hinhanhsanpham"].'" alt="">
                        <p class="title_product">'.$row["tensanpham"].'</p>
                        <p class="price_product">'.number_format($row["giasanpham"],0,',','.').' <u>đ</u></p>
                    </a>
                    </div>';
                
            }
            echo'</div>
             </div>';
        }
    ?>

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
              <a href="web/forgot/nhapmail.php">Quên mật khẩu?</a>
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

        <form method="post" action="web/dangki.php">
          <div class="auth-form">
            <div class="auth-group">
              <p>Họ và tên</p>
              <input type="text" placeholder="Họ và tên" name="txtname" required/>
            </div>
            <div class="auth-group">
              <p>Email</p>
              <input type="text" placeholder="Email" name="txtemail" required/>
            </div>
            <div class="auth-group">
            </div>
            <div class="auth-group">
              <p>Mật khẩu</p>
              <input type="password" placeholder="Mật khẩu" name="txtpassword" required/>
            </div>
            <div class="auth-group">
              <p>Nhắc lại mật khẩu</p>
              <input type="password" placeholder="Nhập lại mật khẩu" name="txtpassword2" required/>
            </div>
          </div>
          <div class="auht-control">
            <div class="dk">
              <input type="checkbox" value="1" name="cbdieukhoan" />
              <a href="">
                Tôi chấp nhận <u>điều khoản quyền riêng tư và bảo mật</u>
              </a>
            </div>
            <input type="submit" class="btn" value="ĐĂNG KÍ TÀI KHOẢN" name="submit"/>
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


  
  <div class="footer">

        <div class="information">

            <img src="asset/img/logo-routine.png" alt="" class="logo">
            <h3>CÔNG TY TNHH ROUTINE VIETNAM</h3>
            <P>Mã số thuế: 0106486365</P>
            <P></P>
            <P>Văn phòng: tầng 5 tòa nhà IMC, 62 Trần Quang Khải - Phường Tân Định - Quận 1 - TP Hồ Chí Minh.</P>
            <h3>THAM GIA BẢNG TIN CỦA CHÚNG TÔI</h3>

        </div>

        <div class="about">

            <div class="company">

                <h5>CÔNG TY</h5>
                <ul>
                    <li><a href="">Giới thiệu về ROUTINE</a></li>
                    <li><a href="">THE 31</a></li>
                    <li><a href="">Tuyển dụng</a></li>
                    <li><a href="">Tin thời trang</a></li>
                    <li><a href="">Hợp tác nhượng quyền</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>

            </div>

            <div class="social">

                <h3>KẾT NỐI VỚI CHÚNG TÔI</h3>

            </div>

        </div>

        <div class="policy">

            <h5>CHÍNH SÁCH KHÁCH HÀNG</h5>
            <ul>
                <li><a href="">Chính sách khách hàng thân thiết</a></li>
                <li><a href="">Chính sách đổi trả</a></li>
                <li><a href="">Chính sách bảo hành</a></li>
                <li><a href="">Chính sách bảo mật</a></li>
                <li><a href=""> Câu hỏi thường gặp</a></li>
                <li><a href="">hướng dẫn mua hàng online</a></li>
                <li><a href="">Hướng dẫn kiểm trra hạng thành viên</a></li>
            </ul>
            
        </div>

        <div class="store">

            <h5>THÔNG TIN CỬA HÀNG</h5>
            <ul>
                <li>
                    <h4>CỬA HÀNG THỨU 34</h4>
                    <p>F15 tầng 1 AEON Mall Tân Phú, 30 Bờ Bao Tân Thắng, Phường Sơn Kỳ, TP Hồ Chí Minh</p>
                </li>
                <li>
                    <h4>CỬA HÀNG THỨ 33</h4>
                    <p>809 Giải Phóng, Phường Giáp Bát, Quận Hoàng Mai, TP Hà Nội</p>
                </li>
                <li>
                    <h4>CỬA HÀNG THỨ 32</h4>
                    <p>192 - 194 Hoa Lan, Phường 2, Quận Phú Nhuận, TP Hồ Chí Minh</p>
                </li>
            </ul>
            <a href="cua_hangcst.php">XEM TẤT CẢ CỬA HÀNG</a>
        </div>
    </div>

  <script src="asset/js/main.js"></script>
</body>

</html>