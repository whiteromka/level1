<a href="/">Go to main page</a>

<h1>Variables</h1>

<p>$a = 111;</p>
<p>$a = 1;</p>
<p>echo $a;</p>
<p> var_dump($a); - задебажить переменную</p>
<br>
<p> <b>||</b> - or - логическое ИЛИ </p>
<p> <b>&&</b> - and - логическое И </p>



<?php // Открывающий php тег. Только внутри php тегов php код может работать

// Переменные:

// Тип string - строки
$catName = "Роман";
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

// сравнения >  <  <=  >=  ===  !==    // true / false
$number1 = 1;
$number2 = 2;
$result = $number1 > $number2;

$result = $number1 === $number2;

//var_dump($result);
$number3 = 3 > $number2;
//var_dump($number3);

$a = 1;
$b = 2;
$isAisBig = $a > $b;
//var_dump($isAisBig);

$name = 'Kate';
$array = ['Rom', 'Bob', $name];
//var_dump($array);

// Домашка:
//Создать новый сайт в OpenServer home.local
//  - добавить новую папку home.local через проводник в C:\OSPanel\domains (такой путь у меня у вас может отличаться немного)
//  - привязать папку к серверу -  "зеленый флажок" - настройки - вкладка домены - ввести имя домена(home.local), указать папку домена через "...", нажать кнопку добавить
//  - открыть в phpstorm этот проект, добавить файл index.php c кодом <?php echo "Все работает!";
//  - убедится что в браузере сайт home.local открывается

// Создайте переменые с несколькими объектами из реальной жизни (машина, кот, самолет, стол, цветок итд)
// Создайте переменные с несколькими цветами (red, blue ...);
// Через конкатенацию строк и через "" сопоставьте объекты и цвета.
// Запишите полученные комбинаци в новые переменные и выведите результат на экран

// создать массив букв, минимум 5 знаков
// создать четный цифр, минимум 5
// создать массив животных, минимум 3 зверя
// создать массив цветов, минимум 3 растения
// создать массив стран, минимум 3
// создать массив телефонных номеров. Подумайте над типом! минимум 3
// создать массив телефонных номеров абонентов разных стран. Код страны у всех стран разный! минимум 3 номера
// создать массив телефонных номеров "грязного формата"... т.е. гдето в телефоне может встречаться символы: (, ), -  , а может и не встречаться в какихто номерах
// завардампите все эти масивы почереди или можно использовать html разделитель <br> или <hr>

// создать переменную "лучший друг" со значением ФИО лучшего друга
// создать массив "друзья" с несколькими друзьями
// последним элементом массива должен быть "лучший друг". Его нужно добавить через переменную. Пример: $array = ['Jim', 'Bob', $friend]

// содайте 4-и пременных с числами
// сравните их между собой поочереди, каждый с каждым
// выведие результат с помощью вардампа

// премножте две переменных между собой, сохраните результат в третью новую переменную,
// из которой потом вычтите другую переменную(заранее созданную), результат сохраните в переменную и выведите на экран

// Даны четыре числовых переменных a, b, c, d. Сами придумайте им значения(любые числа);
// перемножте a, b. Сложите c, d. Узнайте какой из этих результатов меньше.
// поменяйте числа в a, b, c, d на другие рандомные.
// вычтите из a b. Разделите c на d. Узнайте какой из этих результатов больше.

// Загуглите как понять что сравниваете 2-ва одинаковых числа. Опрератор строгое сравнение ===
// Загуглите опрератор не равенства != и !==.


