<?php
$conn = mysqli_connect("localhost", "root", "", "quanlybanhang");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$mahd = $_GET['mahd'];

$sql = "SELECT * FROM HOADON WHERE mahd = '$mahd'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Kết quả tìm kiếm hóa đơn</h2>";
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Mã hóa đơn</th>
                <th>Mã KH</th>
                <th>Mã hàng</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['mahd']}</td>
                <td>{$row['makh']}</td>
                <td>{$row['mahang']}</td>
                <td>{$row['soluong']}</td>
                <td>{$row['thanhtien']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Không tìm thấy hóa đơn!";
}

mysqli_close($conn);
?>
