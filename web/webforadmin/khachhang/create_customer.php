<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../../asset/css/kho.css">
    <title>Tạo Khách Hàng</title>
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
                <a href="" class="header__list-items"><b>Slider</b></a>
            </div>
            <div class="header__list2">
                <form method="POST">
                    <input type="text" name="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form>
                <a href="" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Thêm Khách Hàng</h1>
            </div>
            <form method="POST">
                <table class="tlb-info">
                    <div class="user-info">
                        <tbody>
                            <tr>
                                <td class="info-name"><label for="id">ID</label></td>
                                <td><input type="text" class="info-name-property" id="id" name="id" required /></td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="ten">Tên</label></td>
                                <td><input type="text" class="info-name-property" id="ten" name="ten" required /></td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="email">Email</label></td>
                                <td><input type="email" class="info-name-property" id="email" name="email" required /></td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="so_dien_thoai">Số điện thoại</label></td>
                                <td><input type="text" class="info-name-property" id="so_dien_thoai" name="so_dien_thoai" /></td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="dia_chi">Địa chỉ</label></td>
                                <td><textarea class="info-name-property" id="dia_chi" name="dia_chi"></textarea></td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="ngay_tao">Ngày tạo</label></td>
                                <td><input type="date" class="info-name-property" id="ngay_tao" name="ngay_tao" required /></td>
                            </tr>
                        </tbody>
                </table>
                <div class="tlb-add"><input type="submit" value="Tạo khách hàng" class="btn-add" colspan="2" name="txtThem" /></div>
            </form>

        </div>
    </div>
    <?php
    include("../../../config/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $dia_chi = $_POST['dia_chi'];
        $ngay_tao = $_POST['ngay_tao'];

        if (!$conn) {
            echo 'Kết nối không thành công' . mysqli_connect_error();
        } else {
            $sql = "INSERT INTO khach_hang VALUES ('".$id."','".$ten."', '".$email."', '".$so_dien_thoai."', '".$dia_chi."', '".$ngay_tao."')";
            $result = mysqli_query($conn, $sql);
            if ($result > 0) {
                echo "  <script>
                                alert('Tạo khách hàng thành công');
                                window.location.href='khachhang.php';
                            </script>";
            } else {
                echo "  <script>
                                alert('Lỗi tạo khách hàng');
                                window.location.href='khachhang.php';
                            </script>";
            }
        }
    }
    ?>
</body>

</html>
