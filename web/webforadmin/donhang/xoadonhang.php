<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa</title>
</head>
<body>
    <?php
    $ID=$_GET["ID"];
    include("../../../config/config.php");
    $query = "DELETE FROM tbl_donhang WHERE iddonhang='".$ID."'";
        
        $result = mysqli_query($conn, $query);
        if ($result > 0) {
            echo"<script>
            alert('Xóa đơn hàng thành công');
            window.location.href='donhang.php';
        </script>";
        }else{
            echo "<script>
            alert('Lỗi xóa đơn hàng');
            window.location.href='donhang.php';
        </script>";
        }
     ?>
</body>
</html>