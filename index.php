<?php // Открывающий php тег. Только внутри php тегов php код может работать

// Переменные:

// Тип string - строки
$catName = "Forest";
$catLastName = 'Belov';
$empty = '';
$otherEmpty = "";
//echo "$catName is good cat"; // в двойных кавычках PHP видит переменные
//echo "<br>"; // вывести html тег <br> - перенос строки
//echo "<hr>"; // вывести html тег <hr> - горизонтальная черта

// Тип int integer - целые числа
$someNumber = 1243;
$otherNumber = 0;
$otherSomeNumber = -235565751;
//echo $otherSomeNumber;
//echo "<br>";
////echo "<br>";
//echo "<hr>";

// Тип float - 0.123  0.00001 32443543.3432
$balance = 25.5;
$rubles = 1000.21;
//echo $rubles;
//echo "<br>";
//var_dump($rubles);

// Тип bool boolean - логические значения. Может быть всего 2-ва значения: правда/ложь
$isOk = true; // правда
$isSuccess = false; // ложь
$success = true;
//echo $isSuccess;

// null - вселенская пустота - когда нет значения
$pesron;
$pesron = null;
//echo null;
//echo "<br>";
//echo $pesron;


// Массивы, списки - списки значений
$userList = [];
$hobbies = ['painting', 'reading', 'coding'];
$numbers = [1, 2, 3, 4, 6, 8, 90, 21, 4, 5, 7, 98];
$balances = [333.4, 3454.56, 666.1];
$x = [1, null, 12434.435, 'Rom', true]; // bad
//echo $hobbies; // так нельзя вывести массив, потом узнаем как можно
//var_dump($hobbies); // для отладки можно посмотреть массив через var_dump()


// ОПЕРАЦИИ НАД ПЕРЕМЕННЫМИ

// конкатенация - сложение строк
$boy = 'Rom';
$girl = 'Ira';
$someText = ' + ';
$text = $boy . $someText . $girl;
//     'Rom'   ' + '       'Ira'
//     'Rom      +          Ira';
//echo $text;

$property = 'bad';
$empty = null;
$text = 'I am ' . $property . ' programmer' . $empty;
//echo $text;
//echo "<br>";
//var_dump($text);

// математические операции - + / *
$sum = 0;
$lastBalance = 100;
$currentBalance = 250;
$sum = $lastBalance + $currentBalance;

$delimiter = 50;
$newSum = $sum / $delimiter + 1;
//echo $newSum;

// сравнения >  <  <=  >=  // true / false
$number1 = 1;
$number2 = 2;
$result = $number1 > $number2;
//var_dump($result);
$number3 = 3 > $number2;
//var_dump($number3);

$a = 1;
$b = 2;
$isAisBig = $a > $b;
var_dump($isAisBig);

// это будем проходить далее
//if ($isAisBig === true) {
//    echo 'A more then B';
//} else {
//    echo 'B more then A';
//}

// закрывающий php тег
?>