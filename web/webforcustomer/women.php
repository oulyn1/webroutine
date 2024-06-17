<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quần áo thời trang nữ</title>
    <link rel="stylesheet" href="../../asset/css/customer.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <div class="header__left">
                <a href="index.php" class="logo">
                    <img src="../../asset/img/logo-routine.png" alt="" class="logo__img">
                </a>
                <ul class="nav">
                    <li><a href="man.php">NAM</a></li>
                    <li><a href="women.php">NỮ</a></li>
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

    <div class="bannermw">
        <img src="../../asset/img/bannerwoman.png" alt="" class="img-bannermw">
    </div>

    <!-- <div class="maincontent">
            <ul class="product_list">
                <li>
                    <a href="">
                        <img src="../../asset/img/imgitem1.jpg" alt="">
                        <p class="title_product">Tên sản phẩm</p>
                        <p class="price_product">Giá</p>
                    </a>
                </li>
            </ul>
    </div> -->
    <?php
        $conn= mysqli_connect("localhost", "root","", "thietbi");
        if(!$conn){
            echo 'Ket noi khong thanh cong ' . mysqli_connect_error();
        }else{
            //buoc 2 viet truy van
            $query = "SELECT * FROM sanpham";
            //buoc 3 thuc thi cau lenh
            $result = mysqli_query($conn, $query);
            //buoc 4 lay du lieu
            if(mysqli_num_rows($result) >0){
                echo'<div class="maincontent">
                    <ul class="product_list">';
                while ($row = mysqli_fetch_assoc($result)){
                    echo'<li>
                    <a href="">
                        <img src="'.$row["hinhanhsanpham"].'" alt="">
                        <p class="title_product">'.$row["tensanpham"].'</p>
                        <p class="price_product">'.$row["giasanpham"].'</p>
                    </a>
                     </li>';
                }
                echo'</ul>
                 </div>';
            }
        }
    ?>
    <script src="../../asset/js/main.js"></script>
</body>
</html>