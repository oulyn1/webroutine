<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Routine hãy mặc theo cách của bạn</title>
    <link
      rel="stylesheet"
      href="../../asset/css/customer.css?v= <?php echo time(); ?>"
    />
    <link
      rel="stylesheet"
      href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css"
    />
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
                          echo'<li><a href="">'.$row["tendanhmuccon"].'</a></li>';
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
                          echo'<li><a href="">'.$row["tendanhmuccon"].'</a></li>';
                        }
                      }
                      echo'</ul>';
                    }
                    ?>
                </li>
                <li><a href="#banner">BEST</a></li>
                <li><a href="#content">NEW</a></li>
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

      <div id="slider">
        <div class="slider-wrapper">
          <div class="slider-img">
            <img src="../../asset/img/sld1.jpg" alt="img1" id="img-slider1" />
            <img src="../../asset/img/sld2.webp" alt="img2" id="img-slider2" />
            <img src="../../asset/img/sld3.webp" alt="img3" id="img-slider3" />
            <img src="../../asset/img/sld4.webp" alt="img4" id="img-slider4" />
            <img src="../../asset/img/sld5.webp" alt="img5" id="img-slider5" />
          </div>
          <div class="slider-nav">
            <a href="#img-slider1"></a>
            <a href="#img-slider2"></a>
            <a href="#img-slider3"></a>
            <a href="#img-slider4"></a>
            <a href="#img-slider5"></a>
          </div>
        </div>
      </div>

      <div id="banner">
        <img src="../../asset/img/banner1.webp" alt="" />
        <img src="../../asset/img/banner2.webp" alt="" />
      </div>

      <?php
        include("../../config/config.php");
        //buoc 2 viet truy van
        $query = "SELECT * FROM tbl_sanpham ORDER BY idsanpham DESC limit 4";
        //buoc 3 thuc thi cau lenh
        $result = mysqli_query($conn, $query);
        //buoc 4 lay du lieu
        if(mysqli_num_rows($result) >0){
            echo'<div class="maincontent" id="content">
                <ul class="product_list">';
            while ($row = mysqli_fetch_assoc($result)){
                    echo'<li>
                    <a href="">
                        <img src="../../asset/img/'.$row["hinhanhsanpham"].'" alt="">
                        <p class="title_product">'.$row["tensanpham"].'</p>
                        <p class="price_product">'.$row["giasanpham"].' <u>đ</u></p>
                    </a>
                    </li>';
                
            }
            echo'</ul>
             </div>';
        }
    ?>

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
  </body>
</html>
