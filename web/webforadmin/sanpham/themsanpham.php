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
    <link rel="stylesheet" href="../../../asset/css/admin.css?v= <?php echo time(); ?>" />
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
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items"id="main"><b>Sản phẩm</b></a>
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"><b>Cửa hàng</b></a>
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
            <h2>Thêm sản phẩm mới</h2>
            <?php
            include("../../../config/config.php");
            ?>
                    <div class="tbl_them">
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
                                        <td><input type="number" class="info-name-property" id="GiaBan" name="txtGiaBan" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="Image">Hình ảnh</label></td>
                                        <td><input type="file" class="info-name-property" id="Image" name="txtImage" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="MieuTa">Mô tả</label></td>
                                        <td><input type="text" class="info-name-property" id="MieuTa" name="txtMieuTa" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="Loai">Loại sản phẩm</label></td>
                                        <td>
                                            <select class="info-name-property" id="Loai" name="txtLoai" required>
                                                <?php
                                                    $query_loai= "SELECT * FROM tbl_loaisanpham ORDER BY idloaisanpham DESC";
                                                    $result_loai= mysqli_query($conn, $query_loai);
                                                    while ($row_loai = mysqli_fetch_assoc($result_loai)){
                                                ?>
                                                <option value="<?php echo $row_loai["idloaisanpham"] ?>"><?php echo $row_loai["tenloaisanpham"]?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="LoaiCT">Chi tiết loại sản phẩm</label></td>
                                        <td>
                                            <select class="info-name-property" id="LoaiCT" name="txtLoaiCT" required>
                                                <?php
                                                    $query_loai= "SELECT * FROM tbl_danhmuccon ORDER BY iddanhmuccon DESC";
                                                    $result_loai= mysqli_query($conn, $query_loai);
                                                    while ($row_loai = mysqli_fetch_assoc($result_loai)){
                                                ?>
                                                <option value="<?php echo $row_loai["iddanhmuccon"] ?>"><?php echo $row_loai["tendanhmuccon"]?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="SoLuong">Số Lượng</label></td>
                                        <td><input type="number" class="info-name-property" id="SoLuong" name="txtSoLuong" required /></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="tlb-add"><input type="submit" value="Thêm sản phẩm" class="btn-add"  name="txtThem" /></div>
                        </form>
                </div>
                <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $Name = $_POST['txtName'];
                            $Size = $_POST['txtSize'];
                            $Color = $_POST['txtColor'];
                            $GiaBan = $_POST['txtGiaBan'];
                            $Image = $_POST['txtImage'];
                            $MieuTa = $_POST['txtMieuTa'];
                            $Loai= $_POST['txtLoai'];
                            $LoaiCT= $_POST['txtLoaiCT'];
                            $SoLuong= $_POST['txtSoLuong'];
                            if (!$conn) {
                                echo 'Kết nối không thành công' . mysqli_connect_error();
                            }
                            else {
                                $query = "INSERT INTO tbl_sanpham VALUES (' ' ,'".$Name."' , '".$GiaBan."' , '".$Image."','".$Color."','".$Size."','".$MieuTa."', '".$Loai."', '".$LoaiCT."', '".$SoLuong."')";
                                $result = mysqli_query($conn, $query);
                                if ($result > 0) {
                                    echo "  <script>
                                                alert('Thêm sản phẩm thành công');
                                                window.location.href='sanpham.php';
                                            </script>";
                                }
                                else {
                                    echo "  <script>
                                                alert('Lỗi thêm sản phẩm ');
                                                window.location.href='sanpham.php';
                                            </script>";
                                }
                            }
                        
                    }
                    ?>
            </div>
        </div>
    </div>
</body>
</html>

