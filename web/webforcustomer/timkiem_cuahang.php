<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm cửa hàng</title>
    <link rel="stylesheet" href="../../asset/css/customer.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../asset/css/footer.css">
    <link rel="stylesheet" href="../../asset/css/timkiem.css">
    <link rel="shortcut icon" href="../../asset/img/favicon.ico" type="image/x-icon">
</head>
<?php
session_start();
include ("../../config/config.php");
if (isset($_POST['dangnhap'])) {
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
            window.location.href='../../web/webforadmin/admin/main.php?ID=".$row["Id_user"]."';
        </script>";
      } else {
        $_SESSION["customer"] = $row["Id_user"];
        $_SESSION["email"] = $row["Email"];
         echo "<script>
            alert('Đăng nhập thành công');
            window.location.href='mainafterlogin.php';
        </script>";
      }
    }
  } else {
    echo "<script>
            alert('Sai mật khẩu hoặc email!!!!');
            window.location.href='../../index.php';
        </script>";
  }

}
?>
<body>
    <div id="main">
        <div id="header">
            <div class="header__left">
                <a href="../../index.php" class="logo">
                    <img src="../../asset/img/logo-routine.png" alt="" class="logo__img">
                </a>
                <ul id="nav">
                <li>
                    <a href="../webforcustomer/man.php">NAM</a>
                    <?php
                    include("../../config/config.php");
                    //buoc 2 viet truy van
                    $query = "SELECT * FROM tbl_danhmuccon";
                    //buoc 3 thuc thi cau lenh
                    $result = mysqli_query($conn, $query);
                    //buoc 4 lay du lieu
                    if(mysqli_num_rows($result) >0){
                      echo'<ul class="subnav">';
                      while ($row = mysqli_fetch_assoc($result)){
                        if($row["idloaisanpham"]==1){
                          echo'<li><a href="../webforcustomer/aonam.php?IDDM='.$row["iddanhmuccon"].'&IDLSP='.$row["idloaisanpham"].'">'.$row["tendanhmuccon"].'</a></li>';
                        }
                      }
                      echo'</ul>';
                    }
                    ?>
                </li>
                <li>
                    <a href="../webforcustomer/women.php">NỮ</a>
                    <?php
                    include("../../config/config.php");
                    //buoc 2 viet truy van
                    $query = "SELECT * FROM tbl_danhmuccon";
                    //buoc 3 thuc thi cau lenh
                    $result = mysqli_query($conn, $query);
                    //buoc 4 lay du lieu
                    if(mysqli_num_rows($result) >0){
                      echo'<ul class="subnav">';
                      while ($row = mysqli_fetch_assoc($result)){
                        if($row["idloaisanpham"]==2){
                          echo'<li><a href="../webforcustomer/aonam.php?IDDM='.$row["iddanhmuccon"].'&IDLSP='.$row["idloaisanpham"].'">'.$row["tendanhmuccon"].'</a></li>';
                        }
                      }
                      echo'</ul>';
                    }
                    ?>
                </li>
                </ul>
            </div>
            <div class="header__right">
                <a class="search" href="#bannermw">
                    <i class="ti-search"></i>
                    <span class="search__title">Tìm kiếm</span>
                </a>
                <span class="ti-user" id="openlogin" href=""></span>
                <span class="ti-heart" id="openlove" href=""></span>
                <span class="ti-shopping-cart" id="openshopping" href=""></span>
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
              <a href="../forgot/nhapmail.php">Quên mật khẩu?</a>
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

        <form method="post" action="../dangki.php">
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
        <div class="model-overlay" >

        </div>
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
        <div class="model-overlay" >

        </div>
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
    

    <div class="bannermw" id="bannermw">
    </div>

    <form method="POST">
        <div class="Search" id="Search">
            <label for="txtSearch">Nhập thông tin tìm kiếm: </label>
            <input type="text" name = "txtSearch" id="txtSearch" name="txtSearch" class="txtSearch">
            <input type="submit" value = "Tìm kiếm" id="btnSearch" name="btnSearch">
        </div>
   </form>


   <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $keysearch=$_POST['txtSearch'];
            include("../../config/config.php");
            $query = "SELECT * FROM cua_hang WHERE ten LIKE '%$keysearch%' OR thanh_pho LIKE '%$keysearch%' ORDER BY idcuahang DESC";
            //buoc 2 viet truy van
            //buoc 3 thuc thi cau lenh
            $result = mysqli_query($conn, $query);
            //buoc 4 lay du lieu
            if(mysqli_num_rows($result) >0){
                echo'<div class="maincontent" id="content">
                    <div class="product_list">';
                while ($row = mysqli_fetch_assoc($result)){
                    echo '<div class="store-item">';
                    echo '<img src="../../asset/imgcuahang/' . $row["hinhanh"] . '" alt="' . $row["ten"] . '">';
                    echo '<h3>' . $row["ten"] . '</h3>';
                    echo '<p>' . $row["dia_chi"] . '</p>';
                    echo '<p>' . $row["thanh_pho"] . '</p>';
                    echo '<p>' . $row["sdt"] . '</p>';
                    echo '</div>';
                    
                }
                echo'</div>
                </div>';
            }else{
                echo'<div class="maincontent" id="content">
                Hiện chưa có cửa hàng này vui lòng tìm kiếm cửa hàng khác!
                </div>';
            }
        }
    ?>


<div class="footer">

<div class="information">

    <img src="../../asset/img/logo-routine.png" alt="" class="logo">
    <h3>CÔNG TY TNHH ROUTINE VIETNAM</h3>
    <P>Mã số thuế: 0106486365</P>
    <P></P>
    <P>Văn phòng: tầng 5 tòa nhà IMC, 62 Trần Quang Khải - Phường Tân Định - Quận 1 - TP Hồ Chí Minh.</P>
   

</div>

<div class="about">

    <div class="company">

        <h5>CÔNG TY</h5>
        <ul>
            <li><p href="">Giới thiệu về ROUTINE</p></li>
            <li><p href="">THE 31</p></li>
            <li><p href="">Tuyển dụng</p></li>
            <li><p href="">Tin thời trang</p></li>
            <li><p href="">Hợp tác nhượng quyền</p></li>
            <li><p href="">Liên hệ</p></li>
        </ul>

    </div>

    

</div>

<div class="policy">

    <h5>CHÍNH SÁCH KHÁCH HÀNG</h5>
    <ul>
        <li><p href="">Chính sách khách hàng thân thiết</p></li>
        <li><p href="">Chính sách đổi trả</p></li>
        <li><p href="">Chính sách bảo hành</p></li>
        <li><p href="">Chính sách bảo mật</p></li>
        <li><p href=""> Câu hỏi thường gặp</p></li>
        <li><p href="">hướng dẫn mua hàng online</p></li>
        <li><p href="">Hướng dẫn kiểm trra hạng thành viên</p></li>
    </ul>
    
</div>

<div class="store">

    <h5>THÔNG TIN CỬA HÀNG</h5>
    <?php
            include("../../config/config.php");
            $query = "SELECT * FROM cua_hang LIMIT 3";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<ul>
                <li>
                    <h4>'. $row["ten"] .'</h4>
                    <p>' . $row["dia_chi"] . '</p>
                    <p>' . $row["thanh_pho"] . '</p>
                </li>
            </ul>';
                }
            } else {
                echo "Không có cửa hàng nào.";
            }
            ?>
    <a href="cua_hangcst.php">XEM TẤT CẢ CỬA HÀNG</a>
</div>
</div>


    <script src="../../asset/js/main.js"></script>
</body>
</html>