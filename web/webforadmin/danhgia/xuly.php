<?php
include ("../../../config/config.php");
$query = "
    SELECT 
        danhgia.idanhgia, 
        danhgia.sao, 
        danhgia.noidung, 
        user.Fullname, 
        user.Email, 
        tbl_sanpham.tensanpham 
    FROM 
        danhgia
    JOIN 
        user ON danhgia.iduser = user.Id_user
    JOIN 
        tbl_sanpham ON danhgia.idsanpham = tbl_sanpham.idsanpham
    ORDER BY 
        danhgia.sao ASC
";
$result = mysqli_query($conn, $query);

$num = 1;
if (mysqli_num_rows($result) > 0) {
    echo '<table id="tblMain">
                <thead>
                    <th>STT</th>
                    <th>Họ Và Tên</th>
                    <th>Email</th>
                    <th>Sản Phẩm</th>
                    <th>Số Sao</th>
                    <th>Nội Dung</th>
                    <th>Xóa</th>
                </thead>
                <tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . ($num++) . '</td>
                <td>' . $row["Fullname"] . '</td>
                <td>' . $row["Email"] . '</td>
                <td>' . $row["tensanpham"] . '</td>
                <td>' . $row["sao"] . '</td>
                <td>' . $row["noidung"] . '</td>
                <td><a class="thea" onclick="return confirm(\'Bạn có muốn xóa dữ liệu không?\');" href="xoadg.php?ID=' . $row["idanhgia"] . '"><i class="ti-trash"></i></a></td>
            </tr>';
    }
    echo '</tbody>
            </table>';
} else {
    echo "Không có dữ liệu";
}
?>
