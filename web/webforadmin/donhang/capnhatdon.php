<?php
    include("../../../config/config.php");
    if(isset($_GET['CODE'])){
        $sql = "UPDATE tbl_donhang SET tinhtrang=0  WHERE iddonhang='$_GET[CODE]' ";
        $resultA = mysqli_query($conn, $sql);
        $query = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham WHERE tbl_chitietdonhang.idsanpham=tbl_sanpham.idsanpham
                                                               AND madon='$_GET[CODE]'";
        //buoc 3 thuc thi cau lenh
        $result = mysqli_query($conn, $query);
        //buoc 4 lay du lieu
        if(mysqli_num_rows($result) >0){
            while ($row = mysqli_fetch_assoc($result)){
                $idsanpham=$row["idsanpham"];
                $soluong=$row["soluong"]-$row["soluongCT"];
                $queryB= "UPDATE tbl_sanpham SET soluong='$soluong' WHERE idsanpham='$idsanpham'";
                mysqli_query($conn, $queryB);
            }
        }
        if ($resultA > 0) {
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