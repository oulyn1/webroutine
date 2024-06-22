<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa</title>
</head>
<body>
    <?php
    $id=$_GET["id"];
    include("../../../config/config.php");
    $sql = "DELETE FROM khach_hang WHERE id='".$id."'";
        
        $result = mysqli_query($conn, $sql);
        if ($result > 0) {
            echo"<script>
            alert('Xóa dữ liệu thành công');
            window.location.href='khachhang.php';
        </script>";
        }else{
            echo "<script>
            alert('Lỗi xóa dữ liệu');
            window.location.href='khachhang.php';
        </script>";
        }
     ?>
</body>
</html>