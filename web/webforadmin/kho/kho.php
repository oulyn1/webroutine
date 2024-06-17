<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../../asset/css/table.css">
    <title>Kho</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
                <a href="../admin/main.php" class="header__list-items"><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../kho/kho.php" class="header__list-items" id="main"><b>Kho</b></a>
                <a href="../thongke/thongke.php" class="header__list-items"><b>Thống Kê</b></a>
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
                <h1>Quản lý Kho</h1>
            </div>
            <?php 
            include("../../../config/config.php");
            $sql = "SELECT * FROM kho"; 
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
             echo '<table id="tblMain">
                <thead>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Hình ảnh</th>
                    <th>Miêu tả</th>
                    <th>Cập Nhật</th>
                </thead>
        
            <tbody>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $row["ID"] . '</td>
                        <td>' . $row["Name"] . '</td>
                        <td>' . $row["Size"] . '</td>
                        <td>' . $row["Color"] . '</td>
                        <td>' . $row["GiaBan"] . '</td>
                        <td>' . $row["SoLuong"] . '</td>
                        <td>' . $row["Image"] . '</td>
                        <td>' . $row["MieuTa"] . '</td>
                       
                </tr>'; 
            }
            echo'</tbody> 
            </table>';
            }
            ?>
        </div>
        