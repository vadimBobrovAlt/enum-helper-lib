# Enum helper

`Enum helper` — это библиотека для работы с перечислениями (enum) в PHP. Она предоставляет удобные методы для работы с перечислениями, такими как получение имен, значений, ассоциативных массивов и поиск по имени.

## Установка

Вы можете установить библиотеку с помощью Composer. Для этого выполните следующую команду:

```bash
composer require bobrovva/enum_helper_lib
```

## Использование

Чтобы использовать библиотеку, вам нужно подключить трейт `EnumHelper` в вашем классе перечислений. Пример использования:

### Пример перечисления

```php
<?php

namespace App\Enums;

use bobrovva\enum_helper_lib\EnumHelper;

enum Status: int
{
    use EnumHelper;

    case PENDING = 1;
    case APPROVED = 2;
    case REJECTED = 3;
}
```

### Методы

#### `names()`

Возвращает массив имен всех перечислений.

```php
$statusNames = Status::names();
// Пример вывода: ['PENDING', 'APPROVED', 'REJECTED']
```

#### `values()`

Возвращает массив значений всех перечислений.

```php
$statusValues = Status::values();
// Пример вывода: [1, 2, 3]
```

#### `array()`

Возвращает ассоциативный массив, где ключами являются имена перечислений, а значениями — их значения.

```php
$statusArray = Status::array();
// Пример вывода: ['PENDING' => 1, 'APPROVED' => 2, 'REJECTED' => 3]
```

#### `findByName(string $name, string $return = 'value')`

Находит перечисление по имени. Возвращает объект перечисления или значение перечисления в зависимости от параметра `$return`.

```php
$statusValue = Status::findByName('APPROVED');
// Пример вывода: 2

$statusClass = Status::findByName('APPROVED', 'class');
// Пример вывода: Status::APPROVED
```

#### `getEnumByData($enum)`

Возвращает перечисление по данным (значение или имя).

```php
$statusByValue = Status::getEnumByData(2);
// Пример вывода: Status::APPROVED

$statusByName = Status::getEnumByData('APPROVED');
// Пример вывода: Status::APPROVED
```