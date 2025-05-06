<?php
    require_once "connect_DB.php";
    $sql = "SELECT manv, tennv, chucvu, luong FROM lylich";
    $result = mysqli_query($conn, $sql);

    function tinhThuong($chucvu) {
        switch (strtolower($chucvu)) {
            case 'trưởng khoa':
                return 2000000;
            case 'phó khoa':
                return 1500000;
            default:
                return 1000000;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính thưởng</title>
    <link rel="stylesheet" href="giaodien.css" type="text/css">
    <link rel="stylesheet" href="navigation.css" type="text/css">
</head>
<body>
    <div class="web">
        <?php include "header.php"; ?>
        <div class="content">
            <div class="hinh">
                <?php include "accordion.php"; ?>
            </div>
            <div class="baclieu"> 
                <h2 style="text-align:center; margin-bottom: 20px;">TÍNH THƯỞNG NHÂN VIÊN</h2>
                <?php if(mysqli_num_rows($result) > 0): ?>
                <table style="text-align:center; border:1px solid #000; border-collapse: collapse;" class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th style="border:1px solid #000;">Mã nhân viên</th>
                            <th style="border:1px solid #000;">Tên nhân viên</th>
                            <th style="border:1px solid #000;">Chức vụ</th>
                            <th style="border:1px solid #000;">Lương</th>
                            <th style="border:1px solid #000;">Thưởng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)): 
                            $thuong = tinhThuong($row['chucvu']);
                        ?>
                            <tr>
                                <td style="border:1px solid #000;"><?php echo $row['manv']; ?></td>
                                <td style="border:1px solid #000;"><?php echo $row['tennv']; ?></td>
                                <td style="border:1px solid #000;"><?php echo $row['chucvu']; ?></td>
                                <td style="border:1px solid #000;"><?php echo number_format($row['luong'], 0, ',', '.'); ?></td>
                                <td style="border:1px solid #000; color:green;"><strong><?php echo number_format($thuong, 0, ',', '.'); ?></strong></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <div class="alert alert-info">Không có nhân viên trong CSDL.</div>
                <?php endif; ?>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
