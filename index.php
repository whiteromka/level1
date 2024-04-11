<?php // Открывающий php тег. Только внутри php тегов php код может работать

// Переменные:

// Тип string - строки
$catName = "Forest";
$catLastName = 'Belov';
$empty = '';
$otherEmpty = "";
echo "$catName is good cat"; // в двойных кавычках PHP видит переменные
echo "<br>"; // вывести html тег <br> - перенос строки
echo "<hr>"; // вывести html тег <hr> - горизонтальная черта

// Тип int integer - целые числа
$someNumber = 1243;
$otherNumber = 1;
$otherSomeNumber = -235565751;
echo $otherSomeNumber;
echo "<br>";
var_dump($otherSomeNumber); // var_dump(...) - встроенная функция для отладки. Показывает переменные
echo "<br>";
echo "<hr>";

// Тип bool boolean - логические значения. Может быть всего 2-ва значения: правда/ложь
$isOk = true; // правда
$isSuccess = false; // ложь
echo $isSuccess;
var_dump($isSuccess);

// закрывающий php тег
?>