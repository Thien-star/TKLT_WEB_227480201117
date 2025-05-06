<?php
    require_once "connect_DB.php";

    // Mặc định không hiển thị kết quả
    $result = null;
    $search = "";

    // Xử lý khi form được submit
    if(isset($_POST['submit'])){

        // Làm sạch dữ liệu đầu vào
        $search = mysqli_real_escape_string($conn,$_POST['input_search']);

        // Truy vấn
        $sql = "SELECT * FROM lylich WHERE luong LIKE '%$search%'
                                    OR manv LIKE '%$search%'";
        $result = mysqli_query($conn,$sql);

        if(!$result || mysqli_num_rows($result) < 0){
            echo "Không tìm thấy kết quả cho '{$search}'","danger";
        }
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
            <form action="salary_search.php" method="POST">
                <h1 style="text-align:center;">Tìm kiếm nhân viên theo lương</h1>
                <input class="form-control mb-2" type="text" name="input_search" placeholder="Nhập mức lương" required>
                <button class="btn btn-primary" type="search" name="submit">Tìm</button>
            </form>
            <?php if(isset($_POST['search'])): ?>
                <div class="mt-3">
                    <h5>Kết quả tìm kiếm cho <?php htmlspecialchars($_POST['search']); ?></h5>
                </div>
            <?php endif; ?>

            <?php if(isset($result) && mysqli_num_rows($result) > 0): ?>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th style="border:1px solid green; text-align:center;">Mã nhân viên</th>
                            <th style="border:1px solid green; text-align:center;">Tên nhân viên</th>
                            <th style="border:1px solid green; text-align:center;">Chức vụ</th>
                            <th style="border:1px solid green; text-align:center;">E-mail</th>
                            <th style="border:1px solid green; text-align:center;">Lương</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td style="border:1px solid green;"><?php echo $row['manv']; ?></td>
                                <td style="border:1px solid green;"><?php echo $row['tennv']; ?></td>
                                <td style="border:1px solid green;"><?php echo $row['chucvu']; ?></td>
                                <td style="border:1px solid green;"><?php echo $row['mail'] ?></td>
                                <td style="border:1px solid green;"><?php echo $row['luong']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                    </tbody>
                </table>
                <?php elseif($result !== null && mysqli_num_rows($result) === 0): ?>
                    <div class="alert alert-info">Không tìm thấy kết quả.</div>
                <?php endif; ?>
            </div>
        </div>
        <?php include "footer.php"?>
    </div>
    <script src="script.js"></script>
</body>

</html>
