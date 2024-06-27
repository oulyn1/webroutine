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
            <a href="../admin/main.php?ID=<?php echo $ID ?>" class="header__list-items"><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php?ID=ID" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php?ID=ID" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items" id="main"><b>Sản phẩm</b></a>
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
            </div>
            <div class="header__list2">
                <form method="POST">
                    <input type="text" name="txtTimkiem" id="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form>
                <a href="../logout.php" class="logout" class="logout">Đăng xuất</a>
            </div>
            </div>
            <div class="body">
                <div class="body-headersanpham">
                    <h1>Quản lý sản phẩm</h1>
                    <div class="tbl_hienthi">
                    <?php
                        include("../../../config/config.php");
                        //buoc 2 viet truy van
                        $query = "SELECT * FROM tbl_sanpham,tbl_loaisanpham,tbl_danhmuccon WHERE tbl_sanpham.idloaisanpham=tbl_loaisanpham.idloaisanpham AND tbl_sanpham.iddanhmuccon=tbl_danhmuccon.iddanhmuccon ORDER BY idsanpham DESC";
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
                                        <th>Chi tiết loại sản phẩm</th>
                                        <th>Số lượng</th>
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
                                        <td>'.$row["tendanhmuccon"].'</td>
                                        <td>'.$row["soluong"].'</td>
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
                    <?php
                        if($_SERVER['REQUEST_METHOD'] == "POST"){
                            $keysearch=$_POST['txtTimkiem'];
                            include("../../../config/config.php");
                            //buoc 2 viet truy van
                            $query = "SELECT * FROM tbl_sanpham,tbl_loaisanpham,tbl_danhmuccon 
                            WHERE tbl_sanpham.idloaisanpham=tbl_loaisanpham.idloaisanpham 
                            AND tbl_sanpham.iddanhmuccon=tbl_danhmuccon.iddanhmuccon 
                            AND tbl_sanpham.tensanpham LIKE N'%".$keysearch."%' 
                            ORDER BY idsanpham DESC";
                            //buoc 3 thuc thi cau lenh
                            $result = mysqli_query($conn, $query);
                            echo '
                                    <script type="text/javascript">
                                        var table = document.getElementById("tblMain");
                                        table.style.display ="none";
                                    </script>
                                    ';
                            //buoc 4 lay du lieu
                            if(mysqli_num_rows($result) >0){
                                echo '<table>
                                        <thead>
                                            <th>ID sản phẩm</th>
                                            <th>Hình ảnh sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Màu sản phẩm</th>
                                            <th>Size</th>
                                            <th>Mô tả sản phẩm</th>
                                            <th>Loại sản phẩm</th>
                                            <th>Chi tiết loại sản phẩm</th>
                                            <th>Số lượng</th>
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
                                            <td>'.$row["tendanhmuccon"].'</td>
                                            <td>'.$row["soluong"].'</td>
                                            <td><a class="thea" href="suasanpham.php?ID='.$row["idsanpham"].'"><i class="ti-pencil-alt"></i></a></td>
                                            <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa sản phẩm không?\');" href="xoasanpham.php?ID='.$row["idsanpham"].'"><i class="ti-trash"></i></a></td>
                                        </tr>';
                                        }
                        
                                echo'  </tbody>
                                    </table>
                                    ';
                                
                            }else{
                                echo 'Không tìm thấy dữ liệu sản phẩm <a href="sanpham.php" style="color: red;">Quay lại</a>';
                            }
                        }
                    ?>
                    </div>
                    </div>
                    <div class="createacc"><a href="themsanpham.php">Thêm sản phẩm mới</a></div>
                </div>
            </div>
        </div>