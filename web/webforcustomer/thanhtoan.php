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
    <link rel="stylesheet" href="../../asset/css/footer.css">
    <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
</head>
<body>
<div class="main">

    <div id="header">

        <div class="header__left">

            <a href="" class="Logo">

                <img src="../../asset/img/logo-routine.png" alt=""  class="Logo__img">
            </a>

            <ul class="nav">

                <li><a href="">Nam</a></li>
                <li><a href="">Nữ</a></li>
                <li><a href="">New</a></li>
                <li><a href="">Best</a></li>
            </ul>

        </div>

        <div class="header__right">

            <a href="#" class="search">
                <i class="ti-search"></i>
                <span class="search__title">Tìm kiếm</span>
            </a>
            <a class="ti-user" href=""></a>
            <a class="ti-heart" href=""></a>

        </div>

    </div>

    <!-- content -->
     
    <?php
// Include file cấu hình kết nối CSDL và thực hiện truy vấn
            include("../../config/config.php");

            // Mã SQL để lấy thông tin tên và email của người dùng (giả sử đã đăng nhập)
            $user_id = $ID; // Thay đổi thành phương thức phù hợp để lấy ID người dùng đăng nhập
            $sql = "SELECT * FROM user,khach_hang WHERE user.Id_user= $user_id AND khach_hang.id=$user_id";

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

        <div class="cart-item">
            <img src="../../asset/img/ao-polo-nam-27-10s24pol004p_bright_white_1__2_jpg.png" alt="">
            <div class="item-details">
                <p class="item-name">Áo Polo Nam Vải Gân Phối Bo Nẹp Trang Trí Form Fitted - 10F23POL017</p>
                
                <div class="item-quantity">
                    Số lượng: 
                </div>
                <p class="item-price">
                    <span class="price">260.000 đ</span>
                </p>
            </div>
        </div>
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
            <p>260.000 đ</p>
        </div>
        <div class="cart-buttons">
            <button class="checkout">THANH TOÁN</button>
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
</div>
</body>
</html>