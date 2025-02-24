<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if (isset($_GET['lang'])) {
    setcookie("lang", $_GET['lang'], time() + 15768000, "/"); 
    $_COOKIE['lang'] = $_GET['lang'];
}
$lang = $_COOKIE['lang'] ?? 'ukr';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['form_data'] = $_POST;
    if (!empty($_FILES['photo']['name'])) {
        $upload_dir = 'uploads/';
        $file_name = basename($_FILES['photo']['name']);
        $target_file = $upload_dir . $file_name;
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
        $_SESSION['photo'] = $target_file;
    }
}
$data = $_SESSION['form_data'] ?? [];
$photo = $_SESSION['photo'] ?? '';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title>Форма реєстрації</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 30px;

}

form {
    background: #fff;
    padding: 20px;
    border-radius: 4px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: auto;
}

input, select, textarea {
    width: 97%;
    padding: 7px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    width: 40%;
    display: block;
    margin: 20px auto; 
    text-align: center;
}


button:hover {
    background-color: #218838;
}

.flag {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.flag img {
    width: 40px;
    height: auto;
    margin: 0 10px;
    cursor: pointer;
}

h2 {
    text-align: center;
}
.flag img {
    width: 30px;
    height: 20px;
    margin: 5px;
    cursor: pointer;
}
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Логін: <input type="email" name="login" value="<?php echo $data['login'] ?? ''; ?>" required><br>
        Пароль: <input type="password" name="password" required><br>
        Пароль (ще раз): <input type="password" name="password2" required><br>
        Стать: 
        <input type="radio" name="gender" value="чоловік" <?php if (($data['gender'] ?? '') === 'чоловік') echo 'checked'; ?>> чоловік
        <input type="radio" name="gender" value="жінка" <?php if (($data['gender'] ?? '') === 'жінка') echo 'checked'; ?>> жінка<br>
        Місто: <select name="city">
            <option value="Житомир" <?php if (($data['city'] ?? '') === 'Житомир') echo 'selected'; ?>>Житомир</option>
            <option value="Київ" <?php if (($data['city'] ?? '') === 'Київ') echo 'selected'; ?>>Київ</option>
        </select><br>
        Улюблені ігри:<br>
        <input type="checkbox" name="games[]" value="футбол" <?php if (isset($data['games']) && in_array("монаполія", $data['games'])) echo 'checked'; ?>> монаполія<br>
        <input type="checkbox" name="games[]" value="шахи" <?php if (isset($data['games']) && in_array("волейбол", $data['games'])) echo 'checked'; ?>> волейбол<br>
        Про себе: <textarea name="about"><?php echo $data['about'] ?? ''; ?></textarea>
        <button type="submit">Зареєструватися</button>
    </form>

    <?php if (!empty($data)): ?>
    <h2>Результати:</h2>
    <p>Логін: <?php echo htmlspecialchars($data['login']); ?></p>
    <p>Пароль: <?php echo strlen($data['password']) . ' символів'; ?></p>
    <p>Стать: <?php echo htmlspecialchars($data['gender']); ?></p>
    <p>Місто: <?php echo htmlspecialchars($data['city']); ?></p>
    <p>Улюблені ігри: <?php echo isset($data['games']) ? implode(', ', $data['games']) : 'Немає'; ?></p>
    <p>Про себе: <?php echo nl2br(htmlspecialchars($data['about'])); ?></p>
<?php endif; ?>

<p>Вибрана мова: 
    <?php 
        switch ($lang) {
            case 'ukr':
                echo 'Українська';
                break;
            case 'pl':
                echo 'Польська';
                break;
            case 'de':
                echo 'Німецька';
                break;
            default:
                echo 'Англійська';
        }
    ?>
</p>

<div class="flag">
    <a href="?lang=ukr"><img src="Flag1.png" alt="UA"></a>
    <a href="?lang=eng"><img src="Flag2.png" alt="EN"></a>
    <a href="?lang=pl"><img src="Flag3.png" alt="PL"></a>
    <a href="?lang=de"><img src="Flag4.png" alt="DE"></a>
</div>

</body>
</html>

<br>
<button onclick="window.location.href='Lab2.php' ">На головну</button>

</body>
</html>

