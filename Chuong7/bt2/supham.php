<?php
$conn = new mysqli("localhost", "root", "", "ql_nhansu");
$conn->set_charset("utf8");

$sql = "SELECT * FROM donvi WHERE ten_khoa = 'Khoa Sư phạm'";
$result = $conn->query($sql);

echo "<h2>Cơ cấu tổ chức - Khoa Sư phạm</h2>";
echo "<table border='1' cellpadding='10'><tr><th>Chức vụ</th><th>Họ tên</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['chucvu']}</td><td>{$row['hoten']}</td></tr>";
}
echo "</table>";

$conn->close();
?>
