<?php
include 'connect.php';

$sql = "SELECT luong.*, nhanvien.ho_ten FROM luong 
        JOIN nhanvien ON luong.ma_nv = nhanvien.ma_nv";
$result = mysqli_query($conn, $sql);
?>

<h2>Danh sách bảng lương</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Mã NV</th>
        <th>Họ tên</th>
        <th>Tháng/Năm</th>
        <th>Lương CB</th>
        <th>Phụ cấp</th>
        <th>Thưởng</th>
        <th>Khấu trừ</th>
        <th>Tổng lương</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $row['ma_nv'] ?></td>
        <td><?= $row['ho_ten'] ?></td>
        <td><?= $row['thang'] ?>/<?= $row['nam'] ?></td>
        <td><?= $row['luong_cb'] ?></td>
        <td><?= $row['phu_cap'] ?></td>
        <td><?= $row['thuong'] ?></td>
        <td><?= $row['khau_tru'] ?></td>
        <td><?= $row['tong_luong'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
