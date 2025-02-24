<?php
require 'Function/func.php'; 

$x = isset($_POST['x']) ? (int) $_POST['x'] : 0;
$y = isset($_POST['y']) ? (int) $_POST['y'] : 0;

$xy_factorial = factorial($x * $y);
$my_tg_x = my_tg($x);
$sin_x = sin($x);
$cos_x = cos($x);
$tg_x = tan($x);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результати</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Результати обчислень:</h2>
    <table border='1' style='border-collapse: collapse; text-align: center;'>
        <tr>
            <th>x·y!</th> <th>my_tg(x)</th> <th>sin(x)</th> <th>cos(x)</th> <th>tg(x)</th>
        </tr>
        <tr>
            <td><?php echo $xy_factorial; ?></td>
            <td><?php echo $my_tg_x; ?></td>
            <td><?php echo $sin_x; ?></td>
            <td><?php echo $cos_x; ?></td>
            <td><?php echo $tg_x; ?></td>
        </tr>
    </table>
    <br>
    <button onclick="window.location.href='index.php'">Назад</button>
</body>
</html>
