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
            <a href="#" class="header__list-items" ><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php?ID=ID" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php?ID=ID" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items" id="main"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"><b>Cửa hàng</b></a>
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
                    <h1>Quản lý danh mục</h1>
                    <div class="tbl_hienthi">
                    <?php
                        include("../../../config/config.php");
                        //buoc 2 viet truy van
                        $query = "SELECT * FROM tbl_loaisanpham,tbl_danhmuccon 
                        WHERE tbl_danhmuccon.idloaisanpham=tbl_loaisanpham.idloaisanpham ORDER BY iddanhmuccon DESC";
                        //buoc 3 thuc thi cau lenh
                        $result = mysqli_query($conn, $query);
                        //buoc 4 lay du lieu
                        if(mysqli_num_rows($result) >0){
                            echo '<table id="tblMain">
                                    <thead>
                                        <th>ID danh mục con</th>
                                        <th>Tên danh mục con</th>
                                        <th>Tên danh mục cha</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>';
                            while ($row = mysqli_fetch_assoc($result)){
                                echo'<tr>
                                        <td>'.$row["iddanhmuccon"].'</td>
                                        <td>'.$row["tendanhmuccon"].'</td>
                                        <td>'.$row["tenloaisanpham"].'</td>
                                        <td><a class="thea" href="suadanhmuc.php?ID='.$row["iddanhmuccon"].'"><i class="ti-pencil-alt"></i></a></td>
                                        <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa danh mục không?\');" href="xoadanhmuc.php?ID='.$row["iddanhmuccon"].'"><i class="ti-trash"></i></a></td>
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
                            $query = "SELECT * FROM tbl_loaisanpham,tbl_danhmuccon 
                            WHERE tbl_danhmuccon.idloaisanpham=tbl_loaisanpham.idloaisanpham
                            AND tbl_danhmuccon.tendanhmuccon LIKE N'%".$keysearch."%' ORDER BY iddanhmuccon DESC";
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
                                echo '<table id="tblMain">
                                    <thead>
                                        <th>ID danh mục con</th>
                                        <th>Tên danh mục con</th>
                                        <th>Tên danh mục cha</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody>';
                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo'<tr>
                                                <td>'.$row["iddanhmuccon"].'</td>
                                                <td>'.$row["tendanhmuccon"].'</td>
                                                <td>'.$row["tenloaisanpham"].'</td>
                                                <td><a class="thea" href="suadanhmuc.php?ID='.$row["iddanhmuccon"].'"><i class="ti-pencil-alt"></i></a></td>
                                                <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa danh mục không?\');" href="xoadanhmuc.php?ID='.$row["iddanhmuccon"].'"><i class="ti-trash"></i></a></td>
                                            </tr>';
                                            }
                            
                                    echo'  </tbody>
                                        </table>';
                                    
                                }else{
                                    echo 'Không có dữ liệu danh mục';
                                }
                            }
                    ?>
                    </div>
                    </div>
                    <div class="createacc"><a href="themdanhmuc.php">Thêm danh mục con mới</a></div>
                </div>
            </div>
        </div>