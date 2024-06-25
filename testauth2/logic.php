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
    if (array_key_exists('id', $_SESSION)) {
        $userId = $_SESSION['id'];
    } else {
        return 'U must login in';
    }

    $users = getUsers(); // Все пользователи из БД
    foreach ($users as $user) { // перебираем по одному
        if ((string)$userId === (string)$user['id']) {
            return 'Hi ' . $user['login'] . ' , we missed u so much!';
        }
    }
    // во всех остальных случаях просим залогиниться
    return 'U must login in';
}