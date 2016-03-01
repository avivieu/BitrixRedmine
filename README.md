# Laravel 5 service for integration users Bitrix24 to Redmine

[![Latest Version on Packagist](https://packagist.org/packages/avivieu/bitrix-redmine)
[![Software License][ico-license]](LICENSE.md)

## Install steps

**Install [Laravel](https://laravel.com/docs/5.2)**

**Install service** 
``` bash
$ composer require avivieu/bitrix-redmine
```

**Publish assets** 
``` bash 
php artisan vendor:publish --provider="avivieu\bitrixRedmine\bitrixRedmineServiceProvider"
```
**Run migrations** 
``` bash
$ php artisan migrate --path=vendor/avivieu/bitrixRedmine/src/migrations
```
**Change redmine settings from config path /config/redmine.php** 

## Usage
For usage you need sent REST requests from bitrix to service with the next requirements:
*  For create users - POST https://you-laravel-service-url.dev/redmine/user/create, width fields:
$_POST['EMAIL'], $_POST['NAME'], $_POST['LAST_NAME'], $_POST['CONFIRM_PASSWORD'], $_POST['ID']
* For update users - POST https://you-laravel-service-url.dev/redmine/user/update/{id}  width fields:
$_POST['EMAIL'], $_POST['NAME'], $_POST['LAST_NAME'], $_POST['CONFIRM_PASSWORD']
* For delete user - POST https://you-laravel-service-url.dev/redmine/user/destroy/{id}  width field:
$_POST['ID']

## Change log
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.


## Credits

[Avivi](http://avivi.info)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
