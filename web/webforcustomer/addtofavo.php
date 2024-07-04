<?php
session_start();
include("../../config/config.php");

    $ID = $_SESSION["customer"];  
    $IDSP = $_GET["ID"];
    
    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $sql = "SELECT * FROM yeuthich WHERE IDUser='$ID' AND IDSanPham='$IDSP'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        if (mysqli_num_rows($result) == 0) {
            // Thêm sản phẩm vào giỏ hàng
            $query = "INSERT INTO yeuthich(IDUser, IDSanPham) VALUES ('$ID', '$IDSP')";
            $insert_result = mysqli_query($conn, $query);
            
            if (!$insert_result) {
                echo "<script>
                alert('Lỗi thêm sản phẩm vào giỏ hàng: " . mysqli_error($conn) . "');
                window.location.href='infoItemLayout.php?ID=$IDSP';
                </script>";
                exit();
            }
        }
        
        header("Location: infoItemLayout.php?ID=$IDSP");
        exit();
    } else {
        echo "<script>
                alert('Lỗi truy vấn: " . mysqli_error($conn) . "');
                window.location.href='infoItemLayout.php?ID=$IDSP';
            </script>";
        exit();
    }

?>
