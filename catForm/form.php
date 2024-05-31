<?php

require_once '../funcs.php';

// Это для отладки
debug($_GET);
echo "<hr>";

// Основная логика начинается отсюда
$successMessage = '';
$errorMessage = '';
$genderList = ['Girl', 'Boy']; // Варианты для дропдауна
$sociabilityList = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; // Варианты для дропдауна

if (validateGET()) {
    $catDataString = constructCatDataString();
    saveCat($catDataString);
    $successMessage = 'Вы успешно сохранили кота ' . getDataFromGET('name') . '!';
    //header('Location: /catform/form.php'); // Редирект на чистую форму
} else {
    if (!empty($_GET)) {
        $errorMessage = 'Заполните все данные по коту!';
    }
}

/**
 * Вернет котастроку с данными через запятую
 *
 * @return string
 */
function constructCatDataString(): string
{
    $catDataString = getDataFromGET('name') . ',' .
        getDataFromGET('age') . ',' .
        getDataFromGET('gender') . ',' .
        getDataFromGET('sociability');

    return $catDataString;
}

/**
 * Валидирует данные из $_GET
 *
 * @return bool
 */
function validateGET(): bool
{
    if (
        !empty(getDataFromGET('name')) &&
        !empty(getDataFromGET('age')) &&
        !empty(getDataFromGET('gender')) &&
        !empty(getDataFromGET('sociability'))
    ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Получить данные из $_GET по ключу $dataKey
 *
 * @param string $dataKey
 * @return string
 */
function getDataFromGET(string $dataKey): string
{
    if (!empty($_GET[$dataKey])) {
        return $_GET[$dataKey];
    }
    return '';
}

/**
 * Сохранит кота в файл
 *
 * @param string $catData - name,age,gender,sociability
 */
function saveCat(string $catData): void
{
    $file = 'cats.txt';
    $data = file_get_contents($file); // Получаем содержимое файла
    $data .= $catData . "\n";  // Добавляем нового кота в файл
    file_put_contents($file, $data); // Записываем содержимое обратно в файл
}

/**
 * Получить массив котов из файла
 *
 * @return array
 */
function getSavedCats(): array
{
    $cats = [];
    $catsAsString = file_get_contents('cats.txt'); // Получаем содержимое файла
    $rows = explode("\n", $catsAsString); // Строки с котами
    foreach ($rows as $stringCat) {
        if (!empty($stringCat)) {
            $catData = explode(",", $stringCat); // Кота конвертируем в массив с данными о коте
            $cats[] = [
                'name' => $catData[0],
                'age' => $catData[1],
                'gender' => $catData[2],
                'sociability' => $catData[3],
            ];
        }
    }
    return $cats;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Котаформа</title>
</head>
<body>
<h3>Котаформа</h3>
<div>
    <form method="GET" action="">
        <p>
            Cat name here:
            <input type="text" name="name" placeholder="Cat name!!!" value="<?php echo getDataFromGET('name'); ?>">
        </p>

        <p>
            Cat age here:
            <input type="text" name="age" placeholder="Cat age" value="<?php echo getDataFromGET('age'); ?>">
        </p>

        <p>
            Cat gender:
            <label>
                <select name="gender">
                    <?php
                    foreach ($genderList as $genderValue) {
                        $selected = '';
                        if ($genderValue == getDataFromGET('gender')) {
                            $selected = 'selected';
                        }
                        /*
                        if (empty(getDataFromGET('gender')) && $genderValue == 'Boy') {
                            $selected = 'selected';
                        }
                        */
                        echo "<option $selected value='$genderValue'>$genderValue</option>";
                    }
                    ?>
                </select>
            </label>
        </p>

        <p> Cat sociability:
            <select name="sociability">
                <?php
                foreach ($sociabilityList as $sociabilityValue) {
                    $selected = '';
                    if ($sociabilityValue == getDataFromGET('sociability')) {
                        $selected = 'selected';
                    }
                    /*
                    if (empty(getDataFromGET('sociability')) && $sociabilityValue == 5) {
                        $selected = 'selected';
                    }
                    */
                    echo "<option $selected value='$sociabilityValue'>$sociabilityValue</option>";
                }
                ?>
            </select>
        </p>

        <p>
            <input type="submit" value="Save this cat in DB">

            <a
                style="color: black; background: #ff0000; border: 1px solid #002bff; text-decoration: none; padding: 0px 10px"
                href="/catform/form.php"
            >
                Clear
            </a>
        </p>
        <?php
        // empty === true   // 0, false, null, '', '0', []
        if (!empty($successMessage)) {
            echo "<p style='color: green'>$successMessage</p>";
        }
        if (!empty($errorMessage)) {
            echo "<p style='color:red'> $errorMessage </p>";
        }
        ?>
    </form>
</div>
<hr>

<div>
    <h3>Saved cats:</h3>
    <?php
    $cats = getSavedCats();
    foreach ($cats as $cat) {
        // строка ... {$cat['name']} ... остальная строка ... // { ... } позволяют внедрить в строку сложные переменные
        $n = $cat['name'];
        echo "<p> 
                    Name: <b>$n</b>, 
                    Age: <b>" . $cat['age'] . "</b>, 
                    Gender: <b>{$cat['gender']}</b>, 
                    Sociability: <b>{$cat['sociability']}</b> 
            </p>";
    }
    ?>
</div>
</body>
</html>

<!--

ДЗ урока 11.

1) Любую задачу с кодварс. А лучше 3 задачи с кодварс

2) По аналогии с этой котаформой нужно создать свою, желательно какаую-нибудь
полезную или интересную вам.
Например форму для подсчета съеденных продуктов и калорий за день,
или форма для сохранения наиболее интересных вакансий с hh.ru
или форма для сохранения друзей и их телефонов,
или форма для сохранения данных о машинах,
или данных о странах.
Все что угодно, все что вам может пригодится или интересует вас.
Все инпуты, их тип, количество и логика работы формы все по вашему усмотрению.
Нужно обязательно сделать что бы данные из формы сохранялись в файл.
И сохраненные данные должны выводится на страницу!

-->


