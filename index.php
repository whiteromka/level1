<?php
    // require './emailValidator.php'; // простое, строгое подключение файла
    // include './emailValidator.php'; // простое, не строгое подключение файла
    // include_once './emailValidator.php'; // стандартное, строгое подключение файла

    require_once './funcs.php'; // стандартное, строгое подключение файла
    require_once './testauth/logic.php';
    require_once './emailValidator.php';
?>
<p><?= greeting()?></p>
<a href="/pages/variables.php">Variables</a>
<br>
<a href="/pages/conditions.php">Conditions</a>
<br>
<a href="/pages/custom-functions.php">custom-functions</a>
<br>
<a href="/pages/cycles.php">Cycles</a>
<br>
<?php

//$email = 'asf@dgrfdg.re';
//$isEmail = isEmail($email);
//var_dump($isEmail);


function xrange($start, $limit, $step = 1)
{
    if ($start <= $limit) {
        if ($step <= 0) {
            throw new LogicException('Шаг должен быть положительным');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Шаг должен быть отрицательным');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}

//$a = xrange(1,10, 1);
//foreach ($a as $number) {
//    echo "$number ";
//}

$a = null;
var_dump(empty($a));
var_dump(isset($a));

#######  ДЗ 8

// 1 зарегитрироваться на https://www.codewars.com/

// 2 https://www.codewars.com/kata/search/php?q=&r%5B%5D=-8&beta=false&order_by=sort_date%20desc - эта ссылка на самые просты PHP задачи,
// которые проверяют базовые знания по языку (встроенные функции, циклы, условия итд). Очень желательно каждый день решать по 1-ой задаче. Я просто по порядку все решал в свое время.

// 3 создайте папку "my" в корне проекта. В папке "my" создайте файл "myFuncs.php".
// 3.1 Внутри напишите функцию которая делает следующее. На вход принимает массив имен. Как пример массив может быть таким: ['Ahmed', 'Boby', 'Dina', 'Evgenya', 'Frodo']
// Функция должна каждое имя инвертировать т.е. написать задом наперед. Инвертированное имя должно начинаться с заглавной буквы,
// все остальные символы инвертированного имени не должны быть заглавными.
// Пример инверсии имени: 'Ahmed' >>>>> 'Demha'.
// Функция на выходе должна отдавать отсортированный по алфавиту массив инвертированных имен.
// Т.е. сначало нужно инвертировать все имена.
// Потом отсортировать в алфавитном порядке получившийся массив (google в помощь!)
// Используете контроль типов при описании функции и phpDock

// 3.2
// - Вызовите эту функцию в файле "index.php", предварительно подключив файл "myFuncs.php" в "index.php"
// - Возовите эту функцию в файле "cycles.php", предварительно подключив файл "myFuncs.php" в "cycles.php"

// Если кто где застрянет пишите мне!
?>