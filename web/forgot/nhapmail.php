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
                    <div class="info-name2"><label for="Email">Nhập Email để thay đổi mật khẩu:</label></div>
                    <div class="input"><input type="email" class="info-name-property2" id="Email" name="txtEmail" required /></div>              
        </div>
        <div class="tlb-submit"><input type="submit" value="Xác nhận" class="btn-update" colspan="2" name="txtSua" /></div>
        </form>
    </div>
    <?php
include("../../config/config.php");
require("../mail/sendmail.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
$Email =$_POST['txtEmail'];
$token=md5(uniqid().time());
    $qsl="SELECT * FROM user where Email='".$Email."'";
    $result = mysqli_query($conn, $qsl);
    if (mysqli_num_rows($result) > 0) {
        $query="UPDATE user SET forgotToken='".$token."' WHERE Email='".$Email."'";
$result = mysqli_query($conn, $query);
if ($result>0) {
    $link='http://localhost/webroutine/web/forgot/resetpassword.php?token='.$token;
    $subject='Yêu cầu khôi phục mật khẩu';
    $content='Chào bạn.<br>';
    $content.='Chúng tôi nhận được yêu cầu khôi phục mật khẩu.<br>';
    $content.='Vui lòng nhấn vào link sau để tạo lại mật khẩu:<br>';
    $content.=$link.'<br>';
    $content.='Trân trọng cảm ơn!';
    $mail= new Mailer;
    $mail->guimail($subject,$content,$Email);
    echo"<script>
            alert('Vui lòng kiểm tra email để đặt lại mật khẩu!');
        </script>";
        
    }
        else {
            echo"<script>
            alert('Lỗi! Vui lòng thử lại sau ít phút');
        </script>";
        }
    }
    else { echo"<script>
        alert('Email không khớp với bất kỳ tài khoản nào trong hệ thống!!');
    </script>";}



}
?>
</body>
</html>