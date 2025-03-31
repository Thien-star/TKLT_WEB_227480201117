<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính USCLN và BSCNN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fff;

        }
        .container {
            width: 350px;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            background-color: yellow;

        }
        h3 {
            margin: 0;
            padding: 5px;
            font-size: 18px;
            border-bottom: 1px solid black;
        }
        .input-group {
            display: flex;
            justify-content: space-between;
            margin: 10px 10px;
        }
        label {
            font-size: 16px;
            flex: 1;
            text-align: left;
        }
        input {
            flex: 2;
            padding: 5px;
            border: 1px solid black;
        }
        .button-group {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
            
        }
        button {
            width: 40%;
            padding: 8px;
            border: 1px solid black;
            cursor: pointer;
            font-size: 16px;
            background-color: aqua;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>TÍNH USCLN VÀ BSCNN</h3>
        <form method="post">
            <div class="input-group">
                <label for="so1">Số thứ 1:</label>
                <input type="number" name="so1" required>
            </div>
            <div class="input-group">
                <label for="so2">Số thứ 2:</label>
                <input type="number" name="so2" required>
            </div>
            <div class="input-group">
                <label for="ketqua">Kết quả:</label>
                <input type="text" name="ketqua" value="<?php echo isset($ketqua) ? $ketqua : ''; ?>" readonly>
            </div>
            <div class="button-group">
                <button type="submit" name="uscln">USCLN</button>
                <button type="submit" name="bscnn">BSCNN</button>
            </div>
        </form>

        <?php
        function USCLN($a, $b) {
            while ($b != 0) {
                $temp = $b;
                $b = $a % $b;
                $a = $temp;
            }
            return $a;
        }

        function BSCNN($a, $b) {
            return ($a * $b) / USCLN($a, $b);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $so1 = intval($_POST["so1"]);
            $so2 = intval($_POST["so2"]);
            
            if (isset($_POST["uscln"])) {
                $ketqua = USCLN($so1, $so2);
            } elseif (isset($_POST["bscnn"])) {
                $ketqua = BSCNN($so1, $so2);
            }
            echo "<script>document.getElementsByName('ketqua')[0].value = '$ketqua';</script>";
        }
        ?>
    </div>
</body>
</html>