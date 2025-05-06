<?php
  require_once "connect_DB.php";

//   Lương trong tháng = Lương thỏa thuận / số ngày làm việc trong tháng x số ngày công thực tế
    if(isset($_POST['submit'])){
        $manv = $_POST['manv'];
        $luongcoban = $_POST['luongcoban'];
        $ngaylamchuan = $_POST['ngaylamchuan'];
        $congthucte = $_POST['congthucte'];

        $luong = $luongcoban / $ngaylamchuan * $congthucte;

        // Kiểm tra mã nhân viên có tồn tại hay không
        $check_manv = "SELECT * FROM lylich WHERE manv='$manv'";
        $check_result = mysqli_query($conn,$check_manv);

        if(mysqli_num_rows($check_result) > 0){
            // Nếu mã nhân viên có tồn tại thì cập nhật lương
            $sql = "UPDATE lylich SET luong = $luong WHERE manv = '$manv'";
            $result = mysqli_query($conn,$sql);

            if($result){
                //Reset dữ liệu trong Form
                unset($_POST['manv']);
                unset($_POST['luongcoban']);
                unset($_POST['ngaylamchuan']);
                unset($_POST['congthucte']);
                unset($luong);
            }else{
                echo "Tính lương THẤT BẠI! ".$conn->error,"danger";
            }
        }else{
            echo "Mã nhân viên ".$manv." không tồn tại","danger",1000;
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
            <form action="salary_calculate.php" method="POST">
                <h1 style="text-align:center;">Tính lương</h1>
                <input class="form-control mb-2" type="text" name="manv" placeholder="Mã nhân viên" required>
                <input class="form-control mb-2" type="text" name="luongcoban" placeholder="Lương cơ bản" required value="<?php echo isset($_POST['luongcoban']) ? htmlspecialchars($_POST['luongcoban']) : '' ?>">
                <input class="form-control mb-2" type="text" name="ngaylamchuan" placeholder="Số ngày làm làm việc chuẩn" required value="<?php echo isset($_POST['ngaylamchuan']) ? htmlspecialchars($_POST['ngaylamchuan']) : ''; ?>">
                <input class="form-control mb-2" type="text" name="congthucte" placeholder="Số ngày công thực tế" required value="<?php echo isset($_POST['congthucte']) ? htmlspecialchars($_POST['congthucte']) : ''; ?>">
                <input class="form-control mb-2" type="text" name="luong" placeholder="Lương" readonly value="<?php echo isset($luong) && $luong > 0 ? number_format($luong,0,',','.') : '';?>">
                <button class="btn btn-primary" type="submit" name="submit" >Tính</button>
            </form>
            </div>
        </div>
        <?php include "footer.php"?>
    </div>
    <script src="script.js"></script>
</body>

</html>
