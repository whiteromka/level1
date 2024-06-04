<?php

require_once '../funcs.php';

// Это для отладки
//debug($_GET);
//echo "<hr>";

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
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</head>
<body>

<div class="container myCont">

    <div class="row myRow">
        <div class="col myCol">1 из 2</div>
        <div class="col myCol">2 из 2</div>
    </div>

    <div class="row myRow">
        <div class="col-1 myCol">1 из 3</div>
        <div class="col-2 myCol">2 из 3</div>
        <div class="col-9 myCol">3 из 3</div>
    </div>

    <div class="row myRow">
        <div class="col myCol">1 из 1</div>
    </div>

    <h3 class="header">Котаформа</h3>
    <div>
        <form method="GET" action="">
            <div class="form-group">
                <label for="catNameInput">Cat name here</label>
                <input type="text" class="form-control" name="name" id="catNameInput"
                       value="<?php echo getDataFromGET('name'); ?>">
            </div>
            <div class="form-group">
                <label for="catAgeInput">Cat age here</label>
                <input type="text" name="age" class="form-control" id="catAgeInput"
                       value="<?php echo getDataFromGET('age'); ?>">
            </div>
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

                        echo "<option $selected value='$sociabilityValue'>$sociabilityValue</option>";
                    }
                    ?>
                </select>
            </p>

            <p>
                <input type="submit" class="btn btn-outline-primary" value="Save this cat in DB">
                <a class="btn btn-outline-secondary" href="/catform/form.php">Clear</a>
            </p>
            <?php
            // empty === true   // 0, false, null, '', '0', []
            if (!empty($successMessage)) {
                echo '<div class="alert" style="background: #a1f85b" role="alert">
                   ' . $successMessage . '
                </div>';
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
</div>
</body>
</html>

<!--

ДЗ урока 12.

1) Любую задачу с кодварс

2) В котаформе нужно домучать 2-ва инпута, "Cat gender" и "Cat sociability". Преобразовать их в бутстраповкие инпуты-дропдауны

3 а) Блоке где выводятся сохраненные коты "Saved cats". Нужно переписать этот блок так что бы все сохраненные коты выводились
как в этом примере с бутстрап уведомленими https://getbootstrap.ru/docs/4.4/components/alerts/
Т.е.  каждого кота выводить в отдельном блоке-уведомлении со своим цветом.
Коты у которых социальность выше 7 должны выводиться в зеленом блоке.
Коты у которых социальность ниже 2 должны выводиться в сером блоке.
Коты у которых социальность от 2 до 3 должны выводиться в красном блоке.
Чтонибуть похожее с синим и желтым блоком, на ваш вкус.

3 б) Если уверены в своих силах можно попробовать вывести котов через карточки https://getbootstrap.ru/docs/4.4/components/card/ и систему сеток https://getbootstrap.ru/docs/4.4/layout/grid/


4) https://getbootstrap.ru/docs/4.4/components/alerts/  просмотреть примеры / прокликать ссылки в левом вертикальном меню компонентов бутстрапа.


-->
