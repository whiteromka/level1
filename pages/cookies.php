<?php

require_once '../funcs.php';

// конвертация масива в строку 1
$names = ['R', 'A'];
$arrayAsString = implode(';', $names); // склеили массив в строку через ';'
$finalArray = explode(';', $arrayAsString);  // разбили строку на массив по разделителю - ;
debug($finalArray);

// конвертация масива в строку 2
$arrayAsJson = json_encode($names); // массив в json
$finalArray = json_decode($arrayAsJson, true); // обратно json в масив
debug($finalArray);


// пример установку кук на 1 минуту
$timeDie = time() + 60;
setcookie(
    'userId',
    123,
    $timeDie,
    '/'
);
debug($_COOKIE);

// пример удаления кук на
$timeDie = time() - 1;
setcookie(
    'userId',
    '',
    $timeDie,
    '/'
);
debug($_COOKIE);

// пример проверки на существования куки
if (!empty($_COOKIE['userId']) ) {
   $userId = $_COOKIE['userId'];
} else {
    $userId = null;
}

?>

</body>
</html>


