<?php
  session_start();
  include("../../config/config.php");

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION["customer"];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE khach_hang SET so_dien_thoai='$phone', dia_chi='$address' WHERE id='$user_id'";
    if (mysqli_query($conn, $sql)) {
      $_SESSION['update_message'] = "Cập nhật thông tin thành công!";
    } else {
      $_SESSION['update_message'] = "Có lỗi xảy ra khi cập nhật thông tin.";
    }
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit();
  }
?>
