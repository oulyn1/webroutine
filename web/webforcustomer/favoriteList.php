<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../asset/css/table.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
            <a href="../admin/main.php?ID=<?php echo $ID ?>" class="header__list-items" ><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php?ID=ID" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php?ID=ID" class="header__list-items"id="main"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
            </div>
            <div class="header__list2">
                <form method="POST">
                    <input type="text" name="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form>
                <a href="../logout.php" class="logout" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Quản lý tài khoản</h1>
            </div>
            
            <div class="createacc"><a href="createacc.php">Thêm tài khoản <i class="ti-user"></i></a></div>
        </div>
    </div>

    <?php
        include("../../config/config.php");
        $query="SELECT * FROM user";
        $result = mysqli_query($conn, $query);
        $num = 1;
            if (mysqli_num_rows($result) > 0) {
                echo '<table id="tblMain">
                    <thead>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Họ Và Tên</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Quyền Hạn</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </thead>
                    <tbody>';
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['Permission'] == 'Admin') {
                    echo '<tr>
                            <td>' . ($num++) . '</td>
                            <td>' . $row["Id_user"] . '</td>
                            <td>' . $row["Fullname"] . '</td>
                            <td>' . $row["Email"] . '</td>
                            <td>' . $row["Password"] . '</td>
                            <td>' . $row["Permission"] . '</td>
                            <td><td>
                        </tr>';}
                        else{
                            echo '<tr>
                            <td>' . ($num++) . '</td>
                            <td>' . $row["Id_user"] . '</td>
                            <td>' . $row["Fullname"] . '</td>
                            <td>' . $row["Email"] . '</td>
                            <td>' . $row["Password"] . '</td>
                            <td>' . $row["Permission"] . '</td>
                            <td><a class="thea" href="editacc.php?ID=' . $row["Id_user"] . '"><i class="ti-pencil-alt"></i></a></td>
                            <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa dữ liệu không?\');" href="deleteacc.php?ID=' . $row["Id_user"] . '"><i class="ti-trash"></i></a></td>
                        </tr>'; 
                        }
                }
                echo '</tbody>
                </table>';
            } else {
                echo "Khong co du lieu tai khoan";
            }
    ?>
</body>
</html>