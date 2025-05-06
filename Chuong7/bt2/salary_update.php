<?php
    require_once "connect_DB.php";


    // Khởi tạo biến $row tránh lỗi khi chưa có dữ liệu
    $row = null;
    $error_message = "";

    //xử lý cập nhật
    if(isset($_POST['update'])){
        $manv = $_POST['manv'];
        $luong = $_POST['luong'];

        $sql = "UPDATE lylich SET luong = '$luong' WHERE manv='$manv'";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo "<script>
                    alert('Cập nhật THÀNH CÔNG!');
                    window.location.href = 'salary_list.php';
                </script>";
            exit;
        }else{
            echo "<script>alert('Cập nhật THẤT BẠI!'".mysqli_error($conn)."</script>";
        }
    }

    // Lấy dữ liệu nhân viên từ id trên URL
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $manv = $_GET['id'];

        $sql = "SELECT * FROM lylich WHERE manv='$manv'";
        $result = mysqli_query($conn,$sql);

        if($result){
            $row = mysqli_fetch_assoc($result);
        }else{
            $error_message = "Không tìm thấy nhân viên với mã $manv!";
        }
    }else {
        $error_message = "Không có mã nhân viên được cung cấp!";
    }
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
            <?php if(!empty($error_message)): ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
                <br>
                <a href="employee_list.php" class="btn btn-primary mt-2">Quay lại danh sách</a>
            </div>
        <?php elseif($row): ?>
            <form action="salary_update.php?id=<?php echo $row['manv'];?>" method="POST">
                <h1 style="text-align:center;">Sửa thông tin lương</h1>
                
                <!-- Truyền mã nhân viên ẩn để xử lý -->
                <input type="hidden" name="manv" value="<?php echo $row['manv']; ?>">
                <input class="form-control mb-2" type="text" name="manv" placeholder="Mã nhân viên" value="<?php echo $row['manv']; ?>" readonly>
                <input class="form-control mb-2" type="text" name="tennv" placeholder="Tên nhân viên" value="<?php echo $row['tennv']; ?>" readonly>
                <input class="form-control mb-2" type="text" name="chucvu" placeholder="Chức vụ" value="<?php echo $row['chucvu']; ?>" readonly>
                <input class="form-control mb-2" type="text" name="luong" placeholder="Lương" value="<?php echo $row['luong']; ?>" required>
                
                <button class="btn btn-primary" type="submit" name="update">Cập nhật</button>
                <a href="salary_list.php" class="btn btn-secondary">Quay lại</a>
            </form>
        <?php endif; ?>
            </div>
        </div>
    <?php include "footer.php"?>
    </div>
    <script src="script.js"></script>
</body>
</html>
