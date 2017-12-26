# OpenBD API for Laravel

https://openbd.jp/

## Requirements
- PHP >= 7.0
- Laravel >= 5.5

## Installation

### Composer
```
composer require revolution/laravel-openbd
```

## Usage

すべて array が返り値。

```php
use OpenBD;

//かなりサイズが大きい
$coverage = OpenBD::coverage():

$schema = OpenBD::schema();

//arrayで指定。指定するISBNは10000件まで。openBD側はまとめて取得を推奨している。openBDサイトの配布資料を読んだほうがいい。
$books = OpenBD::get(['978-4-7808-0204-7']):
```

### without Laravel
```php
use Revolution\OpenBD\OpenBD;

$openbd = new OpenBD();
$books = $openbd->get(['978-4-7808-0204-7]):
```

### When endpoint changed
```php
$books = OpenBD::endpoint('https://api.openbd.jp/v1/')->get(['978-4-7808-0204-7]):
```

## LICENSE
MIT
Copyright kawax
