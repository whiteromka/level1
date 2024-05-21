<a href="/">Go to main page</a>
<h1>Cycles</h1>
<?php
require '../funcs.php';


//keys     0    1    2
$chars = ['a', 'b', 'c']; // одно и тоже
$sameChars = [0 => 'a', 1 => 'b', 2 => 'c']; // одно и тоже
//echo $chars[2]; // выовод 2 элемента массива
//echo "<br>";
//echo $chars[1];
//var_dump($chars);

### FOREACH

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
// и ВЕРНЕТ(не выведет а именно вернет) общую ЗП.

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
    'is_array' => ['description' => 'Вернет true если переменная массив', 'arguments' => 'примимает один аргумент любого типа', 'comment' => 'Проверяет является ли переменная массивом'],
    'array_push' => ['description' => 'Добавит в конец массива переменную', 'arguments' => '1 масив, 2 то что добаляем ', 'comment' => '$friends = []; array_push($friends, "Bob") // Добавили в массив друзей Боба'],
    //'...' => [...]
];
// Заведите отдельню страницу например php-array-functions.php вставьте туда этот массив.
// И через цикл "красиво" распечатайте информацию используя html теги



### Cycles 2. Lesson 6. FOR
$users = [
    0 => ['name' => 'Anna', 'salary' => 100, 'age' => 25, 'gender' => 0, 'job' => 'Alphabet'],
    1 => ['name' => 'Bob', 'salary' => 40, 'age' => 65, 'gender' => 1, 'job' => 'Alphabet'],
];

// Перебор массива в прямом порядке
$count = count($users);
for ($i = 0; $i < $count; $i++) {
    $user = $users[$i];
    //echo $user['name'] . "<br>";
}
//echo "<hr>";

// Перебор массива в обратном порядке (с конца к началу)
$count = count($users);
for ($i = $count; $i > 0; $i--) {
    $nubmer = $i - 1;
    //echo $nubmer . "<br>";
    $user = $users[$nubmer];
    //echo $user['name'] . "<br>";
}

$users = [
    ['name' => 'Anna', 'salary' => 100, 'age' => 25, 'gender' => 0, 'job' => 'Alphabet'],
    ['name' => 'Bob', 'salary' => 40, 'age' => 65, 'gender' => 1, 'job' => 'Alphabet'],
    ['name' => 'Cecil', 'salary' => 130, 'age' => 40, 'gender' => 1, 'job' => 'Alphabet'],
    ['name' => 'Diana', 'salary' => 50, 'age' => 30, 'gender' => 0, 'job' => 'BBC'],
    ['name' => 'Elena', 'salary' => 60, 'age' => 20, 'gender' => 0, 'job' => 'BBC'],
    ['name' => 'Fedor', 'salary' => 90, 'age' => 50, 'gender' => 1, 'job' => 'BBC'],
];

/**
 * Фильтрация пользаков по полу и зп
 *
 * @param array $users - Это пользователи
 * @param int $salary
 * @param int $gender
 * @return array
 */
function usersFindWhere(array $users, int $salary, int $gender): array
{
    $filteredUsers = [];
    foreach ($users as $user) {
        if ($user['gender'] === $gender && $user['salary'] >= $salary) {
            $filteredUsers[] = $user; // или тоже самое array_push($filteredUsers, $user);
        }
    }
    return $filteredUsers;
}
$filteredUsers = usersFindWhere($users, 20, 0);



//debug($filteredUsers);

$users = [
    ['name' => 'Anna', 'salary' => 100, 'age' => 25, 'gender' => 0, 'job' => 'Alphabet'],
    ['name' => 'Bob', 'salary' => 40, 'age' => 65, 'gender' => 1, 'job' => 'Alphabet'],
    ['name' => 'Cecil', 'salary' => 130, 'age' => 40, 'gender' => 1, 'job' => 'Alphabet'],
    ['name' => 'Diana', 'salary' => 50, 'age' => 30, 'gender' => 0, 'job' => 'BBC'],
    ['name' => 'Elena', 'salary' => 60, 'age' => 20, 'gender' => 0, 'job' => 'BBC'],
    ['name' => 'Fedor', 'salary' => 90, 'age' => 50, 'gender' => 1, 'job' => 'BBC'],
];
function usersFindWhere2($users, $salary, $gender) {
    $filteredUsers = [];
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        if ($user['gender'] === $gender && $user['salary'] >= $salary) {
            $filteredUsers[] = $user; // или тоже самое array_push($filteredUsers, $user);
        }
    }
    return $filteredUsers;
}
$filteredUsers = usersFindWhere2($users, 30, 1);
//debug($filteredUsers);

$users = [
    ['name' => 'Anna', 'salary' => 100, 'age' => 25, 'gender' => 0, 'job' => 'Alphabet'],
    ['name' => 'Bob', 'salary' => 40, 'age' => 65, 'gender' => 1, 'job' => 'Alphabet'],
    ['name' => 'Cecil', 'salary' => 130, 'age' => 40, 'gender' => 1, 'job' => 'Alphabet'],
    ['name' => 'Diana', 'salary' => 50, 'age' => 30, 'gender' => 0, 'job' => 'BBC'],
    ['name' => 'Elena', 'salary' => 60, 'age' => 20, 'gender' => 0, 'job' => 'BBC'],
    ['name' => 'Fedor', 'salary' => 90, 'age' => 50, 'gender' => 1, 'job' => 'BBC'],
];
// $count = count($users); // Кол-во элементов массива
// array_push($users, 'sss'); // Добавть элемент массива в конец
// $lastElement = array_pop($users); // Вырезать последний элемент массива (и вернуть его наружу)

// $firstElement = array_shift($users); // Вырезать первый элемент массива (и вернуть его наружу)
// array_unshift($users, ['name' => 'Egor']); // Вставляет в начало массива элемент
// array_key_exists('job', $users[1]); // Проверяет существует ли ключ в массиве
// $res = array_values($users[0]); // Вернет все значения массива (с обнуленными ключами)
// $res = array_keys($users); // Верент все ключи массива

// $a = [10, 20, 30];
// $b = [100, 200, 300];
// $c = array_merge($a, $b); // Склеит 2 и более массива в один



### ДЗ

// 1 Разберите пример работы с циклом while
// Пример работы while: https://www.php.net/manual/ru/control-structures.while.php
// $i = 1;
// while ($i <= 10) { // Пока $i меньше чем 11
//    echo $i++; // выодим переменную и увеличиваем ее значение на 1
// }

// 2 Разберите пример работы с циклом do while
// Пример работы do while: https://www.php.net/manual/ru/control-structures.do.while.phpp
// $i = 1;
// do {
//    echo $i;
//    $i++;
// } while ($i <= 10);

$users = [
    ['name' => 'Anna', 'salary' => 100, 'age' => 25, 'gender' => 0, 'job' => 'Alphabet'],
    ['name' => 'Bob', 'salary' => 40, 'age' => 65, 'gender' => 1, 'job' => 'Alphabet'],
    ['name' => 'Cecil', 'salary' => 130, 'age' => 40, 'gender' => 1, 'job' => 'Alphabet'],
    ['name' => 'Diana', 'salary' => 50, 'age' => 30, 'gender' => 0, 'job' => 'BBC'],
    ['name' => 'Elena', 'salary' => 60, 'age' => 20, 'gender' => 0, 'job' => 'BBC'],
    ['name' => 'Fedor', 'salary' => 90, 'age' => 50, 'gender' => 1, 'job' => 'BBC'],
];
// 3 Напишите функцию которая через цикл FOR переберет всех сотрудников из всех компаний
// и ВЕРНЕТ(не выведет а именно вернет) общую ЗП.

$numbres = range(1, 20); // Вернет массив чисел от 1 до 20
// 4 Напишите функцию которая переберет массив $numbres через FOR и вернет массив только четных числ которые в нем есть.
// Конструкция $isEvenNumber = (11 % 2 === 0); должна помочь, она определяет четность числа
// Символ процента % это математический оператор для целочисленного деления. Можно погуглить как определить четность числа в php
// Т.е. если 11 делится на 2 на цело без остатка(или остаток от деления = 0) то 11 четное число

// 5 Задача повышенной сложности! Если сможете решить то очень хорошо!!!
// Напишите алгоритм который вернет имя человека из массива $users с наибольшей зарплатой










### Cycles 3. Lesson 7. Решаем задачи с циклами

$users = [
    ['name' => 'Anna', 'salary' => 100, 'age' => 25, 'gender' => 0, 'job' => 'Alphabet'],
    ['name' => 'Bob', 'salary' => 40, 'age' => 65, 'gender' => 1, 'job' => 'BBC'],
];
# 1 Написать функцию которая нагененрирует N-ое (1-100000) кол-во пользователей в массив и вернет его. Пример массива $users
# - цикл
# - генерация данных
# - добавление данных

/**
 * @param int $count
 * @return array
 */
function getUsers(int $count = 100): array
{
    $users = [];
    for ($i = 0; $i < $count; $i++) {
        $user = createRandomUser();
        $users[] = $user;
    }
    return $users;
}

function createRandomUser()
{
    $age = random_int(14, 80);
    $gender = random_int(0, 1);
    $salary = random_int(3, 15) * 10;
    $jobList = ['Alphabet', 'BBC', 'Alfha', 'Yandex', 'MTS'];
    $jobKey = array_rand($jobList);
    $job = $jobList[$jobKey];
    $name = getRandomName();
    return ['name' => $name, 'salary' => $salary, 'age' => $age, 'gender' => $gender, 'job' => $job];
}

function getRandomName()
{
    $name = '';
    $alphabet = range('a', 'z');
    $charCount = random_int(2, 10);
    for ($i = 0; $i < $charCount; $i++) {
        $key = array_rand($alphabet);
        $char = $alphabet[$key];
        $name = $name . $char;
    }
    return $name;
}

$users = getUsers(123);
//debug($users);



$phones = ['89159100000', '+7 915 910_0000', '8 (915) 910 0000', '8-915-910-00-00', '+79159100000', '33-22-11'];
# 2 Фильтрация массива телефонов мобильных номеров. Нужно сделать массив чистых телефонов
# - цикл
# - убрать лишние символы
# - заменить +7 в начале на 8
# - проверить кол-во цифр, заменить +7 на 8
# - добавление данных в итоговый массив
function getCorrectPhones($phones)
{
    $correctPhones = [];
    foreach ($phones as $phone) {
        $correctPhone = getCorrectPhone($phone);
        $correctPhones[] = $correctPhone;
    }
    return $correctPhones;
}

function getCorrectPhone($phone)
{
    $badChars = [' ', '-', '_', '(', ')'];
    $phone = str_replace($badChars, '', $phone);
    $phone = str_replace('+7', '8', $phone);
    return $phone;
//    $firstNumber = $phone[0];
//    if ($firstNumber === '7') {
//        $phone = substr($phone, 1, -1); // !!!
//        $phone = '8' . $phone;
//    }
//    return $phone;
}

$phones = getCorrectPhones($phones);
//debug($phones);




### ДЗ

# 1 Сопоставить данные в массивах
# - цикл по $users
# - вложенный цикл по $data
# - сравниваем id, объединяем подмассивы
$users = [
    ['id' => 1, 'name' => 'Anna', 'salary' => 100, 'age' => 25, 'gender' => 0, 'job' => 'Alphabet'],
    ['id' => 2, 'name' => 'Bob', 'salary' => 40, 'age' => 65, 'gender' => 1, 'job' => 'Alphabet'],
];
$data = [
    ['id' => 1, 'passport' => '1111 1111', 'country' => 'Austria'],
    ['id' => 2, 'passport' => '2222 2222', 'country' => 'Belarus'],
];
function combineData($users, $data)
{
    return [];
}

# 2 Задача со *. Повышеной сложности. Написать функцию которая елочкой выведет *.
# На каждом следующем уровне должно быть на одну * больше.
# Пример: stars(3)
# *
# * *
# * * *

# 3 Разобрать функции ниже. И запомнить что они делают
# разобрать функцию explode()
# разобрать функцию implode()
# разобрать функцию in_array() похожа на array_key_exists()
# разобрать функцию sort()
