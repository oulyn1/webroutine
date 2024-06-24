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
                <!-- <form method="POST">
                    <input type="text" name="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form> -->
                <a href="" class="logout" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-headersanpham">
                <?php
                include ("../../../config/config.php");
                $id = $_GET["ID"];
                $Name = "";
                $Size = "";
                $Color = "";
                $GiaBan = "";
                $Image = "";
                $MieuTa = "";
                $Loai = "";
                $LoaiCT= "";
                $SoLuong= "";
                $query = "SELECT * FROM tbl_sanpham WHERE idsanpham='" . $id . "'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $Name = $row["tensanpham"];
                        $Size = $row["size"];
                        $Color = $row["color"];
                        $GiaBan = $row["giasanpham"];
                        $Image = $row["hinhanhsanpham"];
                        $MieuTa = $row["motasanpham"];
                        $Loai = $row["idloaisanpham"];
                        $LoaiCT= $row["iddanhmuccon"];
                        $SoLuong = $row["soluong"];
                    }
                }
                ?>
                <h2>Sửa sản phẩm</h2>
                <div class="tbl_them">
                    <form method="POST">
                        <table class="tlb-info">
                            <div class="user-info">
                                <tbody>
                                    <tr>
                                        <td class="info-name"><label for="Name">Tên sản phẩm</label></td>
                                        <td><input type="text" class="info-name-property" id="Name" name="txtName"
                                                value="<?php echo $Name ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="Size">Size</label></td>
                                        <td>
                                            <?php
                                            if ($Size == "S") {
                                                echo '<select class="info-name-property" id="Size" name="txtSize" required>
                                                        <option value="S" selected>S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL">XL</option>
                                                        <option value="XXL">XXL</option>
                                                    </select>';
                                            } else if ($Size == "M") {
                                                echo '<select class="info-name-property" id="Size" name="txtSize" required>
                                                        <option value="S" >S</option>
                                                        <option value="M" selected>M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL">XL</option>
                                                        <option value="XXL">XXL</option>
                                                    </select>';
                                            } else if ($Size == "L") {
                                                echo '<select class="info-name-property" id="Size" name="txtSize" required>
                                                        <option value="S" >S</option>
                                                        <option value="M">M</option>
                                                        <option value="L" selected>L</option>
                                                        <option value="XL">XL</option>
                                                        <option value="XXL">XXL</option>
                                                    </select>';
                                            } else if ($Size == "XL") {
                                                echo '<select class="info-name-property" id="Size" name="txtSize" required>
                                                        <option value="S" >S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL" selected>XL</option>
                                                        <option value="XXL">XXL</option>
                                                    </select>';
                                            } else if ($Size == "XXL") {
                                                echo '<select class="info-name-property" id="Size" name="txtSize" required>
                                                        <option value="S" >S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL">XL</option>
                                                        <option value="XXL" selected>XXL</option>
                                                    </select>';
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="Color">Color</label></td>
                                        <td><input type="text" class="info-name-property" id="Color" name="txtColor"
                                                value="<?php echo $Color ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="GiaBan">Giá bán</label></td>
                                        <td><input type="number" class="info-name-property" id="GiaBan" name="txtGiaBan"
                                                value="<?php echo $GiaBan ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="Image">Hình ảnh</label></td>
                                        <td><input type="file" class="info-name-property" id="Image" name="txtImage"
                                                value="<?php echo $Image ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="MieuTa">Miêu tả</label></td>
                                        <td><input type="text" class="info-name-property" id="MieuTa" name="txtMieuTa"
                                                value="<?php echo $MieuTa ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="Loai">Loại sản phẩm</label></td>
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
                                    <tr>
                                        <td class="info-name"><label for="LoaiCT">Chi tiết loại sản phẩm</label></td>
                                        <td>
                                            <select class="info-name-property" id="LoaiCT" name="txtLoaiCT">
                                                <?php
                                                $query_loai = "SELECT * FROM tbl_danhmuccon ORDER BY iddanhmuccon DESC";
                                                $result_loai = mysqli_query($conn, $query_loai);
                                                while ($row_loai = mysqli_fetch_assoc($result_loai)) {
                                                    if ($row_loai['iddanhmuccon'] == $LoaiCT) {
                                                        ?>
                                                        <option value="<?php echo $row_loai["iddanhmuccon"] ?>" selected>
                                                            <?php echo $row_loai["tendanhmuccon"] ?></option>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <option value="<?php echo $row_loai["iddanhmuccon"] ?>">
                                                            <?php echo $row_loai["tendanhmuccon"] ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="SoLuong">Số lượng</label></td>
                                        <td><input type="number" class="info-name-property" id="SoLuong" name="txtSoLuong"
                                                value="<?php echo $SoLuong ?>" required /></td>
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
                        $Size = $_POST['txtSize'];
                        $Color = $_POST['txtColor'];
                        $GiaBan = $_POST['txtGiaBan'];
                        $Image = $_POST['txtImage'];
                        $MieuTa = $_POST['txtMieuTa'];
                        $Loai = $_POST['txtLoai'];
                        $LoaiCT = $_POST['txtLoaiCT'];
                        $SoLuong = $_POST['txtSoLuong'];
                        if (!$conn) {
                            echo 'Kết nối không thành công' . mysqli_connect_error();
                        } else {
                            $sql = "UPDATE tbl_sanpham SET tensanpham='" . $Name . "', giasanpham='" . $GiaBan . "', hinhanhsanpham='" . $Image . "', color='" . $Color . "', size='" . $Size . "', motasanpham='" . $MieuTa . "', idloaisanpham='" . $Loai . "', iddanhmuccon='" . $LoaiCT . "', soluong='" . $SoLuong . "'  WHERE idsanpham='" . $id . "' ";
                            $result = mysqli_query($conn, $sql);
                            if ($result > 0) {
                                echo "  <script>
                                                alert('Cập nhật sản phẩm thành công');
                                                window.location.href='sanpham.php';
                                            </script>";
                            } else {
                                echo "  <script>
                                                alert('Lỗi Cập nhật sản phẩm ');
                                                window.location.href='sanpham.php';
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

