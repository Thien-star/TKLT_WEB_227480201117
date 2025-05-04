<?php
$conn = new mysqli("localhost", "root", "", "ql_nhansu");
$conn->set_charset("utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_nv = $_POST["ma_nv"];
    $ho_ten = $_POST["ho_ten"];
    $gioi_tinh = $_POST["gioi_tinh"];
    $ngay_sinh = $_POST["ngay_sinh"];
    $dia_chi = $_POST["dia_chi"];
    $sdt = $_POST["sdt"];
    $ma_dv = $_POST["ma_dv"];

    $sql = "INSERT INTO nhanvien (ma_nv, ho_ten, gioi_tinh, ngay_sinh, dia_chi, sdt, ma_dv)
            VALUES ('$ma_nv', '$ho_ten', '$gioi_tinh', '$ngay_sinh', '$dia_chi', '$sdt', '$ma_dv')";
    if ($conn->query($sql)) echo "Đã thêm nhân viên!";
    else echo "Lỗi: " . $conn->error;
}

$dv = $conn->query("SELECT * FROM donvi");
?>

<h2>Thêm nhân viên</h2>
<form method="post">
    Mã NV: <input name="ma_nv"><br>
    Họ tên: <input name="ho_ten"><br>
    Giới tính: <select name="gioi_tinh"><option>Nam</option><option>Nữ</option></select><br>
    Ngày sinh: <input type="date" name="ngay_sinh"><br>
    Địa chỉ: <input name="dia_chi"><br>
    SĐT: <input name="sdt"><br>
    Đơn vị:
    <select name="ma_dv">
        <?php while ($r = $dv->fetch_assoc()): ?>
            <option value="<?= $r['id'] ?>"><?= $r['ten_khoa'] ?></option>
        <?php endwhile; ?>
    </select><br>
    <input type="submit" value="Thêm">
</form>
