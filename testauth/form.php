<?php

require_once '../funcs.php';
require_once './logic.php';

$users = getUsers();
$login = '';
$password = '';
$user = getUserFromDB($users);
if (!empty($user)) {
    $timeDie = time() + (60 * 60 * 24 * 365 * 10);
    setcookie('id', $user['id'], $timeDie, '/'); // Ставим куку
    header("Location: http://level1.local/testauth/form.php"); // Редиректим на эту же страницу
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

                <p>
                    <input type="submit" class="btn btn-outline-primary" value="Login in!!!!">
                </p>

            </form>
        </div>
    </div>
</div>

</body>
</html>
