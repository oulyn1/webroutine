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
                <a href="../admin/main.php?ID=ID" class="header__list-items" ><b>Tổng quan</b></a>
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
                <a href="" class="logout" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Thống kê</h1>
            </div>
            
            <div id="revenue-chart" style="height: 250px;"></div>
            <script>
                $(document).ready(function() {
                    // Dữ liệu doanh thu
                    var data = [
                        { date: '2016', sales:5000000, order:40 , quantity: 50 },
                        { date: '2017', sales:3000000, order:30 , quantity: 40 },
                        { date: '2018', sales:6000000, order:55 , quantity: 55 },
                        { date: '2019', sales:8000000, order:65 , quantity: 65 },
                    ];

                    // Tạo biểu đồ
                    new Morris.Bar({
                        element: 'revenue-chart',
                        data: data,
                        xkey: 'date',
                        ykeys: ['sales','order','quantity'],
                        labels: ['Doanh thu','Số đơn hàng','Số lượng đã bán'],
                        resize: true
                    });
                });
            </script>

            <?php

                include("../../../config/config.php");
                $doanhthu = 0;
                $sodon = 0;
                $sohang = 0;
                $query = "SELECT * FROM tbl_donhang,tbl_chitietdonhang,tbl_sanpham 
                WHERE tbl_donhang.iddonhang=tbl_chitietdonhang.madon
                AND tbl_chitietdonhang.idsanpham=tbl_sanpham.idsanpham
                AND tbl_donhang.tinhtrang=0";
                //buoc 3 thuc thi cau lenh
                $result = mysqli_query($conn, $query);
                //buoc 4 lay du lieu
                if(mysqli_num_rows($result) >0){
                    while ($row = mysqli_fetch_assoc($result)){
                        $doanhthu += $row ["giasanpham"] * $row["soluongCT"];
                        $sohang += $row ["soluongCT"] ;
                    }
                }

                $querya = "SELECT * FROM tbl_donhang where tinhtrang = 0 ";
                //buoc 3 thuc thi cau lenh
                $resulta = mysqli_query($conn, $querya);
                //buoc 4 lay du lieu
                if(mysqli_num_rows($resulta) >0){
                    while ($rowa = mysqli_fetch_assoc($resulta)){
                        $sodon ++ ;
                    }
                }

            ?>


        </div>
    </div>
</body>