<?php
if (!isset($_GET['ma_nv'])) {
    echo "Vui lòng cung cấp mã nhân viên (?ma_nv=...)";
    exit;
}

$conn = new mysqli("localhost", "root", "", "ql_nhansu");
$conn->set_charset("utf8");

$ma_nv = $conn->real_escape_string($_GET['ma_nv']);
$sql = "SELECT n.*, d.ten_khoa FROM nhanvien n LEFT JOIN donvi d ON n.ma_dv = d.id WHERE ma_nv = '$ma_nv'";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()):
?>
    <h2>Thông tin nhân viên</h2>
    <p><strong>Mã NV:</strong> <?= $row['ma_nv'] ?></p>
    <p><strong>Họ tên:</strong> <?= $row['ho_ten'] ?></p>
    <p><strong>Giới tính:</strong> <?= $row['gioi_tinh'] ?></p>
    <p><strong>Ngày sinh:</strong> <?= $row['ngay_sinh'] ?></p>
    <p><strong>Địa chỉ:</strong> <?= $row['dia_chi'] ?></p>
    <p><strong>SĐT:</strong> <?= $row['sdt'] ?></p>
    <p><strong>Đơn vị:</strong> <?= $row['ten_khoa'] ?></p>
<?php else: ?>
    <p>Không tìm thấy nhân viên.</p>
<?php endif; ?>
