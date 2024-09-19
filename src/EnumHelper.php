<?php

namespace bobrovva\enum_helper_lib;

trait EnumHelper
{
    /**
     * Возвращает массив имен всех перечислений (enum).
     *
     * @return string[] Массив имен всех перечислений.
     */
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    /**
     * Возвращает массив значений всех перечислений (enum).
     *
     * @return mixed[] Массив значений всех перечислений.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Возвращает ассоциативный массив, где ключами являются имена перечислений, а значениями — их значения.
     *
     * @return array Ассоциативный массив перечислений.
     */
    public static function array(): array
    {
        $array = [];
        foreach (self::cases() as $item) {
            $array[$item->name] = $item->value;
        }

        return $array;
    }

    /**
     * Находит перечисление по имени.
     *
     * @param string $name Имя перечисления.
     * @param string $return Тип возвращаемого значения. Может быть 'class' (объект перечисления) или 'value' (значение перечисления).
     * @return mixed|null Объект перечисления или значение перечисления. Возвращает null, если перечисление не найдено.
     */
    public static function findByName(string $name, string $return = 'value')
    {
        foreach (self::cases() as $item) {
            if ($name == $item->name) {
                switch ($return) {
                    case 'class':
                        return $item;
                    case 'value':
                        return $item->value;
                }
            }
        }

        return null;
    }

    /**
     * Возвращает перечисление по данным.
     *
     * @param mixed $enum Значение перечисления (число) или имя перечисления (строка).
     * @return mixed|null Объект перечисления или null, если перечисление не найдено.
     */
    public static function getEnumByData($enum)
    {
        if (is_int($enum)) {
            $enum = self::from($enum);
        } elseif (is_string($enum)) {
            $enum = strtoupper($enum);
            $enum = self::findByName($enum, 'class');
        }

        return $enum;
    }
}