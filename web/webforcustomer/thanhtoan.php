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
?>
<?php
require("../mail/sendmail.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include("../../config/config.php");
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $code = rand(0, 9999);
  $ngaydat = date('Y-m-d H:i:s');
  $query = "INSERT INTO tbl_donhang(iduser, iddonhang, ngaydat, tinhtrang) VALUES ('$ID','$code','$ngaydat',1)";
  $result = mysqli_query($conn, $query);
  if ($result > 0) {
    $queryC = "SELECT * FROM tbl_sanpham,giohang WHERE giohang.IDUser='$ID'
          AND tbl_sanpham.idsanpham=giohang.IDSanPham";
    $resultC = mysqli_query($conn, $queryC);
    //buoc 4 lay du lieu
    if (mysqli_num_rows($resultC) > 0) {
      while ($rowC = mysqli_fetch_assoc($resultC)) {
        $idsanpham = $rowC["idsanpham"];
        $soluong = $rowC["SoLuong"];
        $queryCT = "INSERT INTO tbl_chitietdonhang(idsanpham, madon, soluongCT) VALUES ('.$idsanpham.','$code','$soluong')";
        mysqli_query($conn, $queryCT);
      }
    }
  }
  $sql = "DELETE FROM giohang WHERE IDUser = '$ID'";
  mysqli_query($conn, $sql);
  $Email = $_POST['txtEmail'];
  $subject = 'Xác nhận đơn hàng';
  $content = 'Chào bạn.<br>';
  $content .= 'Cảm ơn bạn đã đặt hàng tại Routine.<br>';
  $content .= 'Đây là mã đơn hàng của bạn:<br>';
  $content.=$code.'<br>';
  $content .= 'Trân trọng cảm ơn!';
  $mail = new Mailer;
  $mail->guimail($subject, $content, $Email);
  header("Location:camon.php?CODE=$code");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanh toán</title>
  <link rel="stylesheet" href="../../asset/css/thanhtoan.css">
  <link rel="stylesheet" href="../../asset/css/customer.css">
  <link rel="stylesheet" href="../../asset/css/footer.css">
  <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="../../asset/css/infoItemStyle.css">
  <link rel="shortcut icon" href="../../asset/img/favicon.ico" type="image/x-icon">
</head>

<body>
  <div id="main">
    <div id="header">
      <div class="header__left">
        <a href="mainafterlogin.php" class="logo">
          <img src="../../asset/img/logo-routine.png" alt="" class="logo__img" />
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
            include("../../config/config.php");
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

          <div class="item_sp" style="overflow: auto;width: 100%;height: 600px;">

            <?php

            include("../../config/config.php");
            $sql = "SELECT * FROM yeuthich,tbl_sanpham WHERE IDUser='$ID' AND tbl_sanpham.idsanpham=yeuthich.IDSanPham";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo ' <div class="modal__items">
              
            <a href="infoItemLayout.php?ID=' . $row["idsanpham"] . '" style="text-decoration: none; color: #000">
              <img src="../../asset/img/' . $row["hinhanhsanpham"] . '" alt="" class="image">
              <div class="modal__items__details">
                <p class="modal__items__name">
                  ' . $row["tensanpham"] . '
                </p>

                <p class="modal__items__price">' . number_format($row["giasanpham"], 0, ',', '.') . '<u>đ</u></p>
              </div>
            </a>

              <a href="xoayt.php?ID=' . $row["IDSanPham"] . '" class="" style="text-decoration: none; color: black;">X</a>
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
          </div>
        </div>
      </div>
    </div>


    <script src="../../asset/js/mainafterlogin.js"></script>

    <!-- content -->




    <div class="cart-container">
      <div class="title">
        <p class="ti-shopping-cart"></p>
        <p class="">Giỏ hàng</p>
      </div>
      <?php
      include("../../config/config.php");
      $tongtien = 0;
      $query = "SELECT * FROM tbl_sanpham,giohang WHERE giohang.IDUser='$ID'
          AND tbl_sanpham.idsanpham=giohang.IDSanPham";
      //buoc 3 thuc thi cau lenh
      $result = mysqli_query($conn, $query);
      //buoc 4 lay du lieu
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $giamoi = $row["giasanpham"] * $row["SoLuong"];
          $tongtien = $tongtien + $giamoi;
          echo '<div class="cart-item">
                  <img src="../../asset/img/' . $row["hinhanhsanpham"] . '" alt="">
                  <div class="item-details">
                      <a href="infoItemLayout.php?ID=' . $row["idsanpham"] . '" class="item-name" style="text-decoration: none; color: #000;" >' . $row["tensanpham"] . '</a>
                      
                      <div class="item-quantity">
                          Số lượng: ' . $row["SoLuong"] . '
                      </div>
                      <p class="item-price">
                          <span class="price">' . number_format($giamoi, 0, ',', '.') . ' <u>đ</u></span>
                      </p>
                  </div>

                  <a href="xoayt.php?ID=' . $row["IDSanPham"] . '" class="" style="text-decoration: none; color: black;">X</a>
              </div>';
        }
      }
      ?>

      <?php

      $sql = "SELECT * FROM khach_hang, user WHERE user.Id_user = $ID AND khach_hang.id = user.Id_user";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ten = $row['Fullname'];
        $email = $row['Email'];
        $so_dien_thoai = $row['so_dien_thoai'];
        $dia_chi = $row['dia_chi'];
      } else {
        $ten = "Không có thông tin";
        $email = "Không có thông tin";
        $so_dien_thoai = "Không có thông tin";
        $dia_chi = "Không có thông tin";
      }
      ?>
      <div class="shopping-info">
        <h3>Thông tin giao hàng</h3>
        <form method="POST">
          <div class="form-group">
            <input type="text" value="<?php echo $ten; ?>" placeholder="Nhập Họ Và Tên" required>
            <input type="text" id="sdt" value="<?php echo $so_dien_thoai; ?>" placeholder="Nhập Số Điện Thoại" required>
          </div>
          <div class="form-group">
            <input type="text" id="dia_chi" value="<?php echo $dia_chi; ?>" placeholder="Nhập Địa Chỉ" required>
          </div>
          <div class="form-group">
            <input type="text" value="<?php echo $email ?>" placeholder="Nhập Địa Chỉ Email" required name="txtEmail">
          </div>
      </div>
      <div class="total-price">
        <p>Tổng tiền:</p>
        <p><?php echo '' . number_format($tongtien, 0, ',', '.') . ' <u>đ</u>'; ?></p>
      </div>

      <div class="cart-buttons">
        <input type="submit" class="checkout" onclick="check()" value="THANH TOÁN">
      </div>
      </form>
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
            <li>
              <p href="">Giới thiệu về ROUTINE</p>
            </li>
            <li>
              <p href="">THE 31</p>
            </li>
            <li>
              <p href="">Tuyển dụng</p>
            </li>
            <li>
              <p href="">Tin thời trang</p>
            </li>
            <li>
              <p href="">Hợp tác nhượng quyền</p>
            </li>
            <li>
              <p href="">Liên hệ</p>
            </li>
          </ul>

        </div>



      </div>

      <div class="policy">

        <h5>CHÍNH SÁCH KHÁCH HÀNG</h5>
        <ul>
          <li>
            <p>Chính sách khách hàng thân thiết</p>
          </li>
          <li>
            <p>Chính sách đổi trả</p>
          </li>
          <li>
            <p>Chính sách bảo hành</p>
          </li>
          <li>
            <p>Chính sách bảo mật</p>
          </li>
          <li>
            <p>Câu hỏi thường gặp</p>
          </li>
          <li>
            <p>Hướng dẫn mua hàng online</p>
          </li>
          <li>
            <p>Hướng dẫn kiểm tra hạng thành viên</p>
          </li>
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
                    <h4>' . $row["ten"] . '</h4>
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
  </div>
</body>

</html>