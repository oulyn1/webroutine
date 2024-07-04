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
    <link rel="shortcut icon" href="../../asset/img/favicon.ico" type="image/x-icon">
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
          <a class="search" href="timkiemafterlogin.php">
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
        <div>
        <div class="body-start">
          <div>
            <a href="khach_hang.php">
              <p> Chào khách hàng </p>
            </a>
          </div>
        </div>
        </div>
        <hr />
        <div class="body-after">
          <div>
            <a href="theodoidh.php"><p>Theo dõi đơn hàng</p></a>
          </div>
          <div>
            <a href="favoriteList.php"><p>Sản phẩm yêu thích</p></a>
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
            $sql="SELECT * FROM yeuthich,tbl_sanpham WHERE IDUser='$ID' AND tbl_sanpham.idsanpham=yeuthich.IDSanPham";
            $result=mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo' <div class="modal__items">
              
              <img src="../../asset/img/'.$row["hinhanhsanpham"].'" alt="" class="image">
              <div class="modal__items__details">
                <p class="modal__items__name">
                  '.$row["tensanpham"].'
                </p>

                <p class="modal__items__price">'.number_format($row["giasanpham"],0,',','.').'<u>đ</u></p>
              </div>

              <a href="xoayt.php?ID='.$row["IDSanPham"].'" class="" style="text-decoration: none; color: black;">X</a>
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

          <div class="item_sp" style="overflow: auto;width: 100%;height: 600px;">

          <?php

            include("../../config/config.php");
            $sql="SELECT * FROM giohang,tbl_sanpham WHERE IDUser='$ID' AND tbl_sanpham.idsanpham=giohang.IDSanPham";
            $result=mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
              $gia=$row["giasanpham"]*$row["SoLuong"];
              echo' <div class="modal__items">
              
              <img src="../../asset/img/'.$row["hinhanhsanpham"].'" alt="" class="image">
              <div class="modal__items__details">
                <p class="modal__items__name">
                  '.$row["tensanpham"].'
                </p>

                <div class="modal__items__quantity">
                    <div class="title">Số lượng: '.$row["SoLuong"].'</div>
                </div>

                <p class="modal__items__price">'.number_format($row["giasanpham"],0,',','.').'<u>đ</u></p>

              </div>
                <a href="xoasp.php?ID='.$row["IDSanPham"].'" class="ti-close" style="text-decoration: none; color: black;"></a>
              </div>';       
              }
            }

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
                      <a class="ti-heart" href="addtofavo.php?ID='.$IDSP.'" method="POST"></a>
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
  $query="SELECT * FROM user WHERE Id_user=$ID";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) >0){
    while ($row = mysqli_fetch_assoc($result)){
      $name=$row["Fullname"];
      $email=$row["Email"];
    }}
?>
<div class="danhgia">
    <p class="js-buy-ticket">Gửi đánh giá của bạn</p>
  </div>

  <div class="modal js-modal">
    <div class="modal-container js-modal-container">
      <div class="modal-close js-modal-close">
        <i class="ti-close"></i>
      </div>
      <div class="modal-header">
          <p>Đánh giá</p>
      </div>
      <form action="danhgia.php?ID=<?php echo $IDSP ?>" method="POST" class="modal-body">
        <div class="label">Bạn cảm thấy sản phẩm này như thế nào?</div>
        <div class="rating">
          <input value="5" name="rating" id="star5" type="radio">
          <label for="star5"></label>
          <input value="4" name="rating" id="star4" type="radio">
          <label for="star4"></label>
          <input value="3" name="rating" id="star3" type="radio">
          <label for="star3"></label>
          <input value="2" name="rating" id="star2" type="radio">
          <label for="star2"></label>
          <input value="1" name="rating" id="star1" type="radio">
          <label for="star1"></label>
        </div>
        <div class="label"><label for="mota" class="modal-label"> Chia sẻ cảm nhận của bạn về sản phẩm </label></div>
        <div class="textarea"><textarea name="txtmota" id="mota" class="modal-input" cols="26" rows="10"></textarea></div>
        
          <input id="ticket-email"type="text" class="modal-input" placeholder="Tên" value="<?php echo $name?>"/>
          <input id="ticket-email"type="email" class="modal-input" placeholder="Enter email" value="<?php echo $email?>"/>
        
        <input type="submit" class="modal-btn" name="add" value="Gửi">
      </form>
    </div>
  </div>
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
            <a href="cua_hang_afterlogin.php">XEM TẤT CẢ CỬA HÀNG</a>
        </div>

    </div>

    <script src="../../asset/js/script.js"></script>
    <script src="../../asset/js/mainafterlogin.js"></script>
</body>
</html>