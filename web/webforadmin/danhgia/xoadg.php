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
    $delete = "DELETE FROM danhgia WHERE idanhgia='".$ID."'";
    $result = mysqli_query($conn, $delete);
    if (  $result  >0) {
        echo "<script>
            alert('Xóa dữ liệu thành công');
            window.location.href='danhgia.php';
        </script>";
    } else {
        echo "<script>
            alert('Lỗi xóa dữ liệu');
            window.location.href='danhgia.php';
        </script>";
    }
    ?>
</body>
</html>
