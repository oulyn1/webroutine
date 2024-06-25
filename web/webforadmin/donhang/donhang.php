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
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
            </div>
            <div class="header__list2">
                <form method="POST">
                    <input type="text" name="txtTimkiem" id="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form>
                <a href="" class="logout" class="logout">Đăng xuất</a>
            </div>
            </div>
            <div class="body">
                <div class="body-headersanpham">
                    <h1>Quản lý đơn hàng</h1>
                    <div class="tbl_hienthi">
                    <?php
                        include("../../../config/config.php");
                        //buoc 2 viet truy van
                        $query = "SELECT * FROM donhang,user 
                        WHERE user.id_user=donhang.iduser ORDER BY iddonhang DESC";
                        //buoc 3 thuc thi cau lenh
                        $result = mysqli_query($conn, $query);
                        //buoc 4 lay du lieu
                        if(mysqli_num_rows($result) >0){
                            echo '<table id="tblMain">
                                    <thead>
                                        <th>ID đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Ngày lập đơn</th>
                                        <th>Địa chỉ</th>
                                        <th>Tổng tiền</th>
                                        <th>Tình trạng</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>';
                            while ($row = mysqli_fetch_assoc($result)){
                                echo'<tr>
                                        <td>'.$row["iddonhang"].'</td>
                                        <td>'.$row["fullname"].'</td>
                                        <td>'.$row["ngaylapdon"].'</td>
                                        <td>'.$row["address"].'</td>
                                        <td>'.$row["tongtien"].'</td>
                                        <td>'.$row["tinhtrang"].'</td>
                                        <td><a class="thea" href="suadanhmuc.php?ID='.$row["iddonhang"].'"><i class="ti-pencil-alt"></i></a></td>
                                        <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa danh mục không?\');" href="xoadanhmuc.php?ID='.$row["iddanhmuccon"].'"><i class="ti-trash"></i></a></td>
                                    </tr>';
                                    }
                    
                            echo'  </tbody>
                                </table>';
                            
                        }else{
                            echo 'Không có dữ liệu sản phẩm';
                        }
                    ?>
                </div>
            </div>
        </div>