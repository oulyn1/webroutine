<?php
include("../../config/config.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "SELECT image_path FROM slider_images WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        unlink("../../../" . $row["image_path"]);
        $query = "DELETE FROM slider_images WHERE id=$id";
        if (mysqli_query($conn, $query)) {
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
}
}
?>
