<?php
    require_once "connect_DB.php";

    // Xử lý xóa nhân viên
    if(isset($_GET['delete_id'])){
        $manv = $_GET['delete_id'];
        
        $stmt = $conn->prepare("DELETE FROM lylich WHERE manv = ?");
        $stmt->bind_param("s", $manv);
        $result = $stmt->execute();

        if(!$result){
            echo "Thao tác thất bại".$conn->error;
        }
    }

    // Lấy danh sách nhân viên
    $sql = "SELECT * FROM lylich";
    $result = mysqli_query($conn, $sql);
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
            <h2 class="mb-3 text-center">Danh sách nhân viên</h2>
            <?php if(mysqli_num_rows($result) > 0): ?>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Mã nhân viên</th>
                            <th>Tên nhân viên</th>
                            <th>Chức vụ</th>
                            <th>Số điện thoại</th>
                            <th>E-mail</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row['manv']; ?></td>
                                <td><?php echo $row['tennv']; ?></td>
                                <td><?php echo $row['chucvu']; ?></td>
                                <td><?php echo $row['sdt']; ?></td>
                                <td><?php echo $row['mail']; ?></td>
                                <td>
                                    <a href="employee_delete.php?delete_id=<?php echo $row['manv']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?');">Xóa</a>
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
