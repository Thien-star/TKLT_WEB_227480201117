<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai12</title>
    <style>
        table {
        border-collapse: collapse;
        border: 2px solid black;
        }
        td {
        width: 50px;
        height: 50px;
        text-align: center;
        }
        .white {
        background-color: white;

        }
        .black {
        background-color: black;
 
        }
    </style>
</head>
<body>
    <table>
    <?php
    for ($row = 0; $row < 8; $row++) {
        echo "<tr>";
        for ($col = 0; $col < 8; $col++) {
        $class = (($row + $col) % 2 == 0) ? "black" : "white";
        echo "<td class='$class'></td>";
        }
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>