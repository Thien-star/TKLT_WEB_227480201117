<?php
  require_once "connect_DB.php";

  if(isset($_POST['add'])){
    $manv = $_POST['manv'];
    $tennv = $_POST['tennv'];
    $chucvu = $_POST['chucvu'];
    $sdt = $_POST['sdt'];
    $mail = $_POST['mail'];

    //Kiểm tra mã nhân viên
    $check_manv = $conn->prepare("SELECT manv FROM lylich WHERE manv = ?");
    $check_manv->bind_param("s",$manv);
    $check_manv->execute();

    $manv_result = $check_manv->get_result();

    // Kiểm tra sdt đã tồn tại hay chưa
    $check_sdt = $conn->prepare("SELECT sdt FROM lylich WHERE sdt = ?");
    $check_sdt->bind_param("s",$sdt);
    $check_sdt->execute();

    $sdt_result = $check_sdt->get_result();

    // Kiểm tra email đã tồn tại hay chưa
    $check_email = $conn->prepare("SELECT mail FROM lylich WHERE mail = ?");
    $check_email->bind_param("s",$mail);
    $check_email->execute();

    $email_result = $check_email->get_result();

    if($manv_result->num_rows > 0){
      echo "Mã nhân viên '".$manv."' đã tồn tại!", "danger";
    }
    else if($sdt_result->num_rows > 0){
      echo "Số Điện thoại'".$sdt."' đã tồn tại!", "danger";
    }else if($email_result->num_rows > 0){
      echo "E-mail '".$mail."' đã tồn tại!", "danger";
    }else{
      // Prepared Statements (Câu lệnh được chuẩn bị trước) 
      $stmt = $conn->prepare("INSERT INTO lylich(manv,tennv,chucvu,sdt,mail) VALUES(?,?,?,?,?)");
      $stmt->bind_param("sssss",$manv, $tennv, $chucvu, $sdt, $mail);
      $result = $stmt->execute();

      if(!$result){
        echo "Thao tác thất bại".$conn->error;
    }
    }

    // Đóng các statement
    if(isset($check_manv)){
      $check_manv->close();
    }

    if(isset($check_sdt)){
      $check_sdt->close();
    }

    if(isset($check_email)){
      $check_email->close();
    }

    if(isset($stmt)){
      $stmt->close();
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
            <form action="employee_add.php" method="POST">
                <h1 style="text-align:center;">Thêm nhân viên</h1>
                <input class="form-control mb-2" type="text" name="manv" placeholder="Mã số nhân viên" required>
                <input class="form-control mb-2" type="text" name="tennv" placeholder="Tên nhân viên" required>
                <input class="form-control mb-2" type="text" name="chucvu" placeholder="Chức vụ" required>
                <input class="form-control mb-2" type="text" name="sdt" placeholder="Số điện thoại" required>
                <input class="form-control mb-2" type="text" name="mail" placeholder="E-Mail" required>
                <button class="btn btn-primary" type="submit" name="add">Thêm</button>
            </form>
            </div>
        </div>
        <?php include "footer.php"?>
    </div>
    <script src="script.js"></script>
</body>

</html>
