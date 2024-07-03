
<?php
    include("../../../config/config.php");
    $query="SELECT * FROM user";
    $result = mysqli_query($conn, $query);
    $num = 1;
        if (mysqli_num_rows($result) > 0) {
            echo '<table id="tblMain">
                <thead>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Họ Và Tên</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Quyền Hạn</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </thead>
                <tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['Permission'] == 'Admin') {
                echo '<tr>
                        <td>' . ($num++) . '</td>
                        <td>' . $row["Id_user"] . '</td>
                        <td>' . $row["Fullname"] . '</td>
                        <td>' . $row["Email"] . '</td>
                        <td>' . $row["Password"] . '</td>
                        <td>' . $row["Permission"] . '</td>
                        <td><td>
                        
                    </tr>';}
                    else{
                        echo '<tr>
                        <td>' . ($num++) . '</td>
                        <td>' . $row["Id_user"] . '</td>
                        <td>' . $row["Fullname"] . '</td>
                        <td>' . $row["Email"] . '</td>
                        <td>' . $row["Password"] . '</td>
                        <td>' . $row["Permission"] . '</td>
                        <td><a class="thea" href="editacc.php?ID=' . $row["Id_user"] . '"><i class="ti-pencil-alt"></i></a></td>
                        <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa dữ liệu không?\');" href="deleteacc.php?ID=' . $row["Id_user"] . '"><i class="ti-trash"></i></a></td>
                    </tr>'; 
                    }
            }
            echo '</tbody>
            </table>';
        } else {
            echo "Khong co du lieu tai khoan";
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $keyword = $_POST['txtKeyword'];
            $query2 = "SELECT * FROM user WHERE Fullname like N'%" . $keyword . "%' OR Id_user like N'%" . $keyword . "%' 
            OR Email like N'%" . $keyword . "%' ";
            $result2 = mysqli_query($conn, $query2);
            $num = 1;
        if (mysqli_num_rows($result2) > 0) {
            echo '<script>
                        var tblMain=document.getElementById(\'tblMain\');
                        tblMain.style.display= \'none\';
                    </script>';
            echo '<table>
                <thead>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Họ Và Tên</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Quyền Hạn</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </thead>
                <tbody>';
            while ($row = mysqli_fetch_assoc($result2)) {  
                if ($row['Permission'] == 'Admin') {
                echo '<tr>
                        <td>' . ($num++) . '</td>
                        <td>' . $row["Id_user"] . '</td>
                        <td>' . $row["Fullname"] . '</td>
                        <td>' . $row["Email"] . '</td>
                        <td>' . $row["Password"] . '</td>
                        <td>' . $row["Permission"] . '</td>
                        <td><td>
                        
                    </tr>';}
                    else{
                        echo '<tr>
                        <td>' . ($num++) . '</td>
                        <td>' . $row["Id_user"] . '</td>
                        <td>' . $row["Fullname"] . '</td>
                        <td>' . $row["Email"] . '</td>
                        <td>' . $row["Password"] . '</td>
                        <td>' . $row["Permission"] . '</td>
                        <td><a class="thea" href="editacc.php?ID=' . $row["Id_user"] . '"><i class="ti-pencil-alt"></i></a></td>
                        <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa dữ liệu không?\');" href="deleteacc.php?ID=' . $row["Id_user"] . '"><i class="ti-trash"></i></a></td>
                    </tr>'; 
                    }
            }
            echo '</tbody>
            </table>';
        } else {
            echo "Khong co du lieu tai khoan";
        }
        }        
?>