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
            $ID = $_GET['ID'];
            $MaSP = "";
            $Name = "";
            $MaKho = "";
            $Size = "";
            $Color = "";
            $GiaBan = "";
            $SoLuong = "";
            $Image = "";
            $NgayNhap = "";
            if (!$conn){
                echo 'kết nối không thành công' . mysqli_connect_error();
            }
            else{
                $sql = "SELECT * FROM kho WHERE ID='".$ID."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $MaSP = $row["MaSP"];
                        $Name = $row["Name"];
                        $MaKho = $row["MaKho"];
                        $Size = $row["Size"];
                        $Color = $row["Color"];
                        $GiaBan = $row["GiaBan"];
                        $SoLuong = $row["SoLuong"];
                        $Image = $row["Image"];
                        $NgayNhap = $row["NgayNhap"];
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
                            <td><input type="text" class="info-name-property" id="MaSP" name="txtMaSP" value="<?php echo $MaSP; ?>" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="Name">Tên sản phẩm</label></td>
                            <td><input type="text" class="info-name-property" id="Name" name="txtName" value="<?php echo $Name; ?>" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="MaKho">Mã kho</label></td>
                            <td><input type="text" class="info-name-property" id="MaKho" name="txtMaKho" value="<?php echo $MaKho; ?>" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="Size">Size</label></td>
                            <td>
                                <select class="info-name-property" id="Size" name="txtSize" required>
                                    <option value="S" <?php if($Size == "S") echo "selected"; ?>>S</option>
                                    <option value="M" <?php if($Size == "M") echo "selected"; ?>>M</option>
                                    <option value="L" <?php if($Size == "L") echo "selected"; ?>>L</option>
                                    <option value="XL" <?php if($Size == "XL") echo "selected"; ?>>XL</option>
                                    <option value="XXL" <?php if($Size == "XXL") echo "selected"; ?>>XXL</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="Color">Color</label></td>
                            <td><input type="text" class="info-name-property" id="Color" name="txtColor" value="<?php echo $Color; ?>" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="GiaBan">Giá bán</label></td>
                            <td><input type="text" class="info-name-property" id="GiaBan" name="txtGiaBan" value="<?php echo $GiaBan; ?>" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="SoLuong">Số lượng</label></td>
                            <td><input type="text" class="info-name-property" id="SoLuong" name="txtSoLuong" value="<?php echo $SoLuong; ?>" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="Image">Hình ảnh</label></td>
                            <td>
                                <input type="file" class="info-name-property" id="Image" name="txtImage" />
                                <img src="<?php echo $Image; ?>" alt="Product Image" style="width:100px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="NgayNhap">Ngày nhập</label></td>
                            <td><input type="date" class="info-name-property" id="NgayNhap" name="txtNgayNhap" value="<?php echo $NgayNhap; ?>" required /></td>
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
        $MaSP = $_POST['txtMaSP'];
        $Name = $_POST['txtName'];
        $MaKho = $_POST['txtMaKho'];
        $Size = $_POST['txtSize'];
        $Color = $_POST['txtColor'];
        $GiaBan = $_POST['txtGiaBan'];
        $SoLuong = $_POST['txtSoLuong'];
        $Image = $_FILES['txtImage']['name'];
        $NgayNhap = $_POST['txtNgayNhap'];

        // Nếu người dùng không thay đổi hình ảnh, giữ nguyên hình ảnh cũ
        if ($Image == "") {
            $Image = $oldImage;
        } else {
            // Thư mục lưu trữ hình ảnh
            $target_dir = "../../../uploads/";
            $target_file = $target_dir . basename($Image);
            move_uploaded_file($_FILES['txtImage']['tmp_name'], $target_file);
        }

        $sql = "UPDATE kho SET MaSP='$MaSP',Name='$Name',MaKho='$MaKho', Size='$Size', Color='$Color', GiaBan='$GiaBan', SoLuong='$SoLuong', Image='$target_file', NgayNhap='$NgayNhap' WHERE ID='$ID'";
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