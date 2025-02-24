<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завдання 4 - Робота з функціями</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Введіть значення x та y</h2>
    <form action="calculate.php" method="POST">
        <label for="x">x:</label>
        <input type="number" name="x" required>
        <br>
        <label for="y">y:</label>
        <input type="number" name="y" required>
        <br>
        <button type="submit">Обчислити</button>
    </form>
    <br>
    <button onclick="window.location.href='Lab2.php'">На головну</button>
</body>
</html>
