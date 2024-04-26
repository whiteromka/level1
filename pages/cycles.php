<a href="/">Go to main page</a>
<h1>Cycles</h1>
<?php

// Кастомная функция для красивой распечатки массивов
function debug($arr) {
    echo "<pre>";
    print_r($arr); // Отладочная функция для распечатки массивов. Аналог var_dump()
    echo "</pre>";
}


//keys     0    1    2
$chars = ['a', 'b', 'c']; // одно и тоже
$sameChars = [0 => 'a', 1 => 'b', 2 => 'c']; // одно и тоже
//echo $chars[2]; // выовод 2 элемента массива
//echo "<br>";
//echo $chars[1];
//var_dump($chars);


$chars = ['a', 'b', 'c',];
foreach ($chars as $value) {
    //echo $value; // Распечатает все значения массива
}


$friends = ['Micha', 'Anna', 'Ivan'];
foreach ($friends as $friend) {
  // echo "<p> $friend </p>"; // Распечатает всех друзей
}


/** Важный пример !!! */
$allFriends = '';
foreach ($friends as $friend) {
    $allFriends = $allFriends . $friend . ' '; // В цикле в $allFriends  дозаписываем на каждой итерации по $friend
}
//echo $allFriends;


$sameChars = [0 => 'a', 1 => 'b', 2 => 'c'];
foreach ($sameChars as $key => $char) {
    $customString = $char . ' - ' . $key;
//    echo $customString;
//    echo "<hr>";
}


$friendsBalance = ['Alice' => 100, 'Bob' => 70, 'Charles' => 105];
foreach ($friendsBalance as $name => $balance) {
//    echo $name . ' balance = ' . $balance;
//    echo "<br>";
}


$car = [
  'mark' => 'lada',
  'year' => 2024,
  'engine' => [
      'power' => 100,
      'maxSpeed' => 200,
      'brand' => [
          'country' => 'Ru',
          'xxx' => true
      ]
  ]
];
//debug($car);
foreach ($car as $key => $value) {
// Вариант 1
//    if (is_array($value)) { //  эта функция определяем массив это или нет
//        echo ' Элемент с ключем ' . $key .  ' является массивом';
//        echo "<hr>";
//    } else {
//        echo ' Элемент с ключем ' . $key .  ' НЕ является массивом';
//        echo "<hr>";
//    }

// Вариант 2
//    if (is_array($value) && array_key_exists('power', $value)) {
//        echo $key . ' - ' . $value['power'];
//        echo "<br>";
//    } else {
//        echo $key . ' - ' . $value;
//        echo "<hr>";
//    }
}


$friendsData = [
    'Alice' => ['balance' => 100, 'address' => 'Ankara 1', 'passport' => '1111 1111'],
    'Bob' => ['balance' => 70, 'address' => 'Boston 2', 'passport' => '2222 2222'],
];
foreach ($friendsData as $key => $dataFriend) {
//    echo $dataFriend['balance'];
//    echo "<hr>";
}


$fruits = ["orange", "banana", "apple", "raspberry"];
$lastFruit = array_pop($fruits); // Эта функция вырежет последний элемент массива и вернет его наружу
//debug($fruits);
//echo "<br>";
//echo $lastFruit;


// ДЗ. Если что то сложно, можно спросить у меня или в общем чате!!! Последние задачи сложные) так что жду ваших вопросов)))
// Есть такой массив
$users = [
    ['name' => 'Anna', 'salary' => 100, 'age' => 25, 'gender' => 0, 'job' => 'Alphabet'],
    ['name' => 'Bob', 'salary' => 40, 'age' => 65, 'gender' => 1, 'job' => 'Alphabet'],
    ['name' => 'Cecil', 'salary' => 130, 'age' => 40, 'gender' => 1, 'job' => 'Alphabet'],
    ['name' => 'Diana', 'salary' => 50, 'age' => 30, 'gender' => 0, 'job' => 'BBC'],
    ['name' => 'Elena', 'salary' => 60, 'age' => 20, 'gender' => 0, 'job' => 'BBC'],
    ['name' => 'Fedor', 'salary' => 90, 'age' => 50, 'gender' => 1, 'job' => 'BBC'],
];
// 1 Напишите функцию которая через цикл выведет всех сотрудников из всех компаний старше 30 лет.
// Вевести нужно построчно каждого подходящего под условия. 1 строка = 1 сотрудник.
// Имя, возраст, компания

// 2 Напишите функцию которая через цикл выведет всех сотрудников из Alphabet у которых ЗП больше 100
// и которые являются мужчинами

// 3 Напишите функцию которая через цикл переберет всех сотрудников из всех компаний
// и ВЕРНЕТ(не веведет а именно вернет) общую ЗП.

// 4 Напишите функцию которая через цикл переберет всех сотрудников из всех компаний
// и ВЕРНЕТ массив где будет общая ЗП в разрезе обеих компаний.
// Пример финального массива ['commonAlphabetSalary' => 300, commonBBCSalary' => 500,]

// 5 Напишите функцию которая через цикл переберет всех сотрудников из всех компаний
// и ВЕРНЕТ массив c количеством мужчин и женщин работающих в компаниях.

// 6 Напишите функцию которая через цикл переберет всех сотрудников из всех компаний
// и ВЕРНЕТ массив массивов с женщинами моложе 30. Т.е. Вернуть все данные о женщинах моложе 30 в виде массива
// Пример результата: [  ['name'=> 'Anna', ...],  [...],  [...]   ]

// 7 Напишите массив c данными о встроенных функциях php. О тех что мы прошли и что вы уже знаете.
// Например:
$phpArrayFunctions = [
    'is_array' => ['description' => 'Вернет true если переменная массив', 'arguments' => 'примивает один агумент любова типа', 'comment' => 'Проверяет является ли переменная массивом'],
    'array_push' => ['description' => 'Добавит в конец массива переменную', 'arguments' => '1 масив, 2 то что добаляем ', 'comment' => '$friends = []; array_push($friends, "Bob") // Добавили в массив друзей Боба'],
    //'...' => [...]
];
// Заведите отдельню страницу например php-array-functions.php вставьте туда этот массив.
// И через цикл "красиво" распечатайте информацию используя html теги







