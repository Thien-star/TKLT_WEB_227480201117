<?php
$conn = mysqli_connect("localhost", "root", "", "quanlybanhang");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$makh = $_GET['makh'];

$sql = "SELECT * FROM KHACHHANG WHERE makh = '$makh'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Thông tin khách hàng</h2>";
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Mã KH</th>
                <th>Tên KH</th> 
                <th>Năm sinh</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
            </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['makh']}</td>
                <td>{$row['tenkh']}</td>
                <td>{$row['namsinh']}</td>
                <td>{$row['dienthoai']}</td>
                <td>{$row['diachi']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Không tìm thấy khách hàng!";
}

mysqli_close($conn);
?>
