<?php
include("../../../config/config.php");

$timkiem = "";
if (isset($_POST['txtTimkiem'])) {
    $timkiem = $_POST['txtTimkiem'];
}

$sql = "SELECT * FROM cua_hang";
if (!empty($timkiem)) {
    $sql .= " WHERE ten LIKE '%$timkiem%' OR dia_chi LIKE '%$timkiem%' OR thanh_pho LIKE '%$timkiem%'";
}

$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table id="tblMain">
                <thead>
                    <tr>
                        <th>ID cửa hàng</th>
                        <th>Tên cửa hàng</th>
                        <th>Địa chỉ</th>
                        <th>Thành phố</th>
                        <th>Hình ảnh</th>
                        <th>Số điện thoại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row["idcuahang"] . '</td>
                    <td>' . $row["ten"] . '</td>
                    <td>' . $row["dia_chi"] . '</td>
                    <td>' . $row["thanh_pho"] . '</td>
                    <td><img src="../../../asset/imgcuahang/' . $row["hinhanh"] . '" alt="' . $row["ten"] . '" style="width: 350px;"></td>
                    <td>' . $row["sdt"] . '</td>
                    <td>
                        <a href="suacuahang.php?ID=' . $row["idcuahang"] . '"><i class="ti-pencil-alt"></i></a>
                        <a onclick="return confirm(\'Bạn có muốn xóa cửa hàng không?\');" href="xoacuahang.php?ID=' . $row["idcuahang"] . '"><i class="ti-trash"></i></a>
                    </td>
                </tr>';
        }
        echo '</tbody></table>';
    } else {
        echo "Không có dữ liệu cửa hàng.";
    }
} else {
    echo "Lỗi trong quá trình thực hiện truy vấn: " . mysqli_error($conn);
}
?>
