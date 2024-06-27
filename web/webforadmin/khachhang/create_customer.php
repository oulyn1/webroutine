<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../../asset/css/kho.css">
    <title>Tạo Khách Hàng</title>
    <script>
        function laydulieu() {
            var userSelect = document.getElementById("userSelect");
            var selectedUser = userSelect.options[userSelect.selectedIndex].dataset;
            document.getElementById("id").value = selectedUser.id;
            document.getElementById("ten").value = selectedUser.name;
            document.getElementById("email").value = selectedUser.email;
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
            <a href="#" class="header__list-items" ><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php?ID=ID" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php?ID=ID" class="header__list-items"id="main"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="#" class="header__list-items"><b>Danh mục Sản phẩm</b></a>
                <a href="#" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="#" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"><b>Cửa hàng</b></a>
            </div>
            <div class="header__list2">
                <form method="POST">
                    <input type="text" name="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form>
                <a href="#" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Thêm Khách Hàng</h1>
            </div>
            <form method="POST">
                <table class="tlb-info">
                    <tbody>
                        <tr>
                            <td class="info-name"><label for="userSelect">Chọn tài khoản</label></td>
                            <td>
                                <select id="userSelect" onchange="laydulieu()">
                                    <option value="">Chọn tài khoản</option>
                                    <?php
                                    include("../../../config/config.php");
                                    $query = "SELECT Id_user, Fullname, Email FROM user";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option data-id="' . $row["Id_user"] . '" data-name="' . $row["Fullname"] . '" data-email="' . $row["Email"] . '">' . $row["Fullname"] . ' (' . $row["Email"] . ')</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="id">ID</label></td>
                            <td><input type="text" class="info-name-property" id="id" name="id" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="ten">Tên</label></td>
                            <td><input type="text" class="info-name-property" id="ten" name="ten" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="email">Email</label></td>
                            <td><input type="email" class="info-name-property" id="email" name="email" required /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="so_dien_thoai">Số điện thoại</label></td>
                            <td><input type="text" class="info-name-property" id="so_dien_thoai" name="so_dien_thoai" /></td>
                        </tr>
                        <tr>
                            <td class="info-name"><label for="dia_chi">Địa chỉ</label></td>
                            <td><textarea class="info-name-property" id="dia_chi" name="dia_chi"></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <div class="tlb-add"><input type="submit" value="Tạo khách hàng" class="btn-add" name="txtThem" /></div>
            </form>
        </div>
    </div>
    <?php
    include("../../../config/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $dia_chi = $_POST['dia_chi'];

        if (!$conn) {
            echo 'Kết nối không thành công: ' . mysqli_connect_error();
        } else {
            $sql = "INSERT INTO khach_hang (id, ten, email, so_dien_thoai, dia_chi,) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param($id, $ten, $email, $so_dien_thoai, $dia_chi);

            if ($stmt->execute()) {
                echo "<script>
                          alert('Tạo khách hàng thành công');
                          window.location.href='khachhang.php';
                      </script>";
            } else {
                echo "<script>
                          alert('Lỗi tạo khách hàng');
                          window.location.href='khachhang.php';
                      </script>";
            }

            $stmt->close();
        }

        $conn->close();
    }
    ?>
</body>

</html>
