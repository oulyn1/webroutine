<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["admin"])) {
    header("location: ../../../index.php");
    exit;
}else{$ID= $_SESSION["admin"];}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
                <a href="main.php?ID=<?php echo $ID ?>" class="header__list-items" id="main"><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php?ID=ID" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php?ID=ID" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php?ID=ID" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../danhmuc/danhmuc.php?ID=ID" class="header__list-items"><b>Danh mục Sản phẩm</b></a>
                <a href="../donhang/donhang.php?ID=ID" class="header__list-items"><b>Đơn hàng</b></a>
                <a href="../thongke/thongke.php?ID=ID" class="header__list-items"><b>Thống Kê</b></a>
                <a href="../slider/slider.php?ID=ID" class="header__list-items"><b>Slider</b></a>
                <a href="../cuahang/cua_hang.php?ID=ID" class="header__list-items"><b>Cửa hàng</b></a>
                <a href="../danhgia/danhgia.php" class="header__list-items"><b>Đánh giá</b></a>
            </div>
            <div class="header__list2">
                <a href="../logout.php" class="logout" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Tổng quan tài khoản</h1>
            </div>
            <?php 
      include("../../../config/config.php");
      $id_user=$_GET["ID"];
      $Fullname="";
      $Password="";
      $Email="";
      $Permission="";
      
      $query = "SELECT * FROM user WHERE Id_user=$id_user";
      $result=mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $FullName = $row["Fullname"];
            $Email = $row["Email"];
            $Permission = $row["Permission"];
            // $id_user=$row["Id_user"];
            $Password= md5($row["Password"]);
        }
      }
    
      ?>
            <form action="xuly.php" method="POST">
                <table class="tlb-info">
                    <div class="user-info">
                        <tbody>
                            <tr>
                                <td class="info-name"><label for="ID">ID</label></td>
                                <td>
                                    <input type="text" class="info-name-property" id="ID" name="txtID"
                                        value="<?php echo $id_user ?>" disabled />
                                </td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="Name">Tên</label></td>
                                <td>
                                    <input type="text" class="info-name-property" id="Name" name="txtName"
                                        value="<?php echo $FullName ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="Email">Email</label></td>
                                <td>
                                    <input type="email" class="info-name-property" id="Email" name="txtEmail"
                                        value="<?php echo $Email ?>" required />
                                </td>
                            </tr>
                            <tr>
                                <td class="info-name">
                                    <label for="Password">Password</label>
                                </td>
                                <td>
                                    <input type="password" class="info-name-property" id="Password" name="Password"
                                        value="<?php echo $Password ?>" disabled />
                                </td>
                            </tr>
                            <tr>
                                <td class="info-name">
                                    <label for="Permission">Quyền hạn</label>
                                </td>
                                <td>
                                    <input type="text" disabled class="info-name-property" id="Permission"
                                        name="Permission" value="<?php echo $Permission ?>" />
                                </td>
                            </tr>
                        </tbody>
                </table>
        </div>
        <div class="tlb-submit"><input type="submit" value="Sửa" class="btn-update" colspan="2" name="txtSua" /></div>
        </form>
    </div>
    <div class="footer">
        <a href="../../doimatkhau.php?ID=<?php echo $_SESSION["admin"] ?>">Đổi mật khẩu</a>
    </div>
    </div>
</body>

</html>