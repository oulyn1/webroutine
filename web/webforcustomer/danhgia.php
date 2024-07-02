<?php
session_start();
include("../../config/config.php");

if (isset($_POST['add'])) {
    $ID = $_SESSION["customer"];  
    $IDSP = $_GET["ID"];
    $mota=$_POST["txtmota"];
    $sao=$_POST["rating"];
            $query = "INSERT INTO danhgia(iduser, idsanpham, sao, noidung) VALUES ('$ID', '$IDSP', '$sao', '$mota')";
            $result = mysqli_query($conn, $query);
            if($result > 0){
                echo "<script>
                alert('Gửi đánh giá thành công! Chúng tôi rất cảm kích về sự đóng góp của bạn!');
                window.location.href='infoItemLayout.php?ID=$IDSP';
            </script>"; 
            }else{
                echo "<script>
                alert('Gửi đánh giá thất bại!');
                window.location.href='infoItemLayout.php?ID=$IDSP';
            </script>"; 
            }
        }
?>