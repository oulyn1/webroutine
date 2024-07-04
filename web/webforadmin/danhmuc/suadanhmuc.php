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
    <link rel="stylesheet" href="../../../asset/css/sanpham.css?v= <?php echo time(); ?>">
    <title>Sản Phẩm</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
            <a href="../admin/main.php?ID=<?php echo $ID ?>" class="header__list-items" ><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php?ID=ID" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php?ID=ID" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items" id="main"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"><b>Cửa hàng</b></a>
                <a href="../danhgia/danhgia.php" class="header__list-items"><b>Đánh giá</b></a>
            </div>
            <div class="header__list2">
                <!-- <form method="POST">
                    <input type="text" name="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form> -->
                <a href="../logout.php" class="logout" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-headersanpham">
                <?php
                include ("../../../config/config.php");
                $id = $_GET["ID"];
                $Name = "";
                $Loai = "";
                $query = "SELECT * FROM tbl_danhmuccon WHERE iddanhmuccon='" . $id . "'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $Name = $row["tendanhmuccon"];
                        $Loai = $row["idloaisanpham"];
                    }
                }
                ?>
                <h1>Sửa danh mục con</h1>
                <div class="tbl_them">
                    <form method="POST">
                        <table class="tlb-info">
                            <div class="user-info">
                                <tbody>
                                    <tr>
                                        <td class="info-name"><label for="Name">Tên danh mục con</label></td>
                                        <td><input type="text" class="info-name-property" id="Name" name="txtName"
                                                value="<?php echo $Name ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="Loai">Tên danh mục cha</label></td>
                                        <td>
                                            <select class="info-name-property" id="Loai" name="txtLoai">
                                                <?php
                                                $query_loai = "SELECT * FROM tbl_loaisanpham ORDER BY idloaisanpham DESC";
                                                $result_loai = mysqli_query($conn, $query_loai);
                                                while ($row_loai = mysqli_fetch_assoc($result_loai)) {
                                                    if ($row_loai['idloaisanpham'] == $Loai) {
                                                        ?>
                                                        <option value="<?php echo $row_loai["idloaisanpham"] ?>" selected>
                                                            <?php echo $row_loai["tenloaisanpham"] ?></option>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <option value="<?php echo $row_loai["idloaisanpham"] ?>">
                                                            <?php echo $row_loai["tenloaisanpham"] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
                        <div class="tlb-add"><input type="submit" value="Hoàn tất sửa sản phẩm" class="btn-add"
                                colspan="2" name="txtThem" /></div>
                    </form>
                    <?php
                    include ("../../../config/config.php");
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $Name = $_POST['txtName'];
                        $Loai = $_POST['txtLoai'];
                        if (!$conn) {
                            echo 'Kết nối không thành công' . mysqli_connect_error();
                        } else {
                            $sql = "UPDATE tbl_danhmuccon SET tendanhmuccon='" . $Name . "', idloaisanpham='" . $Loai . "'  WHERE iddanhmuccon='" . $id . "' ";
                            $result = mysqli_query($conn, $sql);
                            if ($result > 0) {
                                echo "  <script>
                                                alert('Cập nhật sản phẩm thành công');
                                                window.location.href='danhmuc.php';
                                            </script>";
                            } else {
                                echo "  <script>
                                                alert('Lỗi Cập nhật sản phẩm ');
                                                window.location.href='danhmuc.php';
                                            </script>";
                            }
                        }

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

