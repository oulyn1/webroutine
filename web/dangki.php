<?php
include("../config/config.php");

if (isset($_POST["submit"])) {
    $Fullname = $_POST['txtname'];
    $Email = $_POST['txtemail'];
    $Password = md5($_POST['txtpassword']);
    $Password2 = md5($_POST['txtpassword2']);
    $dk = $_POST['cbdieukhoan'];

    if ($dk == 1) {
        if ($Password == $Password2) {
            $checkEmailQuery = "SELECT * FROM user WHERE Email = '$Email'";
            $resultCheckEmail = mysqli_query($conn, $checkEmailQuery);

            if (mysqli_num_rows($resultCheckEmail) == 0) {
                // Thêm vào bảng user
                $insertUserQuery = "INSERT INTO user (Fullname, Password, Email, Permission) VALUES ('$Fullname', '$Password', '$Email', 'Customer')";
                $resultInsertUser = mysqli_query($conn, $insertUserQuery);

                if ($resultInsertUser) {
                    // Lấy ID của người dùng vừa được thêm vào
                    $userId = mysqli_insert_id($conn);

                    // Thêm vào bảng khach_hang và lấy thông tin từ bảng user
                    $updateKhachHangQuery = "INSERT INTO khach_hang (id, ten, email) SELECT Id_user, Fullname, Email FROM user WHERE Id_user = '$userId'";
                    $resultUpdateKhachHang = mysqli_query($conn, $updateKhachHangQuery);

                    if ($resultUpdateKhachHang) {
                        echo "<script>
                                alert('Đăng ký tài khoản thành công!!!');
                                window.location.href='../index.php';
                              </script>";
                    } else {
                        echo "<script>
                                alert('Lỗi đăng ký tài khoản!!!');
                                window.location.href='../index.php';
                              </script>";
                    }
                } else {
                    echo "<script>
                            alert('Lỗi đăng ký tài khoản!!!');
                            window.location.href='../index.php';
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Email đã tồn tại! Vui lòng sử dụng một địa chỉ email khác.');
                        window.location.href='../index.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Mật khẩu nhập lại không chính xác!!');
                    window.location.href='../index.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Vui lòng đồng ý với các điều khoản của chúng tôi!');
                window.location.href='../index.php';
              </script>";
    }
}
?>
