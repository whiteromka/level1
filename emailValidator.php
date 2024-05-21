<?php

/**
 * Вернет true если это корректный email иначе false
 *
 * @param string $email - !
 * @return bool
 */
function isEmail(string $email): bool
{
    $chars = str_split($email);
    if (in_array('@', $chars) && in_array('.', $chars)) {
        return true;
    }
    return false;
}
