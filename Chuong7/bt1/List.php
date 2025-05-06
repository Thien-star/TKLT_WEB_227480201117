<?php
include 'Connection.php';

if (isset($_GET['table'])) {
    $table = $_GET['table'];

    switch($table) {
        case 'hanghoa':
            $sql = "SELECT * FROM HANGHOA";
            break;
        case 'khachhang':
            $sql = "SELECT * FROM KHACHHANG";
            break;
        case 'nhasanxuat':
            $sql = "SELECT * FROM NHASANXUAT";
            break;
        case 'hoadon':
            $sql = "SELECT * FROM HOADON";
            break;
        default:
            die("Bảng không hợp lệ!");
    }

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h2>Danh sách dữ liệu</h2>";
        echo "<table border='1' cellpadding='10'>";
        $first_row = mysqli_fetch_assoc($result);
        echo "<tr>";
        foreach ($first_row as $col => $val) {
            echo "<th>$col</th>";
        }
        echo "</tr>";

        // In dòng đầu tiên
        echo "<tr>";
        foreach ($first_row as $val) {
            echo "<td>$val</td>";
        }
        echo "</tr>";

        // In các dòng còn lại
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $val) {
                echo "<td>$val</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu hoặc lỗi SQL!";
    }

} else {
    echo "Bạn chưa chọn bảng để hiển thị!";
}

mysqli_close($conn);
?>