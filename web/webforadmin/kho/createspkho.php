<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../../asset/css/kho.css">
    <title>Tạo Sản Phẩm Kho</title>
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
                <h1>Thêm Sản Phẩm Kho</h1>
            </div>
            <form method="POST">
                <table class="tlb-info">
                    <div class="user-info">
                        <tbody>
                        <tr>
                            <td class="info-name"><label for="idsanpham">ID Sản Phẩm</label></td>
                            <td><input type="text" class="info-name-property" id="idsanpham" name="txtidsanpham" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="soluong">Số lượng</label></td>
                            <td><input type="text" class="info-name-property" id="soluong" name="txtsoluong" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="ngaynhap">Ngày nhập</label></td>
                            <td><input type="date" class="info-name-property" id="ngaynhap" name="txtngaynhap" required /></td>
                        </tr>
                    </tbody>
                </table>
                <div class="tlb-add"><input type="submit" value="Thêm sản phẩm" class="btn-add" colspan="2" name="txtThem" /></div>
            </form>

        </div>
    </div>
    <?php
        include("../../../config/config.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idsanpham = $_POST['txtidsanpham'];
            $soluong = $_POST['txtsoluong'];
            $ngaynhap = $_POST['txtngaynhap'];
            if (!$conn) {
                echo 'Kết nối không thành công' . mysqli_connect_error();
            }
            else {
                $sql = "INSERT INTO khohang VALUES ('".$idsanpham."' ,'".$soluong."','".$ngaynhap."')";
                $result = mysqli_query($conn, $sql);
                if ($result > 0) {
                    echo "  <script>
                                alert('Cập nhật dữ liệu thành công');
                                window.location.href='kho.php';
                            </script>";
                }
                else {
                    echo "  <script>
                                alert('Lỗi Cập nhật dữ liệu ');
                                window.location.href='kho.php';
                            </script>";
                }
            }
        
    }
    ?>
</body>

</html>

        