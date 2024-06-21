<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa</title>
</head>
<body>
    <?php
    $idsanpham=$_GET["idsanpham"];
    include("../../../config/config.php");
    $sql = "DELETE FROM khohang WHERE idsanpham='".$idsanpham."'";
        
        $result = mysqli_query($conn, $sql);
        if ($result > 0) {
            echo"<script>
            alert('Xóa dữ liệu thành công');
            window.location.href='kho.php';
        </script>";
        }else{
            echo "<script>
            alert('Lỗi xóa dữ liệu');
            window.location.href='kho.php';
        </script>";
        }
     ?>
</body>
</html>