<?php
include("../../../config/config.php");

// Kiểm tra xem ID của cửa hàng đã được truyền vào từ URL chưa
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    
    // Truy vấn lấy thông tin của cửa hàng dựa trên ID
    $query = "SELECT * FROM cua_hang WHERE idcuahang = $id";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $ten = $row['ten'];
        $dia_chi = $row['dia_chi'];
        $thanh_pho = $row['thanh_pho'];
        $hinhanh = $row['hinhanh'];
        $sdt = $row['sdt'];
    } else {
        echo "Không tìm thấy cửa hàng.";
        exit();
    }
} else {
    echo "ID cửa hàng không được cung cấp.";
    exit();
}

// Xử lý khi người dùng submit form sửa thông tin cửa hàng
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_moi = $_POST['ten'];
    $dia_chi_moi = $_POST['dia_chi'];
    $thanh_pho_moi = $_POST['thanh_pho'];
    $hinhanh = $_POST['hinhanh'];
    $sdt = $_POST['sdt'];

    // Cập nhật thông tin cửa hàng trong database
    $query_update = "UPDATE cua_hang SET 
                        ten = '$ten_moi', 
                        dia_chi = '$dia_chi_moi', 
                        thanh_pho = '$thanh_pho_moi', 
                        hinhanh = '$hinhanh',
                        sdt = '$sdt' 
                    WHERE idcuahang = $id";

    if (mysqli_query($conn, $query_update)) {
        echo "<script>
                alert('Cập nhật thông tin cửa hàng thành công');
                window.location.href='cua_hang.php';
            </script>";
    } else {
        echo "<script>
                alert('Lỗi: Không thể cập nhật thông tin cửa hàng');
                window.location.href='cua_hang.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Cửa Hàng</title>
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
                <h1>Sửa Cửa Hàng</h1>
            </div>
            <form method="POST">
                <table class="tlb-info">
                    <tbody>
                        <tr>
                            <td class="info-name"><label for="ten">Tên cửa hàng:</label></td>
                            <td><input type="text" class="info-name-property" id="ten" name="ten" value="<?php echo $ten; ?>" required></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="dia_chi">Địa chỉ:</label></td>
                            <td><input type="text" class="info-name-property" id="dia_chi" name="dia_chi" value="<?php echo $dia_chi; ?>" required></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="thanh_pho">Thành phố:</label></td>
                            <td><input type="text" class="info-name-property" id="thanh_pho" name="thanh_pho" value="<?php echo $thanh_pho; ?>" required></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="thanh_pho">Hình ảnh:</label></td>
                            <td><input type="file" class="info-name-property" id="hinhanh" name="hinhanh" value="<?php echo $hinhanh; ?>" required></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="mo_ta">Số điện thoại:</label></td>
                            <td><input type="text" class="info-name-property" id="sdt" name="sdt" value="<?php echo $sdt; ?>" required></td>
                        </tr>
                    </tbody>
                </table>
                <div class="tlb-add"><input type="submit" value="Lưu Thay Đổi" class="btn-add"></div>
            </form>
        </div>
    </div>
</body>
</html>
