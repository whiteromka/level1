<?php

/**
 * Дебажит массивы
 *
 * @param array $arr - любой массив
 */
function debug($arr): void
{
    echo "<pre>";
    print_r($arr); // Отладочная функция для распечатки массивов. Аналог var_dump()
    echo "</pre>";
}