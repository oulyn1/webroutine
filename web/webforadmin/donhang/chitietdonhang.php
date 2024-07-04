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
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"id="main"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"><b>Cửa hàng</b></a>
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
                    <h1>Chi tiết đơn hàng</h1>
                    <div class="tbl_hienthi">
                    <?php
                        include("../../../config/config.php");
                        //buoc 2 viet truy van
                        $query = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham 
                        WHERE tbl_chitietdonhang.idsanpham=tbl_sanpham.idsanpham
                        AND tbl_chitietdonhang.madon='$_GET[CODE]' ORDER BY idctdh DESC";
                        //buoc 3 thuc thi cau lenh
                        $result = mysqli_query($conn, $query);
                        $tongtien= 0;
                        //buoc 4 lay du lieu
                        if(mysqli_num_rows($result) >0){
                            echo '<table id="tblMain">
                                    <thead>
                                        <th>ID</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>';
                            while ($row = mysqli_fetch_assoc($result)){
                                $thanhtien=$row["giasanpham"]*$row["soluongCT"];
                                $tongtien+= $thanhtien;
                                echo'<tr>
                                        <td>'.$row["idctdh"].'</td>
                                        <td>'.$row["madon"].'</td>
                                        <td>'.$row["tensanpham"].'</td>
                                        <td>'.$row["soluongCT"].'</td>
                                        <td>'.$row["giasanpham"].'</td>
                                        <td>'.$thanhtien.'</td>';
                                        $queryB = "SELECT * FROM tbl_donhang WHERE iddonhang='$_GET[CODE]'";
                                        $resultB = mysqli_query($conn, $queryB);
                                        if(mysqli_num_rows($resultB) >0){
                                            while ($rowB = mysqli_fetch_assoc($resultB)){
                                                if($rowB["tinhtrang"]==1){
                                                    echo'<td><a class="thea" href="suachitietdonhang.php?ID='.$row["idctdh"].'"><i class="ti-pencil-alt"></i></a></td>
                                                <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa danh mục không?\');" href="xoachitietdonhang.php?ID='.$row["idctdh"].'&CODE='.$row["madon"].'"><i class="ti-trash"></i></a></td>';
                                                }else{
                                                    echo'<td><i class="ti-na"></i></td>
                                                <td><i class="ti-na"></i></td>';
                                                }
                                            }
                                        }
                                echo'</tr>';
                                }
                                echo'<tr>
                                        <td colspan="8" style="text-align: center; font-weight: bold;">Tổng tiền: '.$tongtien.'</td>
                                    </tr>'; 
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
                            $query = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham 
                            WHERE tbl_chitietdonhang.idsanpham=tbl_sanpham.idsanpham
                            AND tbl_chitietdonhang.madon='$_GET[CODE]'
                            AND tbl_sanpham.tensanpham LIKE '%".$keysearch."%'";
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
                                        <th>ID</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </thead>
                                    <tbody>';
                                while ($row = mysqli_fetch_assoc($result)){
                                $thanhtien=$row["giasanpham"]*$row["soluongCT"];
                                $tongtien+= $thanhtien;
                                echo'<tr>
                                        <td>'.$row["idctdh"].'</td>
                                        <td>'.$row["madon"].'</td>
                                        <td>'.$row["tensanpham"].'</td>
                                        <td>'.$row["soluongCT"].'</td>
                                        <td>'.$row["giasanpham"].'</td>
                                        <td>'.$thanhtien.'</td>
                                    </tr>';
                                    }
                                echo'  </tbody>
                                    </table>';
                                }else{
                                    echo 'Không có dữ liệu hàng';
                                }
                            }
                    ?>
                </div>
            </div>
        </div>