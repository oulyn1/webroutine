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
                            <td class="info-name"><label for="Name">Tên sản phẩm</label></td>
                            <td><input type="text" class="info-name-property" id="Name" name="txtName" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="Size">Size</label></td>
                            <td>
                                <select class="info-name-property" id="Size" name="txtSize" required>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="Color">Color</label></td>
                            <td><input type="text" class="info-name-property" id="Color" name="txtColor" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="GiaBan">Giá bán</label></td>
                            <td><input type="text" class="info-name-property" id="GiaBan" name="txtGiaBan" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="SoLuong">Số lượng</label></td>
                            <td><input type="text" class="info-name-property" id="SoLuong" name="txtSoLuong" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="Image">Hình ảnh</label></td>
                            <td><input type="file" class="info-name-property" id="Image" name="txtImage" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="MieuTa">Miêu tả</label></td>
                            <td><input type="text" class="info-name-property" id="MieuTa" name="txtMieuTa" required /></td>
                        </tr>
                    </tbody>
                </table>
                <div class="tlb-add"><input type="submit" value="Thêm sản phẩm" class="btn-add" colspan="2" name="txtThem" /></div>
            </form>

        </div>
    </div>
    <?
        include("../../../config/config.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Name = $_POST['txtName'];
            $SiZe = $_POST['txtSize'];
            $Color = $_POST['txtColor'];
            $GiaBan = $_POST['txtGiaBan'];
            $SoLuong = $_POST['txtSoLuong'];
            $Image = $_POST['txtImage'];
            $MieuTa = $_POST['txtMieuTa'];
            if (!$conn) {
                echo 'Kết nối không thành công' . mysqli_connect_error();
            }
            else {
                $sql = "INSERT INTO kho VALUES ('".$Name."' , '".$SiZe."' , '".$Color."','".$GiaBan."','".$SoLuong."','".$Image."','".$MieuTa."')";
                $result = mysqli_query($conn, $sql);
                $result = mysqli_query($conn, $query);
                if ($result > 0) {
                    echo "Ghi dữ liệu thành công";
                }
                else {
                    echo "Lỗi ghi dữ liệu";
                }
            }
        
    }
    ?>
</body>
</html>

        