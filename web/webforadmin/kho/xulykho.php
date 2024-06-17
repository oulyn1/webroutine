<?php 
            include("../../../config/config.php");
            $sql = "SELECT * FROM kho"; 
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
            echo '<table id="tblMain">
                <thead>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Hình ảnh</th>
                    <th>Miêu tả</th>
                    <th>Cập Nhật</th>
                </thead>
        
            <tbody>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $row["ID"] . '</td>
                        <td>' . $row["Name"] . '</td>
                        <td>' . $row["Size"] . '</td>
                        <td>' . $row["Color"] . '</td>
                        <td>' . $row["GiaBan"] . '</td>
                        <td>' . $row["SoLuong"] . '</td>
                        <td>' . $row["Image"] . '</td>
                        <td>' . $row["MieuTa"] . '</td>
                </tr>'; 
            }
            echo'</tbody> 
            </table>';
            }else{
                echo "Khong co du lieu tai khoan";
            }
?>