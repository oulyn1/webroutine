<?php
                    include("../../../config/config.php");

                    $timkiem = "";
                    if (isset($_POST['txtTimkiem'])) {
                        $timkiem = $_POST['txtTimkiem'];
                    }

                    $sql = "SELECT * FROM cua_hang";
                    if ($timkiem != "") {
                        $sql .= " WHERE ten LIKE '%$timkiem%' OR dia_chi LIKE '%$timkiem%' OR thanh_pho LIKE '%$timkiem%' OR mo_ta LIKE '%$timkiem%'";
                        }

                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table id="tblMain">
                                <thead>
                                    <tr>
                                        <th>ID cửa hàng</th>
                                        <th>Tên cửa hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Thành phố</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>';
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                    <td>' . $row["idcuahang"] . '</td>
                                    <td>' . $row["ten"] . '</td>
                                    <td>' . $row["dia_chi"] . '</td>
                                    <td>' . $row["thanh_pho"] . '</td>
                                    <td>' . $row["hinhanh"] . '</td>
                                    <td>' . $row["mo_ta"] . '</td>
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
                    ?>