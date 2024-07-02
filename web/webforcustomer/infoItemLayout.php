<?php

session_start();
if (!isset($_SESSION["customer"])) {
  header("location: ../../index.php");
  exit;
} else {
  $ID = $_SESSION["customer"];
  $IDSP=$_GET["ID"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routine</title>
    <link rel="stylesheet" href="../../asset/css/infoItemStyle.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="../../asset/css/customer.css">
    <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="../../asset/css/footer.css">
</head>
<body>
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
          <a class="search" href="timkiem.php">
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
              
              <img src="../../asset/img/'.$row["hinhanhsanpham"].'" alt="" class="image">
              <div class="modal__items__details">
                <p class="modal__items__name">
                  '.$row["tensanpham"].'
                </p>

                <div class="modal__items__quantity">
                    <div class="title">Số lượng: '.$row["SoLuong"].'</div>
                </div>

                <p class="modal__items__price">'.$gia.'<u>đ</u></p>
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
<?php
  include("../../config/config.php");
  //buoc 2 viet truy van
  $query = "SELECT * FROM tbl_sanpham WHERE idsanpham='$_GET[ID]' ORDER BY idsanpham DESC limit 1";
  //buoc 3 thuc thi cau lenh
  $result = mysqli_query($conn, $query);
  //buoc 4 lay du lieu
  if(mysqli_num_rows($result) >0){
      while ($row = mysqli_fetch_assoc($result)){
        echo'<form action="addtocart.php?ID='.$IDSP.'" method="POST">
    <div class="main__content">
        <div class="image__content">
            <img src="../../asset/img/'.$row["hinhanhsanpham"].'" alt="" class="image__item">
        </div>
            
        <div class="product__info__main">
            <p class="product__title">
                '.$row["tensanpham"].'
            </p>
            <h2 class="price">'.number_format($row["giasanpham"],0,',','.').' <u>đ</u></h2>
            
            <div class="select__size">
                <p class="size__title">Chọn size: '.$row["size"].'</p>               
            </div>

            <div class="box__tocart">
                <div class="title">Chọn số lượng: </div>

                <div class="quantity__selector">
                    <button type="button" id="decrease">-</button>
                    <input type="number" name="sl" id="quantity" min="1" max="'.$row["soluong"].'" value="1" readonly>
                    <button type="button" id="increase">+</button>
                </div>

                <div class="add">
                    <div class="add__tocart" id="add-to-cart">
                        <input type="submit" value="THÊM VÀO GIỎ HÀNG" name="add">
                    </div>
                    <div>
                      <a class="ti-heart" href=""></a>
                    </div>
                </div>
            </div>
            <div class="product__info__bottom">

                <div class="product__feature">
                    <img src="../../asset/img/product_feature.png" alt="">
                </div>


                <div class="product-description-container">
                    <div class="product-description">
                        <h2>MÔ TẢ SẢN PHẨM</h2>
                        <h1>'.$row["tensanpham"].'</h1>
                        <p class="product-name"><strong>'.$row["tensanpham"].'</strong> '.$row["motasanpham"].'</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>';  
      }
  }
?>
<!-- <div class="size">
                    <input type="radio" id="size-s" name="size" value="S">
                    <label for="size-s">S</label>

                    <input type="radio" id="size-m" name="size" value="M">
                    <label for="size-m">M</label>

                    <input type="radio" id="size-l" name="size" value="L">
                    <label for="size-l">L</label>

                    <input type="radio" id="size-xl" name="size" value="XL">
                    <label for="size-xl">XL</label>

                    <input type="radio" id="size-xxl" name="size" value="XXL">
                    <label for="size-xxl">XXL</label>
                </div> -->

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

    <script src="../../asset/js/script.js"></script>
    <script src="../../asset/js/mainafterlogin.js"></script>
</body>
</html>