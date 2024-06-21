<?php

/**
 * @return array[]
 */
function getUsers(): array
{
    return [
        ['id' => 1, 'login' => 'Rom', 'password' => '123', 'city' => 'K'],
        ['id' => 2, 'login' => 'Anna', 'password' => '321', 'city' => 'A'],
    ];
}

/**
 * Вернет пользователя из БД или пустой массив
 *
 * @param array $users
 * @return array
 */
function getUserFromDB(array $users): array
{
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        foreach ($users as $userData) {
            if (
                $login === $userData['login'] &&
                $password === $userData['password']
            ) {
                return $userData;
            }
        }
    }
    return [];
}

/**
 * Вернет приветствие авторизованому пользователю, иначе верент просьбу о авторизации
 *
 * @return string
 */
function greeting(): string
{
    // Если в кукуа есть ID и X
    if (
        array_key_exists('id', $_COOKIE) &&
        array_key_exists('x', $_COOKIE)
    ) {
        // То сохраним их в переменные
        $userId = $_COOKIE['id']; // 1
        $login = $_COOKIE['x']; // 135405ec6015c57cd29e49eb8d5ad3eabbd3cb7a
    } else {
        // Иначе вернем сообщение о том что нужно залогиниться
        return 'U must login in';
    }


    $users = getUsers(); // Все пользователи из БД
    foreach ($users as $user) { // перебираем по одному
        if (
            (string)$userId === (string)$user['id'] && // Если ID из кук совпал с ID пользователя в БД и
            $login === sha1($user['login'])             // если захешированный логин из кук совпал с зашешированным логином из БД
        ) {
            // то приветствуем по иимени
            return 'Hi ' . $user['login'] . ' , we missed u so much!';
        }
    }
    // во всех остальных случаях просим залогиниться
    return 'U must login in';
}