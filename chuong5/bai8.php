<!DOCTYPE html>
<html>
<head>
    <title>Danh sách năm</title>
</head>
<body>
    <h2>Năm</h2>
    <form method="post">
        <label for="year">Chọn năm:</label>
        <select name="year" id="year">
            <?php
            $currentYear = date("Y"); 
            for ($year = 1900; $year <= $currentYear; $year++) {
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select>
    </form>
</body>
</html>