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
    include("../../config/config.php");
    $query = "DELETE FROM giohang WHERE IDSanPham='".$ID."'";
        
        $result = mysqli_query($conn, $query);
        if ($result > 0) {
            echo'<script>
            alert("Xóa sản phẩm thành công");
            window.location.href="infoItemLayout.php?ID='.$ID.'";
        </script>';
        }else{
            echo'<script>
            alert("Xóa sản phẩm lỗi");
            window.location.href="infoItemLayout.php?ID='.$ID.'";
        </script>';
        }
     ?>
</body>
</html>