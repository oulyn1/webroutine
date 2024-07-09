<?php
include("../../../config/config.php");

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];

    $query_delete = "DELETE FROM cua_hang WHERE idcuahang = $id";

    if (mysqli_query($conn, $query_delete)) {
        echo "<script>
                alert('Xóa cửa hàng thành công');
                window.location.href='cua_hang.php';
            </script>";
    } else {
        echo "<script>
                alert('Lỗi: Không thể xóa cửa hàng');
                window.location.href='cua_hang.php';
            </script>";
    }
} else {
    echo "ID cửa hàng không được cung cấp.";
    exit();
}
?>
