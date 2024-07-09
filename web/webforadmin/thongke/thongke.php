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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <title>Thống kê</title>
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
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"id="main"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"><b>Cửa hàng</b></a>
                <a href="../danhgia/danhgia.php" class="header__list-items"><b>Đánh giá</b></a>
            </div>
            <div class="header__list2">
                <form method="POST">
                    <input type="text" name="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form>
                <a href="../logout.php" class="logout" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Thống kê</h1>
            </div>
            
            <div id="revenue-chart" style="height: 250px;"></div>

            <?php
            include("../../../config/config.php");
            $doanhthu = 0;
            $sodon = 0;
            $sohang = 0;
            $query = "SELECT DATE(tbl_donhang.ngaydat) AS ngay, 
            SUM(tbl_sanpham.giasanpham * tbl_chitietdonhang.soluongCT) AS doanhthu_ngay,
            COUNT(DISTINCT tbl_donhang.iddonhang) AS sodon_ngay,
            SUM(tbl_chitietdonhang.soluongCT) AS sohang_ngay
            FROM tbl_donhang,tbl_sanpham,tbl_chitietdonhang
            WHERE tbl_donhang.iddonhang = tbl_chitietdonhang.madon
            AND tbl_chitietdonhang.idsanpham = tbl_sanpham.idsanpham
            AND tbl_donhang.tinhtrang = 0
            GROUP BY DATE(tbl_donhang.ngaydat)
            ORDER BY DATE(tbl_donhang.ngaydat) DESC";

            $result = mysqli_query($conn, $query);

            // Kiểm tra và xử lý kết quả truy vấn
            if(mysqli_num_rows($result) > 0) {
            echo "<script>
            $(document).ready(function() {
            // Dữ liệu doanh thu
            var data = [";
            while ($row = mysqli_fetch_assoc($result)) {
            $doanhthu += $row["doanhthu_ngay"];
            $sodon += $row["sodon_ngay"];
            $sohang += $row["sohang_ngay"];

            echo "
            { date: '".$row["ngay"]."', sales: ".$row["doanhthu_ngay"].", order: ".$row["sodon_ngay"].", quantity: ".$row["sohang_ngay"]." },";
            }
            echo "
            ];

            // Tạo biểu đồ
            new Morris.Bar({
            element: 'revenue-chart',
            data: data,
            xkey: 'date',
            ykeys: ['sales', 'order', 'quantity'],
            labels: ['Doanh thu', 'Số đơn hàng', 'Số lượng đã bán'],
            resize: true
            });
            });
            </script>";
            } else {
            echo "Không có dữ liệu";
            }

            ?>


        </div>
    </div>
</body>