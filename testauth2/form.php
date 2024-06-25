<?php

session_start(); // Позволяет работать с сессиями в этом файле + ставит сессионную куку

require_once '../funcs.php';
require_once './logic.php';

echo "POST";
debug($_POST);
echo "<br>";

echo "COOKIE";
debug($_COOKIE);
echo "<br>";

echo "SESSION";
debug($_SESSION);
echo "<br>";

$users = getUsers();
$user = getUserFromDB($users);
$error = '';

// Блок для залогинивания пользователя
if (!empty($user)) {
    $_SESSION['id'] = $user['id'];
    header("Location: http://level1.local/testauth2/form.php"); // Редиректим на эту же страницу
    die();
}

// Блок для ошибок залогинивания. Если POST не пустой, а пользователь в БД пустой, т.е. не нашелся пользователь, то создаем ошибку залогинивания
else if (!empty($_POST) && empty($user)) {
    $error = 'Пароль или логин не верны!';
}

// Блок для разлогинивания
if (!empty($_POST['logout'])) {
    unset($_SESSION['id']);
    header("Location: http://level1.local/testauth2/form.php"); // Редиректим на эту же страницу
    die();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</head>
<body>

<!-- Форма   -->
<br>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">

            <p><?= greeting()?></p>

            <h1>Login form</h1>
            <form action="" method="POST">

                <div class="form-group">
                    <label for="login">login</label>
                    <input type="text" class="form-control" name="login" id="login" value="">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="">
                </div>

                <div>
                    <p class="text-danger"><?= $error ?></p>
                </div>

                <div class="row">
                    <div class="col-6">
                        <input type="submit" class="btn btn-outline-primary btn-block_" value="Login in">
                    </div>
                    <div class="col-6">
                        <input type="submit" name="logout" class="btn btn-outline-danger btn-block_" value="Logout">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
