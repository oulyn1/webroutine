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
    $deleteCustomerQuery = "DELETE FROM khach_hang WHERE id='".$ID."'";
    $resultDeleteCustomer = mysqli_query($conn, $deleteCustomerQuery);

    if ($resultDeleteCustomer  >0) {
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
