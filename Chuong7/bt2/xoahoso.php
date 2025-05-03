<?php
$conn = new mysqli("localhost", "root", "", "ql_nhansu");
$conn->set_charset("utf8");

if (isset($_GET["ma_nv"])) {
    $ma_nv = $conn->real_escape_string($_GET["ma_nv"]);
    $sql = "DELETE FROM nhanvien WHERE ma_nv = '$ma_nv'";
    if ($conn->query($sql)) echo "Đã xóa nhân viên có mã: $ma_nv";
    else echo "Lỗi: " . $conn->error;
}

$result = $conn->query("SELECT * FROM nhanvien");
?>

<h2>Chọn nhân viên để xoá</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>Mã NV</th><th>Họ tên</th><th>Xoá</th>
    </tr>
    <?php while ($r = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $r['ma_nv'] ?></td>
            <td><?= $r['ho_ten'] ?></td>
            <td><a href="?ma_nv=<?= $r['ma_nv'] ?>" onclick="return confirm('Xoá nhân viên này?')">Xoá</a></td>
        </tr>
    <?php endwhile; ?>
</table>
