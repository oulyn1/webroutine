<?php
include("../../config/config.php");

// Kiểm tra nếu người dùng đã đăng nhập
session_start();
if (!isset($_SESSION["customer"])) {
    header("location: ../../index.php");
    exit;
} else {
    $ID = $_SESSION["customer"];
}

// Khởi tạo các biến để tránh lỗi Undefined variable
$ten = "";
$email = "";
$so_dien_thoai = "";
$dia_chi = "";

// Nếu người dùng submit form cập nhật
if (isset($_POST['update'])) {
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];
    $qsl = "SELECT * FROM user WHERE Email='$email' AND Id_user!='".$ID."'";
        $result = mysqli_query($conn, $qsl);
        if (mysqli_num_rows($result) == 0) {
    // Câu lệnh SQL để cập nhật thông tin khách hàng
    $query_update_user = "UPDATE user SET Fullname='$ten', Email='$email' WHERE Id_user=$ID";
    $query_update_khachhang = "UPDATE khach_hang SET so_dien_thoai='$so_dien_thoai', dia_chi='$dia_chi' WHERE id=$ID";

    // Thực thi câu lệnh cập nhật
    $result_update_user = mysqli_query($conn, $query_update_user);
    $result_update_khachhang = mysqli_query($conn, $query_update_khachhang);

    if ($result_update_user && $result_update_khachhang) {
        echo "<script>alert('Cập nhật thông tin thành công');</script>";
        // Cập nhật lại thông tin hiển thị trên trang
    } else {
        echo "<script>alert('Lỗi khi cập nhật thông tin');</script>";
    }
}else {
  echo "<script>
      alert('Email đã tồn tại! Vui lòng thử 1 email khác');
  </script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Khách hàng</title>
  <link rel="stylesheet" href="../../asset/css/customer.css?v= <?php echo time(); ?>">
  <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="../../asset/css/footer.css">
  <link rel="stylesheet" href="../../asset/css/thanhtoan.css">
  <link rel="shortcut icon" href="../../asset/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../../asset/css/infoItemStyle.css">
  <link rel="stylesheet" href="../../asset/css/favoriteList.css">
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
        <div class="body-start">
          <div>
            <a href="khach_hang.php">
              <p> Chào khách hàng </p>
            </a>
          </div>
        </div>
        <hr />
        <div class="body-after">
          <div>
            <a href="theodoidh.php">
              <p>Theo dõi đơn hàng</p>
            </a>
          </div>
          <div>
            <a href="favoriteList.php">
              <p>Sản phẩm yêu thích</p>
            </a>
          </div>
        </div>
        <hr />
        <div class="body-end"><a href=" ../webforadmin/logout.php">Đăng xuất</a></div>
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

          <div class="item_sp" style="overflow: auto;width: 100%;height: 600px;">

          <?php

            include("../../config/config.php");
            $sql="SELECT * FROM yeuthich,tbl_sanpham WHERE IDUser='$ID' AND tbl_sanpham.idsanpham=yeuthich.IDSanPham";
            $result=mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo' <div class="modal__items">
              
            <a href="infoItemLayout.php?ID='.$row["idsanpham"].'" style="text-decoration: none; color: #000">
              <img src="../../asset/img/'.$row["hinhanhsanpham"].'" alt="" class="image">
              <div class="modal__items__details">
                <p class="modal__items__name">
                  '.$row["tensanpham"].'
                </p>

                <p class="modal__items__price">'.number_format($row["giasanpham"],0,',','.').'<u>đ</u></p>
              </div>
            </a>

              <a href="xoayt.php?ID='.$row["IDSanPham"].'" class="" style="text-decoration: none; color: black;">X</a>
            </div> ';       
              }
            }

          ?>
               
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
              
            <a href="infoItemLayout.php?ID='.$row["idsanpham"].'" style="text-decoration: none; color: #000">
              <img src="../../asset/img/'.$row["hinhanhsanpham"].'" alt="" class="image">
              <div class="modal__items__details">
                <p class="modal__items__name">
                  '.$row["tensanpham"].'
                </p>

                <div class="modal__items__quantity">
                    <div class="title">Số lượng: '.$row["SoLuong"].'</div>
                </div>
            </a>

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

    <?php
// Include file cấu hình kết nối CSDL và thực hiện truy vấn
            include("../../config/config.php");

            // Mã SQL để lấy thông tin tên và email của người dùng (giả sử đã đăng nhập)
            $user_id = $ID; // Thay đổi thành phương thức phù hợp để lấy ID người dùng đăng nhập
            $sql = "SELECT * FROM khach_hang,user WHERE user.Id_user= $user_id AND khach_hang.id=user.Id_user";

            // Thực thi truy vấn và lấy kết quả
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                $ten = $row['Fullname'];
                $email = $row['Email'];
                $phone= $row["so_dien_thoai"];
                $address= $row["dia_chi"];
              }
            } else {
                // Xử lý khi không tìm thấy thông tin người dùng
                $ten = "Không có thông tin";
                $email = "Không có thông tin";
                $phone= "";
                $address= "";
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
                                        <p>Email:
                                          <strong><?php echo $email; ?></strong>
                                        </p>
                                    </div>
                                    <div class="box-information">
                                        <p>Số điện thoại:  <strong><?php echo $phone; ?></strong></p>
                                    </div>
                                </div>

                                <div class="personal-information">
                    <h3>Thông tin cá nhân</h3>
                    <form method="post" action="">
                        <div class="field-group-name">
                            <div class="field-group-1">
                                <p class="p2">Họ và tên</p>
                                <input type="text" name="ten" value="<?php echo $ten; ?>">
                            </div>
                        </div>
                        <div class="field-group">
                            <p class="p2">Email</p>
                            <input type="email" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="field-group">
                            <p class="p2">Số điện thoại</p>
                            <input type="number" name="so_dien_thoai" value="<?php echo $phone; ?>"maxlength="10"placeholder="hãy điền số điện thoại">
                        </div>
                        <div class="field-group">
                            <p class="p2">Địa chỉ</p>
                            <input type="text" name="dia_chi" value="<?php echo $address; ?>"placeholder="Hãy điền địa chỉ">
                        </div>
                        <button type="submit" name="update">CẬP NHẬT THÔNG TIN</button>
                    </form>
                </div>
            </div>
          </div>

          <div class="sidebar sidebar-main">
            <div class="account-page-title">
                  <h1 class="ti-user"></h1>
                  <h1>Tài khoản của bạn</h1>
                </div>
            <div class="block-collapsible-nav">
              <div class="block-title">
                <h2><?php echo $ten ?></h2>
              </div>
              <div class="block-content block-collapsible-nav-content">
                <ul class="nav items">
                  <li class="nav item current"><strong>Thông tin tài khoản</strong></li>
                  <li class="nav item"><a href="cuahang_khachhang.php">Danh sách cửa hàng</a></li>
                  <li class="nav item"><a href="favoriteList.php">Sản phẩm yêu thích</a></li>
                  <li class="nav item"><span class="delimiter"></span></li>
                  <li class="nav item"><a href="../doimatkhau.php?ID=<?php echo $_SESSION["customer"];?>">Đổi mật khẩu</a></li>
                  <li class="nav item"><a href="../webforadmin/logout.php">Đăng xuất</a></li>
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
                <li><p>Chính sách khách hàng thân thiết</p></li>
                <li><p>Chính sách đổi trả</p></li>
                <li><p>Chính sách bảo hành</p></li>
                <li><p>Chính sách bảo mật</p></li>
                <li><p>Câu hỏi thường gặp</p></li>
                <li><p>Hướng dẫn mua hàng online</p></li>
                <li><p>Hướng dẫn kiểm tra hạng thành viên</p></li>
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
        <a href="cua_hang_afterlogin.php">XEM TẤT CẢ CỬA HÀNG</a>
      </div>
    </div>
</body>

</html>