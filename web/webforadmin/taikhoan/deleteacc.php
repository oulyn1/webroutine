<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa</title>
</head>
<body>
    <?php
    $ID = $_GET["ID"];
    include("../../../config/config.php");

    // Xóa thông tin khách hàng liên quan từ bảng khach_hang
    $deleteCustomerQuery = "DELETE FROM khach_hang WHERE id='".$ID."'";
    $resultDeleteCustomer = mysqli_query($conn, $deleteCustomerQuery);

    // Xóa người dùng từ bảng user
    $deleteUserQuery = "DELETE FROM user WHERE Id_user='".$ID."'";
    $resultDeleteUser = mysqli_query($conn, $deleteUserQuery);

    if ((  $resultDeleteUser && $resultDeleteCustomer)  >0) {
        echo "<script>
            alert('Xóa dữ liệu thành công');
            window.location.href='taikhoan.php';
        </script>";
    } else {
        echo "<script>
            alert('Lỗi xóa dữ liệu');
            window.location.href='taikhoan.php';
        </script>";
    }
    ?>
</body>
</html>
