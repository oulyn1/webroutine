<?php
session_start();
include("../../config/config.php");

if (isset($_POST['add'])) {
    $ID = $_SESSION["customer"];  
    $IDSP = $_GET["ID"];
    $SL = $_POST["sl"];
    $soluong=0;
    $query="SELECT * FROM tbl_sanpham WHERE IDSanPham='$IDSP'";
            $resultA=mysqli_query($conn, $query);
            if(mysqli_num_rows($resultA) > 0){
            while ($rowA = mysqli_fetch_assoc($resultA)){
                $soluong=$rowA["soluong"];
            }
        }
    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $sql = "SELECT * FROM giohang WHERE IDUser='$ID' AND IDSanPham='$IDSP'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        if (mysqli_num_rows($result) == 0) {
            // Thêm sản phẩm vào giỏ hàng
            $query = "INSERT INTO giohang(IDUser, IDSanPham, SoLuong) VALUES ('$ID', '$IDSP', '$SL')";
            $insert_result = mysqli_query($conn, $query);
            
            if (!$insert_result) {
                echo "Lỗi thêm sản phẩm vào giỏ hàng: " . mysqli_error($conn);
            }
        } else {
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $row = mysqli_fetch_assoc($result);
            $SLmoi = $row["SoLuong"] + $SL;
            if($SLmoi>$soluong){
                $SLmoi=$soluong;
            }
            $sql = "UPDATE giohang SET SoLuong='$SLmoi' WHERE IDUser='$ID' AND IDSanPham='$IDSP'";
            $update_result = mysqli_query($conn, $sql);
            
            if (!$update_result) {
                echo "Lỗi cập nhật giỏ hàng: " . mysqli_error($conn);
            }
        }
        
        header("location:infoItemLayout.php?ID=$IDSP");
    } else {
        echo "Lỗi truy vấn: " . mysqli_error($conn);
    }
}
?>
