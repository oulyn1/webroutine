<?php
include("../config/config.php");
$Fullname =$_POST['txtname'];
$Email =$_POST['txtemail'];
$Password =md5($_POST['txtpassword']);
$Password2=md5($_POST['txtpassword2']);
$dk=$_POST['cbdieukhoan'];
if (isset($_POST["submit"])) {
    if($dk==1){ 
if ($Password == $Password2) {
    $qsl="SELECT * FROM user where Email='".$Email."'";
    $result = mysqli_query($conn, $qsl);
    if (mysqli_num_rows($result) == 0) {
$query="INSERT INTO user VALUES('','".$Fullname."','".$Password."','".$Email."','Customer','')";
$result = mysqli_query($conn, $query);
if ($result>0) {
    echo"<script>
            alert('Đăng ký tài khoản thành công!!!');
            window.location.href='../index.php';
        </script>";
    }
        else {
            echo"<script>
            alert('Lỗi đăng kí tài khoản!!!');
            window.location.href='../index.php';
        </script>";
        }
    }
    else { echo"<script>
        alert('Email đã tồn tại! Vui lòng thử 1 email khác.');
        window.location.href='../index.php';
    </script>";}

}
else {
    echo "<script>
            alert('Nhập lại mật khẩu chưa chính xác!!');
            window.location.href='../index.php';
        </script>";
}
}else{
    echo "<script>
            alert('Vui lòng chấp nhận điều khoản của chúng tôi!');
            window.location.href='../index.php';
        </script>";
} 
}
?>