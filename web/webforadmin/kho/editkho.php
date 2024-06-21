<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <title>Sửa Sản Phẩm</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
                <a href="../admin/main.php" class="header__list-items"><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php" class="header__list-items" id="main"><b>Sản phẩm</b></a>
                <a href="../kho/kho.php" class="header__list-items"><b>Kho</b></a>
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
                <h1>Sửa Thông Tin Sản Phẩm Kho</h1>
            </div>
            <?php 
            include("../../../config/config.php");
            $idsanpham = $_GET['idsanpham'];
            $soluong = "";
            $Ngaynhap = "";
            if (!$conn){
                echo 'kết nối không thành công' . mysqli_connect_error();
            }
            else{
                $sql = "SELECT * FROM khohang WHERE idsanpham='".$idsanpham."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idsanpham = $row["idsanpham"];
                        $soluong = $row["soluong"];
                        $Ngaynhap = $row["ngaynhap"];
                    }
                }
            }
            ?>

            <form method="POST" enctype="multipart/form-data">
                <table class="tlb-info">
                    <div class="user-info">
                        <tbody>
                        <tr>
                            <td class="info-name"><label for="MaSP">Mã sản phẩm</label></td>
                            <td><input type="text" class="info-name-property" id="idsanpham" name="txtidsanpham" value="<?php echo $idsanpham; ?>" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="soluong">Số lượng</label></td>
                            <td><input type="text" class="info-name-property" id="soluong" name="txtSoLuong" value="<?php echo $soluong; ?>" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="ngaynhap">Ngày nhập</label></td>
                            <td><input type="date" class="info-name-property" id="ngaynhap" name="txtNgayNhap" value="<?php echo $Ngaynhap; ?>" required /></td>
                        </tr>
                        </tbody>
                    </div>
                </table>
                <div class="tlb-add"><input type="submit" value="Cập nhật sản phẩm" class="btn-add" name="txtCapNhat" /></div>
            </form>
        </div>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idsanpham = $_POST['txtidsanpham'];
        $soluong = $_POST['txtSoLuong'];
        $Ngaynhap = $_POST['txtNgayNhap'];

        $sql = "UPDATE khohang SET idsanpham='$idsanpham', soluong='$soluong', ngaynhap='$ngaynhap' WHERE idsanpham='$idsanpham    '";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>
                    alert('Cập nhật dữ liệu thành công');
                    window.location.href='kho.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Lỗi Cập nhật dữ liệu');
                    window.location.href='kho.php';
                  </script>";
        }
    }
    ?>
</body>

</html>