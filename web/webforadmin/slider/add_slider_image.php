<?php
include("../../../config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $target_dir = "../../../asset/img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = "asset/img/" . basename($_FILES["image"]["name"]);
            $query = "INSERT INTO slider_images (image_path) VALUES ('$image_path')";
            if (mysqli_query($conn, $query)) {
                header("Location: slider.php?success=1");
            } else {
                header("Location: slider.php?error=1");
            }
        } else {
            header("Location: slider.php?error=1");
        }
    } else {
        header("Location: slider.php?error=1");
    }
}
?>

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
            </div>
            <div class="header__list2">
                <a href="" class="logout">Đăng xuất</a>
            </div>
        </div>

        <div class="body">
            <div class="body-headersanpham">
                <h2>Thêm Slider mới</h2>
                <div class="tbl_them">
                    <form method="POST" enctype="multipart/form-data">
                        <table class="tlb-info">
                            <div class="user-info">
                                <tbody>
                                    <tr>
                                        <td class="info-name"><label for="Image">Hình ảnh</label></td>
                                        <td><input type="file" class="info-name-property" id="Image" name="image" required /></td>
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
</body>
</html>
