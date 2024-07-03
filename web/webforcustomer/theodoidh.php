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

                <p class="modal__items__price">'.number_format($row["giasanpham"],0,',','.').'<u>đ</u></p>
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
    <div class="divall">
        <div class="container">
            <div class="tracking-form">
                <h2>Theo dõi đơn hàng</h2>
                <p>Nhập thông tin để theo dõi đơn hàng của bạn</p>
                <form>
                    <label for="order-id">Mã đơn hàng: *</label>
                    <input type="text" id="order-id" name="order-id" value="RT000080044">
                    
                    <label for="phone-number">Số điện thoại đặt hàng *</label>
                    <input type="text" id="phone-number" name="phone-number" value="0862011329">
                    
                    <button type="submit">KIỂM TRA</button>
                </form>
            </div>
            <div class="order-details">
                <div>
                    <h2>Đơn hàng #RT000080044</h2>
                    <h3 style="padding-top: 10px; padding-bottom: 10px;">Theo dõi đơn hàng</h3>
                    <ul>
                        <li class="completed">Đặt hàng thành công</li>
                        <li class="completed">Tiếp nhận & chờ xử lý</li>
                        <li>Đã xử lý đơn hàng</li>
                    </ul>
                    <h3>Đơn hàng gồm có</h3>
                    <div class="product">
                        <img src="../../asset/img/ao-polo-nam-27-10s24pol004p_bright_white_1__2_jpg.png" alt="Áo POLO NAM">
                        <div class="product-details">
                            <p><strong>ÁO POLO NAM PREMIUM 100% COTTON PHỐI SỌC FORM FITTED - 10S24POLO04P</strong></p>
                            <p>SL: 1</p>
                            <p class="price">589.000 đ</p>
                        </div>
                    </div>
                    <div class="btnhuydon"><a href="" class="button">Hủy Đơn</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../asset/js/script.js"></script>
    <script src="../../asset/js/mainafterlogin.js"></script>
</body>
</html>