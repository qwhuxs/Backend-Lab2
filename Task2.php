<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Робота з масивами в PHP</title>
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
        pre {
            background: #f8f8f8;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Елементи масиву, що повторюються</h2>
    <?php
    function findDuplicateElements($array) {
        $duplicates = array();
        $counts = array_count_values($array);
        foreach ($counts as $key => $value) {
            if ($value > 1) {
                $duplicates[] = $key;
            }
        }
        return $duplicates;
    }

    $array = [1, 2, 3, 2, 4, 5, 6, 3, 7];
    $duplicates = findDuplicateElements($array);
    echo "<p>Повторювані елементи: " . implode(", ", $duplicates) . "</p>";
    ?>
</div>

<div class="container">
    <h2>Генератор імен для тварин</h2>
    <?php
    function generateAnimalName($syllables) {
        $name = '';
        for ($i = 0; $i < rand(2, 4); $i++) {
            $name .= $syllables[array_rand($syllables)];
        }
        return ucfirst($name);
    }

    $syllables = ['Mi', 'Zo', 'Ra', 'Ki', 'Be', 'Ta', 'Do'];
    $animalName = generateAnimalName($syllables);
    echo "<p>Згенероване ім'я для тварини: " . $animalName . "</p>";
    ?>
</div>

<div class="container">
    <h2>Злиття та сортування масивів</h2>
    <?php
    function createArray() {
        $length = rand(3, 7);
        $array = [];
        for ($i = 0; $i < $length; $i++) {
            $array[] = rand(10, 20);
        }
        return $array;
    }

    function mergeAndSortArrays($array1, $array2) {
        $merged = array_merge($array1, $array2);
        $merged = array_unique($merged);
        sort($merged);
        return $merged;
    }

    $array1 = createArray();
    $array2 = createArray();
    $mergedSorted = mergeAndSortArrays($array1, $array2);

    echo "<p>Масив 1: " . implode(", ", $array1) . "</p>";
    echo "<p>Масив 2: " . implode(", ", $array2) . "</p>";
    echo "<p>Об'єднаний і відсортований масив: " . implode(", ", $mergedSorted) . "</p>";
    ?>
</div>

<div class="container">
    <h2>Сортування асоціативного масиву</h2>
    <?php
    function sortAssociativeArray($array, $sortBy = 'name') {
        if ($sortBy == 'age') {
            asort($array);
        } else {
            ksort($array);
        }
        return $array;
    }

    $users = [
        'John' => 25,
        'Anna' => 22,
        'Peter' => 29,
        'Mark' => 24
    ];

    $sortedByAge = sortAssociativeArray($users, 'age');
    $sortedByName = sortAssociativeArray($users, 'name');

    echo "<p>Сортування за віком: <pre>" . print_r($sortedByAge, true) . "</pre></p>";
    echo "<p>Сортування за іменем: <pre>" . print_r($sortedByName, true) . "</pre></p>";
    ?>
</div>

<br>
<button onclick="window.location.href='Lab2.php' ">На головну</button>

</body>
</html>
