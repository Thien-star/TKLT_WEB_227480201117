<?php
    require_once "connect_DB.php";
    $sql = "SELECT manv,tennv,chucvu,luong FROM lylich";
    $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="giaodien.css" type="text/css">
    <link rel="stylesheet" href="navigation.css" type="text/css">
</head>

<body>
    <div class="web">
      <?php include "header.php"?>
        <div class="content">
            <div class="hinh">
              <?php include "accordion.php"?>
            </div>
            <div class="baclieu"> 
            <?php if(mysqli_num_rows($result) > 0): ?>
                <table style="text-align:center;border:1px solid #000; border-collapse: collapse;" class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th style="border:1px solid #000;">Mã nhân viên</th>
                            <th style="border:1px solid #000;">Tên nhân viên</th>
                            <th style="border:1px solid #000;">Chức vụ</th>
                            <th style="border:1px solid #000;">Lương</th>
                            <th style="border:1px solid #000;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td style="border:1px solid #000;"><?php echo $row['manv']; ?></td>
                                <td style="border:1px solid #000;"><?php echo $row['tennv']; ?></td>
                                <td style="border:1px solid #000;"><?php echo $row['chucvu']; ?></td>
                                <!-- 0: số chữ số sau dấu thập phân (ở đây là không có phần thập phân)
                                ',': ký tự dùng làm dấu thập phân (nếu bạn để 0 chữ số thì ký tự này không hiển thị)
                                '.': ký tự ngăn cách hàng nghìn -->
                                <td style="border:1px solid #000;"><?php echo number_format($row['luong'], 0, ',', '.'); ?></td>
                                <td style="border:1px solid #000;">
                                    <a href="salary_update.php?id=<?php echo $row['manv']; ?>" class="btn btn-primary">Cập nhật</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <div class="alert alert-info">Không có nhân viên trong CSDL.</div>
                <?php endif; ?>
            </div>
        </div>
        <?php include "footer.php"?>
    </div>
    <script src="script.js"></script>
</body>

</html>
