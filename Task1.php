<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Робота з рядками в PHP</title>
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            background: white;
            width: 50%;
            padding: 20px;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 80%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 50%;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
        p {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
    </style>

<h2>Заміна символів у тексті</h2>
<form method="post">
    <label>Текст: <input type="text" name="text"></label><br>
    <label>Знайти: <input type="text" name="find"></label><br>
    <label>Замінити: <input type="text" name="replace"></label><br>
    <input type="submit" name="replace_submit" value="Замінити">
</form>
<?php
if (isset($_POST['replace_submit'])) {
    $text = $_POST['text'];
    $find = $_POST['find'];
    $replace = $_POST['replace'];
    echo "<p>Результат: " . str_replace($find, $replace, $text) . "</p>";
}
?>

<h2>Сортування міст</h2>
<form method="post">
    <label>Міста через пробіл: <input type="text" name="cities"></label>
    <input type="submit" name="sort_submit" value="Сортувати">
</form>
<?php
if (isset($_POST['sort_submit'])) {
    $cities = explode(" ", trim($_POST['cities']));
    sort($cities);
    echo "<p>Відсортовані міста: " . implode(" ", $cities) . "</p>";
}
?>

<h2>Виділення імені файлу без розширення</h2>
<form method="post">
    <label>Повний шлях до файлу: <input type="text" name="filepath"></label>
    <input type="submit" name="file_submit" value="Обробити">
</form>
<?php
if (isset($_POST['file_submit'])) {
    $filepath = trim($_POST['filepath']);
    $filename = pathinfo($filepath, PATHINFO_FILENAME);
    echo "<p>Ім'я файлу: $filename</p>";
}
?>

<h2>Різниця між датами</h2>
<form method="post">
    <label>Дата 1 (дд-мм-рррр): <input type="text" name="date1"></label><br>
    <label>Дата 2 (дд-мм-рррр): <input type="text" name="date2"></label><br>
    <input type="submit" name="date_submit" value="Обчислити">
</form>
<?php
if (isset($_POST['date_submit'])) {
    $date1 = DateTime::createFromFormat('d-m-Y', $_POST['date1']);
    $date2 = DateTime::createFromFormat('d-m-Y', $_POST['date2']);
    if ($date1 && $date2) {
        $interval = $date1->diff($date2);
        echo "<p>Кількість днів між датами: " . $interval->days . "</p>";
    } else {
        echo "<p>Некоректний формат дати</p>";
    }
}
?>

<h2>Генератор паролів</h2>
<form method="post">
    <label>Довжина пароля: <input type="number" name="length" min="4" max="20"></label>
    <input type="submit" name="password_submit" value="Згенерувати">
</form>
<?php
if (isset($_POST['password_submit'])) {
    function generatePassword($length) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        return substr(str_shuffle($chars), 0, $length);
    }
    echo "<p>Згенерований пароль: " . generatePassword($_POST['length']) . "</p>";
}
?>

<h2>Перевірка міцності пароля</h2>
<form method="post">
    <label>Введіть пароль: <input type="text" name="password"></label>
    <input type="submit" name="check_password" value="Перевірити">
</form>
<?php
if (isset($_POST['check_password'])) {
    function isStrongPassword($password) {
        return preg_match('/[A-Z]/', $password) &&
               preg_match('/[a-z]/', $password) &&
               preg_match('/[0-9]/', $password) &&
               preg_match('/[\W_]/', $password) &&
               strlen($password) >= 8;
    }
    echo isStrongPassword($_POST['password']) ? "<p>Пароль міцний</p>" : "<p>Пароль слабкий</p>";
}

?>

<br>
<button onclick="window.location.href='Lab2.php' ">На головну</button>

</body>
</html>
