<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../../asset/css/table.css">
    <title>Quản Lý Slider</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
                <a href="#" class="header__list-items" id="main"><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php?ID=ID" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php?ID=ID" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"><b>Cửa hàng</b></a>
            </div>
            <div class="header__list2">
                <form method="POST">
                    <input type="text" name="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form>
                <a href="" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Quản lý Slider</h1>
                
            </div>
            <div class="tbl_hienthi">
                <?php
                include("../../../config/config.php");

                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $keysearch = $_POST['txtTimkiem'];
                    $query = "SELECT * FROM slider_images WHERE image_path LIKE '%" . $keysearch . "%'";
                } else {
                    $query = "SELECT * FROM slider_images";
                }

                $result = mysqli_query($conn, $query);
                $num = 1;

                if (mysqli_num_rows($result) > 0) {
                    echo '<table id="tblMain">
                        <thead>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Đường dẫn</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </thead>
                        <tbody>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                                <td>' . ($num++) . '</td>
                                <td><img width=100px src="../../../asset/img/' . $row["image_path"] . '" alt="Slider Image" width="100"></td>
                                <td>' . $row["image_path"] . '</td>
                                <td><a class="thea" href="edit_slider_image.php?ID=' . $row["id"] . '"><i class="ti-pencil-alt"></i></a></td>
                                <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa hình ảnh này không?\');" href="delete_slider_image.php?id=' . $row["id"] . '"><i class="ti-trash"></i></a></td>
                            </tr>';
                    }
                    echo '</tbody>
                    </table>';
                } else {
                    echo 'Không có hình ảnh nào';
                }
                ?>
            </div>
            <div class="createacc"><a href="add_slider_image.php">Thêm hình ảnh mới</a></div>
        </div>
    </div>
</body>
</html>
