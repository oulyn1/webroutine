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
          <ul class="nav">
            <li><a href="manafterlogin.php">NAM</a></li>
            <li><a href="womenafterlogin.php">NỮ</a></li>
            <li><a href="#banner">NEW</a></li>
            <li><a href="#content">BEST</a></li>
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

      <div id="content">
        <div class="content-items">
          <img src="../../asset/img/imgitem1.jpg" alt="" />
          <div class="item-title">
            <a href="" class="font-titles"
              >Áo Polo Nam Premium 100% Cotton Phối Sọc Form Fitted -
              10S24POL004P</a
            >
            <a href="" class="ti-heart"></a>
          </div>
          <b>499.000 đ</b>
        </div>
        <div class="content-items">
          <img src="../../asset/img/imgitem1.jpg" alt="" />
          <div class="item-title">
            <a href="" class="font-titles"
              >Áo Polo Nam Premium 100% Cotton Phối Sọc Form Fitted -
              10S24POL004P</a
            >
            <a href="" class="ti-heart"></a>
          </div>
          <b>499.000 đ</b>
        </div>
        <div class="content-items">
          <img src="../../asset/img/imgitem1.jpg" alt="" />
          <div class="item-title">
            <a href="" class="font-titles"
              >Áo Polo Nam Premium 100% Cotton Phối Sọc Form Fitted -
              10S24POL004P</a
            >
            <a href="" class="ti-heart"></a>
          </div>
          <b>499.000 đ</b>
        </div>
        <div class="content-items">
          <img src="../../asset/img/imgitem1.jpg" alt="" />
          <div class="item-title">
            <a href="" class="font-titles"
              >Áo Polo Nam Premium 100% Cotton Phối Sọc Form Fitted -
              10S24POL004P</a
            >
            <a href="" class="ti-heart"></a>
          </div>
          <b>499.000 đ</b>
        </div>
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
  </body>
</html>
