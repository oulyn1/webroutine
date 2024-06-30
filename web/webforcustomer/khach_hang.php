<?php

session_start();
if (!isset($_SESSION["customer"])) {
  header("location: ../../../index.php");
  exit;
} else {
  $ID = $_SESSION["customer"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quần áo thời trang nam</title>
  <link rel="stylesheet" href="../../asset/css/customer.css?v= <?php echo time(); ?>">
  <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="../../asset/css/footer.css">
  <link rel="stylesheet" href="../../asset/css/thanhtoan.css">
  <link rel="stylesheet" href="../../asset/css/kh.css">

</head>

<body>
  < id="main">

    <!-- header -->

    <div id="header">
      <div class="header__left">
        <a href="mainafterlogin.php" class="logo">
          <img src="../../asset/img/logo-routine.png" alt="" class="logo__img" />
        </a>
        <ul id="nav">
          <li>
            <a href="manafterlogin.php">NAM</a>
            <?php
            include ("../../config/config.php");
            //buoc 2 viet truy van
            $query = "SELECT * FROM tbl_danhmuccon";
            //buoc 3 thuc thi cau lenh
            $result = mysqli_query($conn, $query);
            //buoc 4 lay du lieu
            if (mysqli_num_rows($result) > 0) {
              echo '<ul class="subnav">';
              while ($row = mysqli_fetch_assoc($result)) {
                if ($row["idloaisanpham"] == 1) {
                  echo '<li><a href="../webforcustomer/aonamafterlogin.php?IDDM=' . $row["iddanhmuccon"] . '&IDLSP=' . $row["idloaisanpham"] . '">' . $row["tendanhmuccon"] . '</a></li>';
                }
              }
              echo '</ul>';
            }
            ?>
          </li>
          <li>
            <a href="womenafterlogin.php">NỮ</a>
            <?php
            include ("../../config/config.php");
            //buoc 2 viet truy van
            $query = "SELECT * FROM tbl_danhmuccon";
            //buoc 3 thuc thi cau lenh
            $result = mysqli_query($conn, $query);
            //buoc 4 lay du lieu
            if (mysqli_num_rows($result) > 0) {
              echo '<ul class="subnav">';
              while ($row = mysqli_fetch_assoc($result)) {
                if ($row["idloaisanpham"] == 2) {
                  echo '<li><a href="../webforcustomer/aonamafterlogin.php?IDDM=' . $row["iddanhmuccon"] . '&IDLSP=' . $row["idloaisanpham"] . '">' . $row["tendanhmuccon"] . '</a></li>';
                }
              }
              echo '</ul>';
            }
            ?>
          </li>
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

    <div class="model" id="modal-signin">
      <div class="model-overlay"></div>
      <div class="modal-after">
        <div class="model-innerafter">
          <span class="ti-close"></span>
        </div>
        <div class="body-start">Chào khách hàng</div>
        <hr />
        <div class="body-after">
          <div>
            <a href="">
              <p>Theo dõi đơn hàng</p>
            </a>
          </div>
          <div>
            <a href="">
              <p>Sản phẩm yêu thích</p>
            </a>
          </div>
        </div>
        <hr />
        <div class="body-end"><a href="../webforadmin/logout.php">Đăng xuất</a></div>
      </div>
    </div>

    <script src="../../asset/js/mainafterlogin.js"></script>

    <!-- content -->

    <?php
    // Include file cấu hình kết nối CSDL và thực hiện truy vấn
    include ("../../config/config.php");

    // Mã SQL để lấy thông tin tên và email của người dùng (giả sử đã đăng nhập)
    $user_id = $ID; // Thay đổi thành phương thức phù hợp để lấy ID người dùng đăng nhập
    $sql = "SELECT * FROM user,khach_hang WHERE user.Id_user = $user_id";

    // Thực thi truy vấn và lấy kết quả
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $ten = $row["Fullname"];
        $email = $row["Email"];
      }
    } else {
      // Xử lý khi không tìm thấy thông tin người dùng
      $ten = "Không có thông tin";
      $email = "Không có thông tin";
    }
    ?>

    <div class="content">

      <div class="breadcrumbs">

      </div>
      <div class="page-main">
        <div class="columns">
          <div class="column-main">
            <div class="page-title-wrapper">
              <h2>Thông tin tài khoản</h2>
              <p class="p1">Bạn có thể cập nhật thông tin của mình ở trang này</p>
            </div>
            <div class="block-account-information">
              <div class="login-information">
                <h3>Thông tin đăng nhập</h3>
                <div class="box-information">
                  <p>Email:<?php echo $email; ?></p>
                </div>
                <div class="box-information">
                  <p>Số điện thoại:</p>
                </div>
              </div>

              <div class="personal-information">
                <h3>Thông tin cá nhân</h3>

                <div class="field-group-name">
                  <div class="field-group-1">
                    <p class="p2">Họ và tên</p>
                    <input type="text" value="<?php echo $ten; ?>">
                  </div>
                </div>

                <div class="field-group">
                  <p class="p2">Email</p>
                  <input type="email" value="<?php echo $email; ?>">
                </div>

                <div class="field-group">
                  <p class="p2">Số điện thoại</p>
                  <input type="number">
                </div>

                <div class="field-group">
                  <p class="p2">Giới tính</p>
                  <input type="checkbox" name="sex" id="cb1"> Nam
                  <input type="checkbox" name="sex" id="cb2"> Nữ
                </div>
                <button>CẬP NHẬT THÔNG TIN</button>
              </div>
            </div>
          </div>

          <div class="sidebar sidebar-main">
            <div class="account-page-title">
              <h1 class="ti-user">Tài khoản của bạn</h1>
            </div>
            <div class="block-collapsible-nav">
              <div class="block-title">
                <h2>Toàn Nguyễn</h2>
              </div>
              <div class="block-content block-collapsible-nav-content">
                <ul class="nav items">
                  <li class="nav item current"><strong>Thông tin tài khoản</strong></li>
                  <li class="nav item"><a href="">Hạng hội viên</a></li>
                  <li class="nav item"><a href="">Lịch sử mua hàng</a></li>
                  <li class="nav item"><a href="">Địa chỉ giao hàng</a></li>
                  <li class="nav item"><a href="">Danh sách cửa hàng</a></li>
                  <li class="nav item"><a href="">Sản phẩm yêu thích</a></li>
                  <li class="nav item"><span class="delimiter"></span></li>
                  <li class="nav item"><a href="">Đăng xuất</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->

    <div class="footer">
      <div class="information">

        <img src="../../asset/img/logo-routine.png" alt="" class="logo">
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
</body>

</html>