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
                <div class="body-headersanpham">
                    <h1>Quản lý sản phẩm</h1>
                    <div class="tbl_hienthi">
                    <?php
                        include("../../../config/config.php");
                        //buoc 2 viet truy van
                        $query = "SELECT * FROM tbl_sanpham,tbl_loaisanpham WHERE tbl_sanpham.idloaisanpham=tbl_loaisanpham.idloaisanpham ORDER BY idsanpham DESC";
                        //buoc 3 thuc thi cau lenh
                        $result = mysqli_query($conn, $query);
                        //buoc 4 lay du lieu
                        if(mysqli_num_rows($result) >0){
                            echo '<table id="tblMain">
                                    <thead>
                                        <th>ID sản phẩm</th>
                                        <th>Hình ảnh sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Màu sản phẩm</th>
                                        <th>Size</th>
                                        <th>Mô tả sản phẩm</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>';
                            while ($row = mysqli_fetch_assoc($result)){
                                echo'<tr>
                                        <td>'.$row["idsanpham"].'</td>
                                        <td><img width=100px src="../../../asset/img/'.$row["hinhanhsanpham"].'" alt=""></td>
                                        <td>'.$row["tensanpham"].'</td>
                                        <td>'.$row["giasanpham"].'</td>
                                        <td>'.$row["color"].'</td>
                                        <td>'.$row["size"].'</td>
                                        <td>'.$row["motasanpham"].'</td>
                                        <td>'.$row["tenloaisanpham"].'</td>
                                        <td><a class="thea" href="suasanpham.php?ID='.$row["idsanpham"].'"><i class="ti-pencil-alt"></i></a></td>
                                        <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa sản phẩm không?\');" href="xoasanpham.php?ID='.$row["idsanpham"].'"><i class="ti-trash"></i></a></td>
                                    </tr>';
                                    }
                    
                            echo'  </tbody>
                                </table>';
                            
                        }else{
                            echo 'Không có dữ liệu sản phẩm';
                        }
                    ?>
                    </div>
                    <h2>Thêm sản phẩm mới</h2>
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
                                        <td><input type="text" class="info-name-property" id="GiaBan" name="txtGiaBan" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="Image">Hình ảnh</label></td>
                                        <td><input type="file" class="info-name-property" id="Image" name="txtImage" required /></td>
                                    </tr>
                                    <tr>
                                        <td class="info-name"><label for="MieuTa">Miêu tả</label></td>
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
                                </tbody>
                            </table>
                            <div class="tlb-add"><input type="submit" value="Thêm sản phẩm" class="btn-add" colspan="2" name="txtThem" /></div>
                        </form>
                        <?php
                        include("../../../config/config.php");
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $Name = $_POST['txtName'];
                            $Size = $_POST['txtSize'];
                            $Color = $_POST['txtColor'];
                            $GiaBan = $_POST['txtGiaBan'];
                            $Image = $_POST['txtImage'];
                            $MieuTa = $_POST['txtMieuTa'];
                            $Loai= $_POST['txtLoai'];
                            if (!$conn) {
                                echo 'Kết nối không thành công' . mysqli_connect_error();
                            }
                            else {
                                $sql = "INSERT INTO tbl_sanpham VALUES (' ' ,'".$Name."' , '".$GiaBan."' , '".$Image."','".$Color."','".$Size."','".$MieuTa."', '".$Loai."')";
                                $result = mysqli_query($conn, $sql);
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
        </div>