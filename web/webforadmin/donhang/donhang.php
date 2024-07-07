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
                <a href="../danhgia/danhgia.php" class="header__list-items"><b>Đánh giá</b></a>
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
                    <h1>Quản lý đơn hàng</h1>
                    <div class="tbl_hienthi">
                    <?php
                        include("../../../config/config.php");
                        //buoc 2 viet truy van
                        $query = "SELECT * FROM tbl_donhang,user,khach_hang 
                        WHERE user.id_user=tbl_donhang.iduser
                        AND khach_hang.id=tbl_donhang.iduser
                        ORDER BY tbl_donhang.ngaydat DESC";
                        //buoc 3 thuc thi cau lenh
                        $result = mysqli_query($conn, $query);
                        //buoc 4 lay du lieu
                        if(mysqli_num_rows($result) >0){
                            echo '<table id="tblMain">
                                    <thead>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt</th>
                                        <th>Tình trạng</th>
                                        <th>Hủy đơn</th>
                                        <th>Quản lý</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>';
                            while ($row = mysqli_fetch_assoc($result)){
                                echo'<tr>
                                        <td>'.$row["iddonhang"].'</td>
                                        <td>'.$row["Fullname"].'</td>
                                        <td>'.$row["so_dien_thoai"].'</td>
                                        <td>'.$row["dia_chi"].'</td>
                                        <td>'.$row["ngaydat"].'</td>';
                                if($row["tinhtrang"]==1){
                                    $status="Đơn hàng mới";
                                    echo'<td><a class="thea" href="capnhatdon.php?CODE='.$row["iddonhang"].'">'.$status.'</a></td>
                                    <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa sản phẩm không?\');" href="huydonhang.php?ID='.$row["iddonhang"].'">Hủy</a></td>';
                                }else{
                                    $status="Đã xử lý";
                                    echo'<td>'.$status.'</td>
                                    <td style="text-decoration-line: line-through;">Hủy đơn</td>';
                                }
                                echo'
                                        <td><a class="thea" href="chitietdonhang.php?CODE='.$row["iddonhang"].'">Xem đơn hàng</a></td>
                                        <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa đơn hàng không?\');" href="xoadonhang.php?ID='.$row["iddonhang"].'"><i class="ti-trash"></i></a></td>
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
                            $query = "SELECT * FROM tbl_donhang,user,khach_hang 
                            WHERE user.id_user=tbl_donhang.iduser
                            AND khach_hang.id=tbl_donhang.iduser
                            AND (tbl_donhang.iddonhang LIKE '%".$keysearch."%' OR user.Fullname LIKE '%".$keysearch."%' OR khach_hang.so_dien_thoai LIKE '%".$keysearch."%')";
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
                                        <th>Mã đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt</th>
                                        <th>Tình trạng</th>
                                        <th>Hủy đơn</th>
                                        <th>Quản lý</th>
                                    </thead>
                                    <tbody>';
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo'<tr>
                                            <td>'.$row["iddonhang"].'</td>
                                            <td>'.$row["Fullname"].'</td>
                                            <td>'.$row["so_dien_thoai"].'</td>
                                            <td>'.$row["dia_chi"].'</td>
                                            <td>'.$row["ngaydat"].'</td>';
                                    if($row["tinhtrang"]==1){
                                        $status="Đơn hàng mới";
                                        echo'<td><a class="thea" href="capnhatdon.php?CODE='.$row["iddonhang"].'">'.$status.'</a></td>
                                        <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa sản phẩm không?\');" href="huydonhang.php?ID='.$row["iddonhang"].'">Hủy</a></td>';
                                    }else{
                                        $status="Đã xử lý";
                                        echo'<td>'.$status.'</td>
                                        <td style="text-decoration-line: line-through;">Hủy đơn</td>';
                                    }
                                    echo'
                                            <td><a class="thea" href="chitietdonhang.php?CODE='.$row["iddonhang"].'">Xem đơn hàng</a></td>
                                        </tr>';
                                        }
                        
                                echo'  </tbody>
                                    </table>';
                                    
                                }else{
                                    echo 'Không có dữ liệu đơn hàng';
                                }
                            }
                    ?>
                </div>
            </div>
        </div>