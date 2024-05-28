<?php

require_once './funcs.php';

// Задача 1
// Дано:
$listNumbers = [
    [11,22,33],
    [44,55,66],
    [77,88,99],
];
// Нужено привести к : [11,22,33,44,55,66,77,88,99]
function reconstructList(array $numbers): array
{
    $result = [];
    foreach ($numbers as $row) {
        foreach ($row as $num) {
            $result[] = $num;
        }
    }
    return $result;
}
$data = reconstructList($listNumbers);
//debug($data);



// Задача 2 от Сани

//Ввод: "0323456"
//
//Переместить 1 | "0(323)456" -> "0212456"
//Двигаться 2 | "0(212)456" -> "0101456"
//Двигайся 3 | "0(101)456" -> "0000456"
//Двигайся 4 | "0000(456)" -> "0000345"
//Двигайся 5 | "0000(345)" -> "0000234"
//Двигайся 6 | "0000(234)" -> "0000123"
//Переместить 7 | "0000(123)" -> "0000012"
//Переместить 8 | "00000(12)" -> "0000001"
//Переместить 9 | "000000(1)" -> "0000000"
//
//Должно быть возвращено значение 9.
//Ввод: "2113"
//
//Двигайся 1 | "(211)3" -> "1003"
//Двигайся 2 | "(100)3" -> "0003"
//Двигайся 3 | "000(3)" -> "0002"
//Двигайся 4 | "000(2)" -> "0001"
//Ход 5 | "000(1)" -> "0000"
//
//Результат должен быть равен 5.

// Пример:
// 12435433  >>> 124 354 33
// -1            013 354 33
// -1            000 354 33
// -1            ....
// -1            000 000 00
function foo(string $str): int
{
    if ($str[0] == 0) {
        $str = substr($str, 1);
    }
    $result = 0;
    $parts = str_split( $str, 3);
    foreach ($parts as $part) {
        $countIteration = strangeCalc($part);
        $result = $result + $countIteration;
    }
    return $result;
}

function strangeCalc(string $str): int
{
    $nums = str_split($str);
    return max($nums);
}

echo foo("0323456");

