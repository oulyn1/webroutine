<?php

session_start();
if (!isset($_SESSION["customer"])) {
  header("location: ../../index.php");
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
    <link rel="stylesheet" href="../../asset/css/favoriteList.css">
    <link rel="stylesheet" href="../../asset/css/infoItemStyle.css">
    <link rel="stylesheet" href="../../asset/css/cuahang.css">
</head>
<body>
  < id="main">

  <!-- header -->

      <div id="header">
        <div class="header__left">
          <a href="mainafterlogin.php" class="logo">
            <img
              src="../../asset/img/logo-routine.png"
              alt=""
              class="logo__img"
            />
          </a>
          <ul id="nav">
          <li>
                    <a href="manafterlogin.php">NAM</a>
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
                          echo'<li><a href="../webforcustomer/aonamafterlogin.php?IDDM='.$row["iddanhmuccon"].'&IDLSP='.$row["idloaisanpham"].'">'.$row["tendanhmuccon"].'</a></li>';
                        }
                      }
                      echo'</ul>';
                    }
                    ?>
                </li>
                <li>
                    <a href="womenafterlogin.php">NỮ</a>
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
                          echo'<li><a href="../webforcustomer/aonamafterlogin.php?IDDM='.$row["iddanhmuccon"].'&IDLSP='.$row["idloaisanpham"].'">'.$row["tendanhmuccon"].'</a></li>';
                        }
                      }
                      echo'</ul>';
                    }
                    ?>
                </li>
            </ul>
        </div>
        <div class="header__right">
          <a class="search" href="timkiemafterlogin.php">
            <i class="ti-search"></i>
            <span class="search__title">Tìm kiếm</span>
          </a>
          <span class="ti-user" id="openlogin" href=""></span>
          <span class="ti-heart" id="openlove" href=""></span>
          <span class="ti-shopping-cart" id="openshopping" href=""></span>
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
            <a href=""><p>Theo dõi đơn hàng</p></a>
          </div>
          <div>
            <a href=""><p>Sản phẩm yêu thích</p></a>
          </div>
        </div>
        <hr />
        <div class="body-end"><a href="../webforadmin/logout.php">Đăng xuất</a></div>
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
          </div><div class="item_sp" style="overflow: auto;width: 100%;height: 600px;">
          <?php
              include("../../config/config.php");
              $sql="SELECT * FROM giohang,tbl_sanpham WHERE IDUser='$ID' AND tbl_sanpham.idsanpham=giohang.IDSanPham";
              $result=mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)){
                $gia=$row["giasanpham"]*$row["SoLuong"];
                 echo'
            <div class="modal__items">
              
              <img src="../../asset/img/'.$row["hinhanhsanpham"].'" alt="" class="image">
              <div class="modal__items__details">
                <p class="modal__items__name">
                  '.$row["tensanpham"].'
                </p>

                <div class="modal__items__quantity">
                    <div class="title">Số lượng: '.$row["SoLuong"].'</div>
                </div>

                <p class="modal__items__price">'.number_format($row["giasanpham"],0,',','.').'<u>đ</u></p>
              </div>

              <a href="xoasp.php?ID='.$row["IDSanPham"].'" class="ti-close" style="text-decoration: none; color: black;"></a>
            </div>';       
              }}
               ?>
          </div>
        </div>

        <?php
          include("../../config/config.php");
          $sql="SELECT * FROM giohang,tbl_sanpham WHERE IDUser='$ID' AND tbl_sanpham.idsanpham=giohang.IDSanPham";
          $result=mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
            echo '<div class="modal__buttons">
            <a href="../webforcustomer/thanhtoan.php" class="button-check-out">THANH TOÁN</a>
          </div>';
          }
        
        ?>  
          
          
      </div>
    </div>


    <script src="../../asset/js/mainafterlogin.js"></script>

    <!-- content -->


    <div class="content">
      <div class="breadcrumbs"></div>

      <div class="page-main">
        <div class="columns">
            <div class="column-main">
                <div class="page-title-wrapper">
                    <h1 class="page-title">Danh sách cửa hàng</h1>
                    <p class="des">Danh sách các cửa hàng của Routine</p>
                </div>

                <div class="store-list">
            <?php
            include("../../config/config.php");
            $query = "SELECT * FROM cua_hang";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="store-item">';
                    echo '<img src="../../asset/imgcuahang/' . $row["hinhanh"] . '" alt="' . $row["ten"] . '">';
                    echo '<h3>' . $row["ten"] . '</h3>';
                    echo '<p>' . $row["dia_chi"] . '</p>';
                    echo '<p>' . $row["thanh_pho"] . '</p>';
                    echo '<p>' . $row["sdt"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "Không có cửa hàng nào.";
            }
            ?>
        </div>
            </div>

            <div class="sidebar sidebar-main">
                <div class="account-page-title">
                  <h1 class="ti-user"></h1>
                  <h1>Tài khoản của bạn</h1>
                </div>
                <div class="block-collapsible-nav">
                    <div class="block-title">
                        <h2>Toàn Nguyễn</h2>
                    </div>
                    <div class="block-content block-collapsible-nav-content">
                    <ul class="nav items">
                        <li class="nav item"><a href="khach_hang.php">Thông tin tài khoản</a></li>
                        <li class="nav item"><strong>Danh sách cửa hàng</strong></li>
                        <li class="nav item"><a href="favoriteList.php">Sản phẩm yêu thích</a></li>
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
                <li><p href="">Giới thiệu về ROUTINE</p></li>
                <li><p href="">THE 31</p></li>
                <li><p href="">Tuyển dụng</p></li>
                <li><p href="">Tin thời trang</p></li>
                <li><p href="">Hợp tác nhượng quyền</p></li>
                <li><p href="">Liên hệ</p></li>
            </ul>

        </div>

        <div class="social">

            <h3>KẾT NỐI VỚI CHÚNG TÔI</h3>

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
            <li><p href="">Hướng dẫn kiểm tra hạng thành viên</p></li>
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