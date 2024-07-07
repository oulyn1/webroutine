<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include ("../../config/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $query = "SELECT * FROM user WHERE Email='" . $email . "' AND Password='" . $password . "' LIMIT 1";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row["Permission"] == "Admin") {
        $_SESSION['admin'] = $row["Id_user"];
        $_SESSION["email"] = $row["Email"];
       echo "<script>
            alert('Đăng nhập thành công');
            window.location.href='../../web/webforadmin/admin/main.php?ID=".$row["Id_user"]."';
        </script>";
      } else {
        $_SESSION["customer"] = $row["Id_user"];
        $_SESSION["email"] = $row["Email"];
         echo "<script>
            alert('Đăng nhập thành công');
            window.location.href='mainafterlogin.php';
        </script>";
      }
    }
  } else {
    echo "<script>
            alert('Sai mật khẩu hoặc email!!!!');
            window.location.href='../../index.php';
        </script>";
  }

}
?>