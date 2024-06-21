<?php 
            include("../../../config/config.php");
            $sql = "SELECT * FROM kho"; 
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
            echo '<table id="tblMain">
                <thead>
                    <th>ID</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Mã kho</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Hình ảnh</th>
                    <th>Ngày Nhập</th>
                    <th>Cập Nhật</th>
                </thead>
        
            <tbody>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $row["ID"] . '</td>
                        <td>' . $row["MaSP"] . '</td>
                        <td>' . $row["Name"] . '</td>
                        <td>' . $row["MaKho"] . '</td>
                        <td>' . $row["Size"] . '</td>
                        <td>' . $row["Color"] . '</td>
                        <td>' . $row["GiaBan"] . '</td>
                        <td>' . $row["SoLuong"] . '</td>
                        <td><img src="img-kho/ppr/' . $row["Image"] . '" style="width:100px;"></td>
                        <td>' . $row["NgayNhap"] . '</td>
                        <td><a class="thea" href="editkho.php?ID='.$row["ID"].'"><i class="ti-pencil-alt"></i></a>
                        <a class="thea" onclick="return confirm(\'Bạn có muốn xóa dữ liệu không?\')" href="deletespkho.php?ID=' . $row["ID"] . '"><i class="ti-trash"></i></a></td>
                </tr>'; 
            }
            echo'</tbody> 
            </table>';
            }else{
                echo "Khong co du lieu tai khoan";
            }
?>         

za