<?php
include 'connect.php';

$sql = "SELECT * FROM luong";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $tong = $row['luong_cb'] + $row['phu_cap'] + $row['thuong'] - $row['khau_tru'];
    mysqli_query($conn, "UPDATE luong SET tong_luong=$tong WHERE id=$id");
}

echo "<h2>Đã tính lại tổng lương cho toàn bộ nhân viên.</h2>";
?>
