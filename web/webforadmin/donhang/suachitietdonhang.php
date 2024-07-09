<?php

session_start();
if (!isset($_SESSION["admin"])) {
    header("location: ../../../index.php");
    exit;
}else{$ID= $_SESSION["admin"];}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../../asset/css/sanpham.css?v= <?php echo time(); ?>">
    <title>Sản Phẩm</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
            <a href="../admin/main.php?ID=<?php echo $ID ?>" class="header__list-items" ><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php?ID=ID" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php?ID=ID" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"id="main"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"><b>Cửa hàng</b></a>
                <a href="../danhgia/danhgia.php" class="header__list-items"><b>Đánh giá</b></a>
            </div>
            <div class="header__list2">
                <a href="../logout.php" class="logout" class="logout">Đăng xuất</a>
            </div>
            </div>
            <div class="body">
                <div class="body-headersanpham">
                    <?php
                    include ("../../../config/config.php");
                    $id = $_GET["ID"];
                    $Madon = "";
                    $Tensp = "";
                    $Soluong = "";
                    $Dongia = "";
                    $Thanhtien = "";
                    $query = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham 
                    WHERE tbl_chitietdonhang.idsanpham=tbl_sanpham.idsanpham
                    AND idctdh='" . $id . "'";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $Madon = $row["madon"];
                            $Tensp = $row["tensanpham"];
                            $Soluong = $row["soluongCT"];
                            $Dongia = $row["giasanpham"];
                        }
                    }
                    ?>
                    <h1>Sửa số lượng đặt mua</h1>
                    <div class="tbl_them">
                        <form method="POST">
                            <table class="tlb-info">
                                <div class="user-info">
                                    <tbody>
                                        <tr>
                                            <td class="info-name"><label for="Madon">Mã đơn</label></td>
                                            <td><input type="text" class="info-name-property" id="Madon" name="txtMadon"
                                                    value="<?php echo $Madon ?>" disabled /></td>
                                        </tr>
                                        <tr>
                                            <td class="info-name"><label for="Tensp">Tên sản phẩm</label></td>
                                            <td><textarea name="txtTensp" id="Tensp" class="info-name-property" cols="26" rows="3" disabled><?php echo $Tensp ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td class="info-name"><label for="Soluong">Số lượng</label></td>
                                            <td><input type="number" class="info-name-property" id="Soluong" name="txtSoluong"
                                                    value="<?php echo $Soluong ?>" require /></td>
                                        </tr>
                                        <tr>
                                            <td class="info-name"><label for="Dongia">Đơn giá</label></td>
                                            <td><input type="text" class="info-name-property" id="Dongia" name="txtDongia"
                                                    value="<?php echo number_format($Dongia,0,',','.')?> đ" disabled /></td>
                                        </tr>
                                        <tr>
                                            <td class="info-name"><label for="Thanhtien">Thành tiền</label></td>
                                            <td><input type="text" class="info-name-property" id="Thanhtien" name="txtThanhtien"
                                                    value="<?php echo number_format($Dongia*$Soluong,0,',','.')?> đ" disabled /></td>
                                        </tr>
                                    </tbody>
                            </table>
                            <div class="tlb-add"><input type="submit" value="Sửa số lượng sản phẩm" class="btn-add"
                                    colspan="2" name="txtThem" /></div>
                        </form>
                        <?php
                        include ("../../../config/config.php");
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $Soluong = $_POST['txtSoluong'];
                            if (!$conn) {
                                echo 'Kết nối không thành công' . mysqli_connect_error();
                            } else {
                                $sql = "UPDATE tbl_chitietdonhang SET soluongCT='" . $Soluong . "'  WHERE idctdh='" . $id . "' ";
                                $result = mysqli_query($conn, $sql);
                                if ($result > 0) {
                                    echo "  <script>
                                                    alert('Cập nhật sản phẩm thành công');
                                                    window.location.href='chitietdonhang.php?CODE=$Madon';
                                                </script>";
                                } else {
                                    echo "  <script>
                                                    alert('Lỗi Cập nhật sản phẩm ');
                                                    window.location.href='chitietdonhang.php?CODE=$Madon';
                                                </script>";
                                }
                            }

                        }
                        ?>
                    </div>
                </div>
            </div>
            </div>