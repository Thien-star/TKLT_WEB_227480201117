<?php
$conn = new mysqli("localhost", "root", "", "ql_nhansu");
$conn->set_charset("utf8");

$sql = "SELECT n.*, d.ten_khoa FROM nhanvien n LEFT JOIN donvi d ON n.ma_dv = d.id";
$result = $conn->query($sql);
?>

<h2>Danh sách nhân viên</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>Mã NV</th><th>Họ tên</th><th>Giới tính</th><th>Ngày sinh</th><th>Địa chỉ</th><th>SĐT</th><th>Đơn vị</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['ma_nv'] ?></td>
            <td><?= $row['ho_ten'] ?></td>
            <td><?= $row['gioi_tinh'] ?></td>
            <td><?= $row['ngay_sinh'] ?></td>
            <td><?= $row['dia_chi'] ?></td>
            <td><?= $row['sdt'] ?></td>
            <td><?= $row['ten_khoa'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>
