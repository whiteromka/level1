<?php

require_once '../funcs.php';
require_once '../testauth/logic.php';

// Это для отладки
//debug($_GET);
//echo "<hr>";

// Основная логика начинается отсюда
$successMessage = '';
$errorMessage = '';
$genderList = ['Girl', 'Boy']; // Варианты для дропдауна
$sociabilityList = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; // Варианты для дропдауна

if (!empty($_GET)) {
    $validateResult = validateGET();
    if ($validateResult['success']) {
        $catDataString = constructCatDataString();
        saveCat($catDataString);
        $successMessage = 'Вы успешно сохранили кота ' . getDataFromGET('name') . '!';
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
 * @return array
 */
function validateGET(): array
{
//    if (
//        !empty(getDataFromGET('name')) &&
//        !empty(getDataFromGET('age')) &&
//        !empty(getDataFromGET('gender')) &&
//        !empty(getDataFromGET('sociability'))
//    ) {
//        return true;
//    } else {
//        return false;
//    }
    $errorName = '';
    $errorAge = '';
    if (!empty($_GET)) {
        if (strlen(getDataFromGET('name')) < 5 ) {
            $errorName = 'Имя кота слишком короткое';
        }
    }

    $age = (int) getDataFromGET('age');
    if (!is_int($age) || !($age < 50)) {
        $errorAge = 'Возраст кота должен быть числом меньше 50';
    }

    if (empty($errorName) && empty($errorAge)) {
        $success = true;
    } else {
        $success = false;
    }
    return [
        'success' => $success,
        'errorName' => $errorName,
        'errorAge' => $errorAge
    ];
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

<!-- Навигация по сайту -->
<div class="nav bg-dark">
    <div class="container">

        <ul class="nav bg-dark">
            <li class="nav-item">
                <a class="nav-link" href="/">Main page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/catform/form.php">Catform</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/bootstrap">Bootstrap grid</a>
            </li>
        </ul>

    </div>
</div>
<br>
<br>

<!-- Котаформа -->
<div class="container ">
    <p><?= greeting()?></p>

    <h3 class="text-center">Cat form</h3>
    <div>
        <form method="GET" action="">
            <div class="form-group">
                <label for="catNameInput">Cat name here</label>
                <input type="text" class="form-control" name="name" id="catNameInput"
                       value="<?php echo getDataFromGET('name'); ?>"
                >
                <p class="text-danger"> <?= $validateResult['errorName'] ?? ''?> </p>
            </div>
            <div class="form-group">
                <label for="catAgeInput">Cat age here</label>
                <input type="text" name="age" class="form-control" id="catAgeInput"
                       value="<?php echo getDataFromGET('age'); ?>"
                >
                <p class="text-danger"> <?= $validateResult['errorAge'] ?? '' ?> </p>
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
</div>


<!-- Вывод котов -->
<div class="container">
    <hr>
    <br>
    <h3 class="text-center">Saved cats:</h3>
    <div class="row">
        <?php
            $cats = getSavedCats();
            foreach ($cats as $cat) :
        ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card m-b-10">
                    <img src="../bootstrap/pic/cat1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $cat['name'] . ' (' . $cat['age'] . ')' ?> </h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of.</p>
                        <ul>
                            <li>Gender: <b> <?= $cat['gender'] ?> </b> </li>
                            <li>Sociability: <b> <?= $cat['sociability'] ?></b> </li>
                        </ul>
                        <a href="#" class="btn btn-primary">Заказать</a>
                    </div>
                </div>
            </div>
        <?php
            endforeach;
        ?>
    </div>
    <br>
</div>

<br>
<br>
<br>
<br>

</body>
</html>

<!--

ДЗ урока 13.

1) Любую задачу с кодварс

2) В котаформе забутстрапить инпуты и дропдауны с помощью сетки бутстрапа
   https://getbootstrap.ru/docs/4.4/layout/grid/ так чтобы:
  - на маленьких экранах, все элементы формы отображались друг под другом, т.е. занимали максимальную ширину
  - на средних экранах занимали выстраивались в 2-е колонки, т.е. занимали половину ширины экрана
  - на самых больших экранах все инпуты и дропдауны выстраивались в 1 ряд

  С кнопками сохранить кота и очистить форму так заморачиваться не нужно.
  Их можно просто  вынести в свой собственных отдельный div или класс row, пусть просто отдельно всегда будут.

3) Попробуйте сделать футер(низ) страницы по такому же принципу.
    Использую сетку бутстрапа расчертите разметку на 2-е или на 3-и колонки.
    В каждую колонку добавьте по 2-ве любые ссылки на любые сайты.
    - на маленьких экранах, все ссылки должны отображались друг под другом, т.е. занимать максимальную ширину
    - на средних выстраиваться в 2-е или 3-и колонки, т.е. либо половину ширины экрана либо треть
    - на больших в 3-и или четыре колонки


- Если заморочится с бутстрапом и все сделать аккуратно и красиво то этот микро проект можно будет добавить в портфолио
или показать на собесе как один из учебных проектов, будет маленький плюс вам.
- Если со стилями и бутстрапом не охото заморачиваться то можно забить, т.к. это просто разметка, правда в этом случае
я бы не рекомендовал показывать этот проект без готовой разметки и стилей.


-->
