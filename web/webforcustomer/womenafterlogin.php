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
                <a href="mainafterlogin.php" class="logo">
                    <img src="../../asset/img/logo-routine.png" alt="" class="logo__img">
                </a>
                <ul class="nav">
                    <li><a href="manafterlogin.php">NAM</a></li>
                    <li><a href="womenafterlogin.php">NỮ</a></li>
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
            <a href=""><p>Theo dõi đơn hàng</p></a>
          </div>
          <div>
            <a href=""><p>Sản phẩm yêu thích</p></a>
          </div>
        </div>
        <hr />
        <div class="body-end"><a href="index.php">Đăng xuất</a></div>
      </div>
    </div>

    <script src="../../asset/js/mainafterlogin.js"></script>

    <div class="bannermw">
        <img src="../../asset/img/bannerwoman.png" alt="" class="img-bannermw">
    </div>

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