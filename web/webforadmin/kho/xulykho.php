<?php 
            include("../../../config/config.php");
            $sql = "SELECT * FROM khohang"; 
            $result = mysqli_query($conn,$sql);
            $num =1;
            if(mysqli_num_rows($result) > 0){
            echo '<table id="tblMain">
                <thead>
                    <th>STT</th>
                    <th>Mã sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Ngày Nhập</th>
                    <th>Cập Nhật</th>
                </thead>
        
            <tbody>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . ($num++) . '</td>
                        <td>' . $row["idsanpham"] . '</td>
                        <td>' . $row["soluong"] . '</td>
                        <td>' . $row["ngaynhap"] . '</td>
                        <td><a class="thea" href="editkho.php?idsanpham='.$row["idsanpham"].'"><i class="ti-pencil-alt"></i></a>
                        <a class="thea" onclick="return confirm(\'Bạn có muốn xóa dữ liệu không?\')" href="deletespkho.php?idsanpham=' . $row["idsanpham"] . '"><i class="ti-trash"></i></a></td>
                </tr>'; 
            }
            echo'</tbody> 
            </table>';
            }else{
                echo "Khong co du lieu tai khoan";
            }
?>              