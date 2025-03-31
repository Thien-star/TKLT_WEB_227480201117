<!DOCTYPE html>
<html>
<head>
    <title>Xử lý Ma Trận</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Xử lý Ma Trận</h1>

    <?php
    $matrix = array(
        array(1.1, 2.3, 3.1, 4.0, 5.0),
        array(6.2, 7.7, 8.8, 9.5, 1.2),
        array(4.6, 1.9, 3.6, 8.9, 1.5),
        array(1.6, 1.7, 1.8, 1.9, 2.0)
    );

    function timSoLonNhat($mang) {
        $max = $mang[0][0];
        for ($i = 0; $i < count($mang); $i++) {
            for ($j = 0; $j < count($mang[$i]); $j++) {
                if ($mang[$i][$j] > $max) {
                    $max = $mang[$i][$j];
                }
            }
        }
        return $max;
    }

    function timSoNhoNhat($mang) {
        $min = $mang[0][0];
        for ($i = 0; $i < count($mang); $i++) {
            for ($j = 0; $j < count($mang[$i]); $j++) {
                if ($mang[$i][$j] < $min) {
                    $min = $mang[$i][$j];
                }
            }
        }
        return $min;
    }

    function tinhTongMaTran($mang) {
        $tong = 0;
        for ($i = 0; $i < count($mang); $i++) {
            for ($j = 0; $j < count($mang[$i]); $j++) {
                $tong += $mang[$i][$j];
            }
        }
        return $tong;
    }

    function inMaTranDangBang($mang) {
        echo "<table>";
        foreach ($mang as $hang) {
            echo "<tr>";
            foreach ($hang as $phanTu) {
                echo "<td>" . $phanTu . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    if (isset($_POST['choice'])) {
        $choice = $_POST['choice'];

        switch ($choice) {
            case 1:
                echo "<p>Số lớn nhất: " . timSoLonNhat($matrix) . "</p>";
                break;
            case 2:
                echo "<p>Số nhỏ nhất: " . timSoNhoNhat($matrix) . "</p>";
                break;
            case 3:
                echo "<p>Tổng các số: " . tinhTongMaTran($matrix) . "</p>";
                break;
            case 4:
                echo "<p>Ma trận:</p>";
                inMaTranDangBang($matrix);
                break;
            default:
                echo "<p>Lựa chọn không hợp lệ.</p>";
        }
    }
    ?>

    <form method="post">
        <label for="choice">Chọn chức năng:</label>
        <select name="choice" id="choice">
            <option value="1">Tìm số lớn nhất</option>
            <option value="2">Tìm số nhỏ nhất</option>
            <option value="3">Tính tổng các số</option>
            <option value="4">In ma trận</option>
        </select>
        <button type="submit">Thực hiện</button>
    </form>
</body>
</html>