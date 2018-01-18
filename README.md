# Laravel Service Provider Bridge

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Converts [Laravel Service Providers](https://laravel.com/docs/5.5/providers) to [Zapheus](https://github.com/zapheus/zapheus) providers.

## Install

Via Composer

``` bash
$ composer require zapheus/illuminate-bridge
```

## Usage

``` php
use Acme\Providers\TestServiceProvider;
use Zapheus\Bridge\Illuminate\Provider;
use Zapheus\Container\Container;
use Zapheus\Provider\FrameworkProvider;

$test = TestServiceProvider::class;

$framework = new FrameworkProvider;

$provider = new IlluminateProvider($test);

$container = $provider->register(new Container);

$container = $framework->register($container);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email rougingutib@gmail.com instead of using the issue tracker.

## Credits

- [Rougin Royce Gutib][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [LICENSE.md](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/zapheus/illuminate-bridge.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/zapheus/illuminate-bridge/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/zapheus/illuminate-bridge.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/zapheus/illuminate-bridge.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/zapheus/illuminate-bridge.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/zapheus/illuminate-bridge
[link-travis]: https://travis-ci.org/zapheus/illuminate-bridge
[link-scrutinizer]: https://scrutinizer-ci.com/g/zapheus/illuminate-bridge/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/zapheus/illuminate-bridge
[link-downloads]: https://packagist.org/packages/zapheus/illuminate-bridge
[link-author]: https://github.com/rougin
[link-contributors]: ../../contributors