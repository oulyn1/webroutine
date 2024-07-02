<?php
    include("../../../config/config.php");
    if(isset($_GET['CODE'])){
        $sql = "UPDATE tbl_donhang SET tinhtrang=0  WHERE madon='$_GET[CODE]' ";
        $result = mysqli_query($conn, $sql);
        if ($result > 0) {
            echo"<script>
            alert('Xử lý sản phẩm thành công');
            window.location.href='donhang.php';
            </script>";
        }else{
            echo "<script>
            alert('Lỗi xử lý sản phẩm');
            window.location.href='donhang.php';
        </script>";
        }
    }
?>