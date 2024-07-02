<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Cửa Hàng</title>
    <link rel="stylesheet" href="../../../asset/css/admin.css">
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
                <a href="#" class="header__list-items"><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php?ID=ID" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php?ID=ID" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"id="main"><b>Cửa hàng</b></a>
            </div>
            <div class="header__list2">
                <a href="#" class="logout"><b>Đăng xuất</b></a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Thêm Cửa Hàng</h1>
            </div>
            <form method="POST">
                <table class="tlb-info">
                    <tbody>
                        <tr>
                            <td class="info-name"><label for="ten">Tên cửa hàng:</label></td>
                            <td><input type="text" class="info-name-property" id="ten" name="ten" required></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="dia_chi">Địa chỉ:</label></td>
                            <td><input type="text" class="info-name-property" id="dia_chi" name="dia_chi" required></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="thanh_pho">Thành phố:</label></td>
                            <td><input type="text" class="info-name-property" id="thanh_pho" name="thanh_pho" required></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="hinhanh">Hình ảnh:</label></td>
                            <td><input type="file" class="info-name-property" id="hinhanh" name="hinhanh" required></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="sdt">Số điện thoại:</label></td>
                            <td><input type="text" class="info-name-property" id="sdt" name="sdt" required></td>
                        </tr>
                    </tbody>
                </table>
                <div class="tlb-add"><input type="submit" value="Thêm Cửa Hàng" class="btn-add" name="txtThem"></div>
            </form>
        </div>
    </div>
    <?php
    include("../../../config/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ten = $_POST['ten'];
        $dia_chi = $_POST['dia_chi'];
        $thanh_pho = $_POST['thanh_pho'];
        $hinhanh = $_POST['hinhanh'];
        $sdt = $_POST['sdt'];

        if (!$conn) {
            echo 'Kết nối không thành công' . mysqli_connect_error();
        }
        else {
            $query = "INSERT INTO cua_hang VALUES (' ' ,'".$ten."' , '".$dia_chi."' , '".$thanh_pho."','".$hinhanh."' ,'".$sdt."')";
            $result = mysqli_query($conn, $query);
            if ($result > 0) {
                echo "  <script>
                            alert('Thêm sản phẩm thành công');
                            window.location.href='cua_hang.php';
                        </script>";
            }
            else {
                echo "  <script>
                            alert('Lỗi thêm sản phẩm ');
                            window.location.href='cua_hang.php';
                        </script>";
            }
        }
    
}
    ?>
</body>
</html>
