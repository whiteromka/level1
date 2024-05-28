<?php

require_once '../funcs.php';

echo 'GET' . '<br>';
debug($_GET);

$name = '';
$pass = '';

if (!empty($_GET) && array_key_exists('name', $_GET)) {
    $name = $_GET['name'];
}

if (!empty($_GET) && array_key_exists('password', $_GET)) {
    $pass = $_GET['password'];
}

echo "<hr>";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h2>My Form</h2>
        <form method="GET" action="">
            <p>
                <!-- Обычный инпут. Атрибут type="" может принимать несколько значений "text", "email", "password", "submit", "reset" -->
                <b>Ваше имя:</b>
                <br>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </p>

            <p>
                <!-- Обычный инпут -->
                <b>Ваше пароль:</b>
                <br>
                <input type="text" name="password" value="<?php echo $pass; ?>">
            </p>

            <!-- Селект или дропдаун -->
            <p>Любымый персонаж</p>
            <?php
                $heroList = ['Чебурашка', 'Крокодил Гена'];
            ?>
            <select name="hero">
                <option value=""></option>
                <?php
                    foreach ($heroList as $hero) {
                        $selected = '';
                        if ($hero === $_GET['hero']) {
                            $selected = 'selected';
                        }
                        echo "<option $selected value='$hero'>$hero</option>";
                    }
                ?>
            </select>

            <p>
                <!-- Чекбокс -->
                <input type="checkbox" name="isOld" value="1"> Вам есть 18
            </p>

            <!-- Текстареа -->
            <textarea name="comment" cols="40" rows="2"></textarea>

            <!-- Радиобаттоны -->
            <p>
                <b>Каким браузером в основном пользуетесь:</b><Br>
                <input type="radio" name="browser" value="ie"> Internet Explorer<Br>
                <input type="radio" name="browser" value="opera"> Opera<Br>
                <input type="radio" name="browser" value="firefox"> Firefox<Br>
            </p>

            <p>
                <!-- Кнопка отправить и очистить -->
                <input type="submit" value="Отправить">
                <input type="reset" value="Очистить">
            </p>
        </form>
    </div>

    <div>
        <h2>Результат</h2>
        <p>Имя пользователя: <?php echo $name; ?> </p>
    </div>
</body>
</html>

<?php

// ДЗ урок 9

// Создайте php файл myForm.php. В самом верху файла будет основная секция c логикой для php.
// Скопируйте этот массив туда.
$products = [
    ['product' => 'Iphone 1', 'price' => 100],
    ['product' => 'Iphone 2', 'price' => 200],
];

// Ниже должна быть html форма в которой будет находится форма со следюющими полями:
// "Название продукта", "стоимость", чекбокс - "добавить продукт" и кнопка отправить

// Нужно написать html и логику обработки формы так что бы форма отправлялась на эту же страницу,
// поймать данные и вывести их на страницу.

// В случае если чекбокс нажат то в массив $products нужно добавить новый полученный из формы продукт.
// В html разметку внедрите блок php и там циклом выведите все продукты, включая только что преданный из формы продукт.

?>


