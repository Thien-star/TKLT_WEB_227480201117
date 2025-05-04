<?php
$conn = new mysqli("localhost", "root", "", "ql_nhansu");
$conn->set_charset("utf8");

if (!isset($_GET["ma_nv"])) {
    echo "Vui lòng cung cấp mã nhân viên (?ma_nv=...)";
    exit;
}

$ma_nv = $_GET["ma_nv"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ho_ten = $_POST["ho_ten"];
    $gioi_tinh = $_POST["gioi_tinh"];
    $ngay_sinh = $_POST["ngay_sinh"];
    $dia_chi = $_POST["dia_chi"];
    $sdt = $_POST["sdt"];
    $ma_dv = $_POST["ma_dv"];

    $sql = "UPDATE nhanvien SET ho_ten='$ho_ten', gioi_tinh='$gioi_tinh', ngay_sinh='$ngay_sinh',
            dia_chi='$dia_chi', sdt='$sdt', ma_dv='$ma_dv' WHERE ma_nv='$ma_nv'";
    if ($conn->query($sql)) echo "Đã cập nhật!";
    else echo "Lỗi: " . $conn->error;
}

$nv = $conn->query("SELECT * FROM nhanvien WHERE ma_nv='$ma_nv'")->fetch_assoc();
$dv = $conn->query("SELECT * FROM donvi");
?>

<h2>Sửa hồ sơ nhân viên</h2>
<form method="post">
    Họ tên: <input name="ho_ten" value="<?= $nv['ho_ten'] ?>"><br>
    Giới tính: 
    <select name="gioi_tinh">
        <option <?= $nv['gioi_tinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
        <option <?= $nv['gioi_tinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
    </select><br>
    Ngày sinh: <input type="date" name="ngay_sinh" value="<?= $nv['ngay_sinh'] ?>"><br>
    Địa chỉ: <input name="dia_chi" value="<?= $nv['dia_chi'] ?>"><br>
    SĐT: <input name="sdt" value="<?= $nv['sdt'] ?>"><br>
    Đơn vị:
    <select name="ma_dv">
        <?php while ($r = $dv->fetch_assoc()): ?>
            <option value="<?= $r['id'] ?>" <?= $r['id'] == $nv['ma_dv'] ? 'selected' : '' ?>>
                <?= $r['ten_khoa'] ?>
            </option>
        <?php endwhile; ?>
    </select><br>
    <input type="submit" value="Lưu">
</form>
