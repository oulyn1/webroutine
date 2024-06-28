<?php
include ("../../config/config.php");
$token = $_GET["token"];
$sql = "SELECT * FROM user where forgotToken='" . $token . "'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ID = $row["Id_user"];
    }
} else {
    echo "<script>
alert('Liên kết không tồn tại hoặc đã hết hạn!');
window.location.href='../../index.php';
</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <div class="header2">
            <a href="../../index.php" class="img-header"><img src="../../asset/img/logo-routine.png" alt=""></a>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Quên Mật Khẩu</h1>
            </div>
            <form method="POST">
                <div class="user-info">
                    <div class="info-name2"><label for="Password">Nhập mật khẩu mới</label></div>
                    <div class="input"><input type="password" class="info-name-property2" id="Password"
                            name="txtPassword" required /></div>
                    <div class="info-name2"><label for="Password2">Nhập lại mật khẩu mới</label></div>
                    <div class="input"><input type="password" class="info-name-property2" id="Password2"
                            name="txtPassword2" required /></div>
                </div>
                <div class="tlb-submit"><input type="submit" value="Xác nhận" class="btn-update" colspan="2"
                        name="txtSua" /></div>
            </form>
        </div>
        <?php
        include ("../../config/config.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $token = $_GET["token"];
            $password = md5($_POST['txtPassword']);
            $password2 = md5($_POST['txtPassword2']);
            if ($password == $password2) {
                $query = "UPDATE user SET Password='" . $password . "' WHERE Id_user='" . $ID . "'";
                $result = mysqli_query($conn, $query);
                if ($result > 0) {
                    $query2 = "UPDATE user SET forgotToken='' WHERE Id_user='" . $ID . "'";
                    $result2 = mysqli_query($conn, $query2);
                    if ($result2 > 0) {
                        echo "<script>
                alert('Thay đổi mật khẩu thành công!');
                window.location.href='../../index.php';
            </script>";
                    } else {
                        echo "<script>
                alert('Đã có lỗi xảy ra! Vui lòng thử lại sau.');
            </script>";
                    }
                } else {
                    echo "<script>
                alert('Đã có lỗi xảy ra! Vui lòng thử lại sau.');
            </script>";
                }
            } else {
                echo "<script>
                alert('Nhập lại mật khẩu chưa chính xác!!');
            </script>";
            }
        }
        ?>
</body>

</html>