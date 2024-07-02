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
    <title>Thanh toán</title>
    <link rel="stylesheet" href="../../asset/css/thanhtoan.css">
    <link rel="stylesheet" href="../../asset/css/customer.css">
    <link rel="stylesheet" href="../../asset/css/footer.css">
    <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
</head>
<body>
<div id="main">
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
          <a href="khach_hang.php"><p> Chào khách hàng </p></a>
          </div>
        </div>
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
          </div>
        </div>
      </div>
    </div>


    <script src="../../asset/js/mainafterlogin.js"></script>

    <!-- content -->
     
    <?php
// Include file cấu hình kết nối CSDL và thực hiện truy vấn
            include("../../config/config.php");

            // Mã SQL để lấy thông tin tên và email của người dùng (giả sử đã đăng nhập)
            $user_id = $ID; // Thay đổi thành phương thức phù hợp để lấy ID người dùng đăng nhập
            $sql = "SELECT * FROM user WHERE user.Id_user= $user_id";

            // Thực thi truy vấn và lấy kết quả
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                $ten = $row['Fullname'];
                $email = $row['Email'];
              }
            } else {
                // Xử lý khi không tìm thấy thông tin người dùng
                $ten = "Không có thông tin";
                $email = "Không có thông tin";
            }
?>

    <div class="cart-container">
        <div class="title">
            <p class="ti-shopping-cart"></p>
            <p class="">Giỏ hàng</p>
        </div>
        <?php
          include("../../config/config.php");
          $tongtien= 0;
          $query = "SELECT * FROM tbl_sanpham,giohang WHERE giohang.IDUser='$ID'
          AND tbl_sanpham.idsanpham=giohang.IDSanPham";
          //buoc 3 thuc thi cau lenh
          $result = mysqli_query($conn, $query);
          //buoc 4 lay du lieu
          if(mysqli_num_rows($result) >0){
            while ($row = mysqli_fetch_assoc($result)){
              $giamoi=$row["giasanpham"]*$row["SoLuong"];
              $tongtien= $tongtien+$giamoi;
              echo'<div class="cart-item">
                  <img src="../../asset/img/'.$row["hinhanhsanpham"].'" alt="">
                  <div class="item-details">
                      <p class="item-name">'.$row["tensanpham"].'</p>
                      
                      <div class="item-quantity">
                          Số lượng: '.$row["SoLuong"].'
                      </div>
                      <p class="item-price">
                          <span class="price">'.number_format($giamoi,0,',','.').' <u>đ</u></span>
                      </p>
                  </div>
              </div>';
            }
          }
        ?>
        <div class="shopping-info">
            <h3>Thông tin giao hàng</h3>
            <form>
                <div class="form-group">
                    <input type="text" value="<?php echo $ten?>">
                    <input type="text" value="0862011329">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Nhập Tỉnh/Thành phố, Quận/Huyện, Phường/Xã">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Số nhà, đường *">
                    <input type="text" value="<?php echo $email?>">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Ghi chú đơn hàng">
                </div>
            </form>
        </div>
        <div class="total-price">
            <p>Tổng tiền:</p>
            <p><?php echo''.number_format($tongtien,0,',','.').' <u>đ</u>'; ?></p>
        </div>
        <form method="POST">
        <div class="cart-buttons">
            <input type="submit" class="checkout" value="THANH TOÁN">
        </div>
        </form>
    </div>

    <?php
      if($_SERVER['REQUEST_METHOD'] == "POST"){
        include("../../config/config.php");
        $code= rand(0,9999);
        $query = "INSERT INTO tbl_donhang(iduser, madon, tinhtrang) VALUES ('$ID','$code',1)";
        $result = mysqli_query($conn, $query);
        if ($result > 0) {
          $queryC= "SELECT * FROM tbl_sanpham,giohang WHERE giohang.IDUser='$ID'
          AND tbl_sanpham.idsanpham=giohang.IDSanPham";
          $resultC = mysqli_query($conn, $queryC);
          //buoc 4 lay du lieu
          if(mysqli_num_rows($resultC) >0){
            while ($rowC = mysqli_fetch_assoc($resultC)){
              $idsanpham= $rowC["idsanpham"];
              $soluong= $rowC["SoLuong"];
              $queryCT = "INSERT INTO tbl_chitietdonhang(idsanpham, madon, soluongCT) VALUES ('.$idsanpham.','$code','$soluong')";
              mysqli_query($conn, $queryCT);
            }
          }
        }
        $sql = "DELETE FROM giohang WHERE IDUser = '$ID'";
        mysqli_query($conn, $sql);
      }
    ?>

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
</div>
</body>
</html>