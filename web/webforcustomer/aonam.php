<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="../../asset/css/customer.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../asset/css/footer.css">
</head>
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
                <a class="search" href="timkiem.php">
                    <i class="ti-search"></i>
                    <span class="search__title">Tìm kiếm</span>
                </a>
                <span class="ti-user" id="openlogin" href=""></span>
                <span class="ti-heart" id="openlove" href=""></span>
                <span class="ti-shopping-cart" id="openshopping" href=""></span>
            </div>
        </div>


    <div class="model" id="modal-login">
        <div class="model-overlay" >

        </div>
        <div class="model-body">
            <div class="model-inner">
                <span class="ti-close"></span>
                <div class="auth">
                    <h2>Đăng nhập</h2>
                    <p>Đăng nhập thành viên Routine để nhận nhiều những chương trình ưu đãi hấp dẫn</p>
                </div>
                <div class="auth-form">
                    <div class="auth-group">
                        <p>Email</p>
                        <input type="text" placeholder="Email">
                    </div>
                    <div class="auth-group">
                        <p>Mật khẩu</p>
                        <input type="password" placeholder="Mật khẩu">
                    </div>
                </div>
                <div class="auht-control">
                    <div class="forgot">
                        <a href="">Quên mật khẩu?</a>
                    </div>
                    <button class="btn">ĐĂNG NHẬP</button>
                </div>
                <div class="auth-switch">
                    <p>Bạn chưa có tài khoản?</p>
                    <a href="#modal-signin" id="opensignin">Đăng kí thành viên -></a>
                </div>
            </div>
        </div>
    </div>


    <div class="model" id="modal-signin">
        <div class="model-overlay" >

        </div>
        <div class="model-body">
            <div class="model-inner">
                <span class="ti-close"></span>
                <div class="auth">
                    <h2>Đăng ký</h2>
                    <p>Trở thành thành viên Routine
                    để nhận nhiều những chương trình ưu đãi hấp dẫn</p>
                </div>
                <div class="auth-form">
                    <div class="auth-group">
                        <p>Họ và tên</p>
                        <input type="text" placeholder="Họ và tên">
                    </div>
                    <div class="auth-group">
                        <p>Email</p>
                        <input type="text" placeholder="Email">
                    </div>
                    <div class="auth-group">
                        <p>Mã OTP</p>
                        <input type="text" placeholder="OTP">
                    </div>
                    <div class="auth-group">
                        <p>Mật khẩu</p>
                        <input type="password" placeholder="Mật khẩu">
                    </div>
                    <div class="auth-group">
                        <p>Nhắc lại mật khẩu</p>
                        <input type="password" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <div class="auht-control">
                    <div class="dk">
                        <input type="checkbox">
                        <a href="">
                            Tôi chấp nhận <u>điều khoản quyền riêng tư và bảo mật</u>
                        </a>
                    </div>
                    <button class="btn">ĐĂNG KÍ TÀI KHOẢN</button>
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
    <?php
            include("../../config/config.php");
            //buoc 2 viet truy van
            $query = "SELECT * FROM tbl_sanpham
            WHERE iddanhmuccon='$_GET[IDDM]'
            AND idloaisanpham='$_GET[IDLSP]'
            ORDER BY idsanpham DESC";
            //buoc 3 thuc thi cau lenh
            $result = mysqli_query($conn, $query);
            //buoc 4 lay du lieu
            if(mysqli_num_rows($result) >0){
                if($_GET["IDLSP"]==1){
                    echo'<div class="bannermw">
                            <img src="../../asset/img/bannerman.png" alt="" class="img-bannermw">
                        </div>';
                }else{
                    echo'<div class="bannermw">
                            <img src="../../asset/img/bannerwoman.png" alt="" class="img-bannermw">
                        </div>';
                }
                echo'<div class="maincontent">
                    <div class="product_list">';
                while ($row = mysqli_fetch_assoc($result)){
                        echo'<div>
                        <a href="">
                            <img src="../../asset/img/'.$row["hinhanhsanpham"].'" alt="">
                            <p class="title_product">'.$row["tensanpham"].'</p>
                            <p class="price_product">'.number_format($row["giasanpham"],0,',','.').' <u>đ</u></p>
                        </a>
                        </div>';
                    
                }
                echo'</div>
                 </div>';
            }
    ?>

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


    <script src="../../asset/js/main.js"></script>
</body>
</html>