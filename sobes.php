<?php

require_once './funcs.php';

// Типы переменных + object + resource
//$r = fopen(
//    'cats.php',
//    '+a',
//    false,
//);
//var_dump($r);

// =, ==, ===

// Циклы
foreach ([1,2,3,4] as $number) {
    if ($number === 1) {
        continue; // это значит пропустить текущий элемент масива и перейти к следующей итерации цикла
    }

    if ($number === 3) {
        $res = $number;
        break; // полностью остановить текущий цикл
    }
}


// Помнить в голове какие функции работы с массивами и строками есть
    // count, array_key_exist, in_array, array_map, array_merge, array_combine,
    // функции сортировок sort, array_push, array_pop, array_shift, array_unshift - add in begining,
    // array_filter, iconv_strlen, str_split, explode, implode, array_values, array_keys,
    // str_repeat?, strtolower, rand_..., range?, isset, empty, is_array, is_number, ...

// Супер глобальные массивы. REQUEST POST GET COOKIES SESSION
// Чем POST отличается от GET

// Type hinting - контроль типов на вход и на выход

// Тернарный оператор
$a = 2;
$b = 1;
if ($a > $b) {
    $res = 'Big A';
} else {
    $res = 'Big B';
}
// Эквивалентно:
$res = ($a > $b) ? ('Big A') : ('Big B');


// ?? - т.е. проверка на null, если null то проверяем следующую переменную
$x = null;
$y = -1;
$res = $x ?? $y ?? $z ?? $a ?? $e ?? null; // вернет -1
//echo "<hr>";
//echo $res;

// switch
//$i = 0;
//switch ($i) {
//    case 0:
//        $a = "i равно 0";
//        break;
//    case 1:
//        echo "i равно 1";
//        break;
//    case 2:
//        echo "i равно 2";
//        break;
//}
// Эквивалентно:
//if ($i == 0) {
//    echo "i равно 0";
//} elseif ($i == 1) {
//    echo "i равно 1";
//} elseif ($i == 2) {
//    echo "i равно 2";
//}

// Передача переменных по значения. Как сделать по ссылке

$arr = [2,5,1];
sort($arr); // & - переменная $arr передается по ссылке и мутирует
//debug($arr);

$arr = [2,5,1];
function a(&$arr) // - & - переменная $arr передается по ссылке и мутирует
{
    $arr[] = 11;
}
a($arr);
//debug($arr);

// Cookie, session

// Ошибки в php: Notice, Warning, Fatal Error - это просто нагуглить что от чего чем отличается
function a2(array $a) {}

//try catch, finaly и throw
try {
    $res = 1 / 0;
    //a2('123424');
    // ...
} catch (Exception $e) {
//    echo $e->getMessage() . "<br>";
//    echo $e->getCode(). "<br>";
//    echo $e->getFile(). "<br>";
//    echo $e->getLine(). "<br>";
  //  echo 'oq ds fdg fhgbfhgf gf';
}

// Замыкание - анонимные функции
$name = 'Rom';
$lName = 'Belov';
$mName = 'Vladim';
$greet = function(string $name, string $lName, string $mName)
{
    echo "Привет, $name $lName $mName";
};
//$greet($name, $lName, $mName);

// Cтрелочные фунцкии - это коротка версия анонимных функций
$x = 1;
$y = 2;
$fn1 = fn($x, $y) => $x + $y;
echo $fn1($x, $y);

// Эквивалентно
$fn2 = function ($x, $y) {
    return $x + $y;
};
$fn2();





// Для xDebug:
// 1 php.ini
// 2 установть расширение Xdebug helper
// 3 https://developer-consult.ru/articles/nastroyka-xdebug-na-php7-3-php7-4/


$array = [2,5,67,1,0];
/**
 * @param array $array
 * @return int
 */
function maxElement(array $array): int
{
    sort($array);
    return end($array);
}


/**
 * Вернет максимальный эл мас
 *
 * @param array $anyArr
 * @return int
 */
function maxAlternative($anyArr): string
{
    $valueKeeper = $anyArr[0];
    foreach ($anyArr as $value) {
        if ($value > $valueKeeper) {
            $valueKeeper = $value;
        }
    }
    return $valueKeeper;
}