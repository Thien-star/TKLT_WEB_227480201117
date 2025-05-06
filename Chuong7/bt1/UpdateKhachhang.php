<?php
include 'Connection.php';
$makh = $_POST['makh'];
$tenmoi = $_POST['tenmoi'];

$sql = "UPDATE khachhang SET tenkh='$tenmoi' WHERE makh='$makh'";
$conn->query($sql);
echo "Cập nhật thành công!";
$conn->close();
?>
