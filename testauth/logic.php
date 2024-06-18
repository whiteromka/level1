<?php

/**
 * @return array[]
 */
function getUsers(): array
{
    return [
        0 => ['id' => 1, 'login' => 'Rom', 'password' => '123', 'city' => 'K'],
        1 => ['id' => 2, 'login' => 'Anna', 'password' => '321', 'city' => 'A'],
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
    if (
        !empty($_POST['login']) &&
        !empty($_POST['password'])
    ) {
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
 * Вернет приветствие авторизованому пользователю
 *
 * @return string
 */
function greeting(): string
{
    // 1 get data ID from cookie
    if (array_key_exists('id', $_COOKIE)) {
        $userId = $_COOKIE['id'];
    } else {
        return 'U must login in';
    }

    // 2 ID >>> user
    $users = getUsers();
    foreach ($users as $user) {
        if ((string)$userId === (string)$user['id']) {
            return 'Hi ' . $user['login'] . ' , we miss u so much!';
        }
    }
    return 'U must login in';
}