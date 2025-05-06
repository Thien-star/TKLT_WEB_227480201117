<?php
include 'Connection.php';
$makh = $_POST['makh'];

$sql = "DELETE FROM khachhang WHERE makh='$makh'";
$conn->query($sql);
echo "Đã xóa!";
$conn->close();
?>
