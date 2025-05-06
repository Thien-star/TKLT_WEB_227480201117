<?php
include 'Connection.php';
$ten = $_POST['ten'];
$mansx = $_POST['mansx'];
$namsx = $_POST['namsx'];
$gia = $_POST['gia'];

$sql = "INSERT INTO hanghoa (tenhang, mansx, namsx, gia)
        VALUES ('$ten', '$mansx', '$namsx', '$gia')";
$conn->query($sql);
echo "Đã thêm hàng thành công!";
$conn->close();
?>
