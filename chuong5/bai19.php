<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bai19</title>
</head>
<body>
<?php
    echo "<h1>Chào bạn,</h1>";

    if (isset($_COOKIE['thoiGianTruyCap'])) {
        echo "<p>Thời gian truy cập gần đây nhất là: " . date('d/m/Y H:i:s', $_COOKIE['thoiGianTruyCap']) . "</p>";
    } else {
        echo "<p>Bạn chưa truy cập trang web lần nào.</p>";
    }

    setcookie('thoiGianTruyCap', time(), time() + 600); 
    ?>
</body>
</html>