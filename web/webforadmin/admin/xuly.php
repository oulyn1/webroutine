<?php
include("../../../config/config.php");
$id_user = $_POST['txtID'];
$Fullname =$_POST['txtName'];
$Email =$_POST['txtEmail'];
if (isset($_POST["txtSua"])) {
$query="UPDATE user SET Fullname='".$Fullname."',Email='".$Email."' WHERE id_user='".$id_user."'";
$result = mysqli_query($conn, $query);
if ($result>0) {
    echo"<script>
            alert('Cập nhật dữ liệu thành công');
            window.location.href='main.php';
        </script>";
    }
        else {
            echo"<script>
            alert('Lỗi Cập nhật dữ liệu ');
            window.location.href='main.php';
        </script>";
        }
}
?>