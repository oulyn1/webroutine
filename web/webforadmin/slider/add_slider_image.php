

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/admin.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../../asset/css/slider.css?v=<?php echo time(); ?>">
    <title>Thêm Slider</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
                <a href="#" class="header__list-items?ID=ID" id="main"><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php?ID=ID" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php?ID=ID" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"><b>Cửa hàng</b></a>
            </div>
            <div class="header__list2">
                <a href="" class="logout">Đăng xuất</a>
            </div>
        </div>

        <div class="body">
            <div class="body-headersanpham">
                <h2>Thêm Slider mới</h2>
                <div class="tbl_them">
                    <form method="POST">
                        <table class="tlb-info">
                            <div class="user-info">
                                <tbody>
                                    <tr>
                                        <td class="info-name"><label for="image">Hình ảnh</label></td>
                                        <td><input type="file" class="info-name-property" id="image" name="image" required /></td>
                                    </tr>

                                </tbody>
                            </div>
                        </table>
                        <div class="tlb-add"><input type="submit" value="Thêm hình ảnh" class="btn-add" name="submit" /></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("../../../config/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $image= $_POST['image'];

        if (!$conn) {
            echo 'Kết nối không thành công' . mysqli_connect_error();
        }
        else {
            $query = "INSERT INTO slider_images(`image`) VALUES ('$image')";
            $result = mysqli_query($conn, $query);
            if ($result > 0) {
                echo "  <script>
                            alert('Thêm sản phẩm thành công');
                            window.location.href='slider.php';
                        </script>";
            }
            else {
                echo "  <script>
                            alert('Lỗi thêm sản phẩm ');
                            window.location.href='slider.php';
                        </script>";
            }
        }
    
}
    ?>
</body>
</html>
