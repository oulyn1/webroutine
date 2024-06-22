<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="../../asset/css/thanhtoan.css">
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

    <div class="container">
        <h1>Đặt hàng</h1>
        <form action="xu_ly_dat_hang.php" method="post">
            <label for="ten_khachhang">Tên khách hàng:</label>
            <input type="text" id="ten_khachhang" name="ten_khachhang" required><br>
            
            <label for="sdt_khachhang">Số điện thoại:</label>
            <input type="text" id="sdt_khachhang" name="sdt_khachhang" required><br>
            
            <label for="dia_chi">Địa chỉ giao hàng:</label>
            <input type="text" id="dia_chi" name="dia_chi" required><br>
            
            <label for="email_khachhang">Email:</label>
            <input type="email" id="email_khachhang" name="email_khachhang" required><br>
            
            <label for="ten_sanpham">Tên sản phẩm:</label>
            <input type="text" id="ten_sanpham" name="ten_sanpham" required><br>
            
            <label for="so_luong">Số lượng:</label>
            <input type="number" id="so_luong" name="so_luong" min="1" required><br>
            
            <label for="gia">Giá:</label>
            <input type="text" id="gia" name="gia" required><br>
            
            <input type="submit" value="Đặt hàng">
        </form>
    </div>

        <div class="check">

            <div class="check-img"></div>
            <h1>Giỏ hàng</h1>

        </div>

        <div class="content-main">

        </div>
    </div>

    <!-- footer -->

    <div class="footer">

        <div class="information">

            <img src="../../asset/img/logo-routine.png" alt="" class="logo">
            <h3>CÔNG TY TNHH ROUNTIINE VIETNAM</h3>
            <P>Mã số thuế: 0106486365</P>
            <P></P>
            <P>Văn phòng: tầng 5 tòa nahf IMC, 62 Trần Quang Khải - Phường Tân Định - Quận 1 - TP Hồ Chí Minh.</P>
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
            <a href="">XEM TẤT CẢ CỬA HÀNG</a>
        </div>
    </div>
</div>
</body>
</html>