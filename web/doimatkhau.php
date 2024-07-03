
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../asset/css/admin.css" />
    <link rel="stylesheet" href="../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <div class="header2">
            <a href="../index.php" class="img-header"><img src="../asset/img/logo-routine.png" alt=""></a>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Đổi Mật Khẩu</h1>
            </div>
            <form method="POST">
                <div class="user-info">
                <div class="info-name2"><label for="Password0">Nhập mật khẩu hiện tại</label></div>
                    <div class="input"><input type="password" class="info-name-property2" id="Password0"
                            name="txtPassword0" required /></div>
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
        include ("../config/config.php");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ID = $_GET["ID"];
            $password0= md5($_POST['txtPassword0']);
            $password = md5($_POST['txtPassword']);
            $password2 = md5($_POST['txtPassword2']);
            $query0 = "SELECT * FROM user WHERE Id_user='" . $ID . "' AND Password='".$password0."'";
            $result = mysqli_query($conn, $query0);
            if (mysqli_num_rows($result) > 0) {
            if($password0 == $password){
                echo "<script>
            alert('Mật khẩu mới phải khác mật khẩu hiện tại');
        </script>";
            }
            else{    
            if ($password == $password2) {
                $query = "UPDATE user SET Password='" . $password . "' WHERE Id_user='". $ID ."'";
                $result = mysqli_query($conn, $query);
                    if ($result > 0) {
                        echo "<script>
                alert('Thay đổi mật khẩu thành công!');
                window.location.href='../index.php';
            </script>";
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
        } else{
            echo "<script>
            alert('Mật khẩu hiện tại chưa chính xác!!');
        </script>";
        }
    }
?>
</body>

</html>