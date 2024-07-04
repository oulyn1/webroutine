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
    $CODE=$_GET["CODE"];
    include("../../../config/config.php");
    $query = "DELETE FROM tbl_chitietdonhang WHERE idctdh='".$ID."'";  
    $result = mysqli_query($conn, $query);
    if ($result > 0) {
        echo"<script>
        alert('Hủy đơn hàng thành công');
        window.location.href='chitietdonhang.php?CODE=$CODE';
    </script>";
    }else{
        echo "<script>
        alert('Lỗi hủy đơn hàng');
        window.location.href='chitietdonhang.php?CODE=$CODE';
    </script>";
    }
     ?>
</body>
</html>