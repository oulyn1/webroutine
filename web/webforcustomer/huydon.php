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
    include("../../config/config.php");
    $delete = "DELETE FROM tbl_donhang WHERE iddonhang='".$ID."'";
    $result = mysqli_query($conn, $delete);
    if ($result  >0) {
        echo "<script>
            alert('Hủy đơn hàng thành công');
            window.location.href='theodoidh.php';
        </script>";
    } else {
        echo "<script>
            alert('Lỗi hủy đơn hàng! Vui lòng liên hệ Admin để được giải quyết!');
            window.location.href='theodoidh.php';
        </script>";
    }
    ?>
</body>
</html>
