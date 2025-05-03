<?php
include 'connect.php';

if (isset($_GET['ma_nv'])) {
    $ma_nv = $_GET['ma_nv'];
    $sql = "SELECT * FROM luong WHERE ma_nv='$ma_nv'";
    $result = mysqli_query($conn, $sql);
    echo "<h2>Kết quả tìm kiếm cho Mã NV: $ma_nv</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Tháng/Năm</th><th>Lương CB</th><th>Phụ cấp</th><th>Thưởng</th><th>Khấu trừ</th><th>Tổng</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['thang']}/{$row['nam']}</td>
            <td>{$row['luong_cb']}</td>
            <td>{$row['phu_cap']}</td>
            <td>{$row['thuong']}</td>
            <td>{$row['khau_tru']}</td>
            <td>{$row['tong_luong']}</td>
        </tr>";
    }
    echo "</table>";
}
?>

<h2>Tìm kiếm bảng lương</h2>
<form method="GET">
    Nhập mã nhân viên: <input type="text" name="ma_nv" required>
    <button type="submit">Tìm</button>
</form>
