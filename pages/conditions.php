<a href="/">Go to main page</a>

<h1>Conditions</h1>

<?php

// Условия
$a = 1;
$b = 2;
$isAisBig = $a > $b;
//if ($isAisBig === true) {
//    echo 'A more then B';
//} else {
//    echo 'B more then A';
//}

$a = 2;
$b = 2;
$catAge = 1;

//if ($a === $b) { // Если тут правда то выполнится код в фигурных скобках
//    echo "A = B";
//    echo "<br>";
//} else { // а иначе выполнится то что в этих игурных скобках
//    echo "А !== B";
//    echo "<br>";
//}

// Логическое или. Если хотябы одно выражение правда то выполнится код в фигурных скобках
//     false     or       false         or     false           or    true
//if ( ($a > $b)   ||   ($a === $catAge)  ||  ($catAge === 12)   ||     1) { // true
//    echo "Одно из выражений было преобразовано в true, это строка выведется";
//    echo "<br>";
//}

$number = '87776665544';
$name = 'Rom';
$lastName = 'Belov';
$access = false;
// Логическое и. Если все выражения правда то выполнится код в фигурных скобках
//         true              and      true      and          false       and   false
//if ($number === '87776665544' && $name === 'Rom' && $lastName === 'Belov' && $access) {
//    echo 'Это строка не распечатается. Т.к. в $access содержится false';
//    echo "<br>";
//}
// тут можно писать любой другой код.
// код...
$person = 'Bob';
//if ($person === 'Bob') {
//    // тогда делаем что то полезное. Авторизуем ..., уведомляем ..., перечисляем деньги итд
//    echo "Yes, it's really $person";
//    echo "<br>";
//}


//if ($a === 2) { // если
//    echo 'True 2 = 2';
//    echo "<br>";
//}
// Конструкция else if не может быть отделена другим кодом от if. Но вместе с тем else if необязательная конструкция.
// else if можно использовать сколько угодно раз друг за другом
//else if ($a > 5) { // а  иначе если
//    echo 'True A > 5';
//    echo "<br>";
//}
//else if ($a < 5) { // а  иначе если
//    echo 'True A < 5';
//    echo "<br>";
//}
// Конструкция else не может быть отделена другим кодом от if или от else if. Но вместе с тем else необязательная конструкция.
// Можно использовать 1-ин раз в конце после всех условий.
//else { // Если ни одно условие выше не отработало тогода и только тогда отработает код в фигурны скобках
//    echo "Резервный вариант";
//    echo "<br>";
//}

$empty = null;
$false = false;
$emptyArray = [];
$badCondition = 100 < 1;
// каждое из этих выражений воспринимается PHP как false
//  false  or  false  or   false  or  false  or   false  or  false ...
//if (''     ||   0     ||   false  ||  null   ||    '0'   ||    []   || $empty  ||  $false  || $emptyArray ||  $badCondition) {
//    echo 'Эта строка не выведется, т.к. все выражения интерпретируются PHP как false';
//    echo "<br>";
//}



// ДЗ. Будет хорошо если каждый день сделайте по 1-му - 2-ва упражнениия. Думаю это будет эффективнее чем все за один раз.

// Есть переменная день недели и переменная текущий час равная например 20.
// Напишете программу которая будет проверять эти переменные и если:
// они содержат понедельник 20 и четверг 21 то программа выводит - иду на курсы.
// Если выпадает среда с любым временем то -  сижу дома ничего не делаю.
// Если пятница и время больше 18 то - иду в бар.
// Если пятница и время 2 - ищу дорогу домой.
// В остальные дни и время - работаю

//Есть переменная текущий час например 20.
// Напишите дневное расписание.
// Программа в зависимости от текущего часа должна выводить вашу деятельность.
// Ровно в 9 - подъем.
// С 9 до 10 не включительно - завтрак.
// С 11 до 13  не включительно - работа.
// С 13 до 14  не вкл- обед.
// С 14 до 18 - работа.
// С 18 до 22 - тренировки.
// Ровно в 23 - отбой.

// Есть переменная баланс счёта = 1000.
// Есть переменная ФИО = вашему ФИО или любое другое.
// Есть булева переменная прошел сканер сетчатки глаза.
// Напишите программу которая проверяет ФИО на полное совпадение с вашим именем фамилией и отчеством,
// также проверяет успешность пройденной проверки сетчатки глаза.
// Если все хорошо списывает со счета 300. Иначе выводит сообщение об ошибке.
// Конкретное понятное сообщение: или мы одну проверку не прошли или другую или обе не прошли.
// В любом случае в конце программа выводит текущий баланс.

// Есть переменная животное с рандомным зверем. Напишите следующий алгоритм.
// Если это кот то выводить иду кормить кота.
// Если там собака то иду гулять с собакой.
// Если там что-то другое нужно вывести что там и написать не знаю что с этим делать.

// Создайте страницу html.php опишите пару тегов html: p, b, i, h1-h6, br, hr, a.
// Если забыли какой тег что делает попробуйте загуглить.

// Создайте страницу conditions.php и перенесите туда всесь этот код.
// Пусть лучше на странице index.php будут просто ссылки ведущщие на другие тематические страницы

