# Laravel Service Provider Bridge

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]][link-license]
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Converts [Laravel Service Providers](https://laravel.com/docs/5.5/providers) to [Zapheus](https://github.com/zapheus/zapheus) providers.

## Installation

Install `Illuminate Bridge` via [Composer](https://getcomposer.org/):

``` bash
$ composer require zapheus/illuminate-bridge
```

## Basic Usage

``` php
use Acme\Providers\AuthServiceProvider;
use Acme\Providers\RoleServiceProvider;
use Zapheus\Bridge\Illuminate\BridgeProvider;
use Zapheus\Container\Container;

$providers = array(AuthServiceProvider::class, RoleServiceProvider::class);

$provider = new BridgeProvider((array) $providers);

$container = $provider->register(new Container);

$illuminate = $container->get(BridgeProvider::CONTAINER);
```

## Changelog

Please see [CHANGELOG][link-changelog] for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Credits

- [All contributors][link-contributors]

## License

The MIT License (MIT). Please see [LICENSE][link-license] for more information.

[ico-code-quality]: https://img.shields.io/scrutinizer/g/zapheus/illuminate-bridge.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/zapheus/illuminate-bridge.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/zapheus/illuminate-bridge.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/zapheus/illuminate-bridge/master.svg?style=flat-square
[ico-version]: https://img.shields.io/packagist/v/zapheus/illuminate-bridge.svg?style=flat-square

[link-changelog]: https://github.com/zapheus/illuminate-bridge/blob/master/CHANGELOG.md
[link-code-quality]: https://scrutinizer-ci.com/g/zapheus/illuminate-bridge
[link-contributors]: https://github.com/zapheus/illuminate-bridge/contributors
[link-downloads]: https://packagist.org/packages/zapheus/illuminate-bridge
[link-license]: https://github.com/zapheus/illuminate-bridge/blob/master/LICENSE.md
[link-packagist]: https://packagist.org/packages/zapheus/illuminate-bridge
[link-scrutinizer]: https://scrutinizer-ci.com/g/zapheus/illuminate-bridge/code-structure
[link-travis]: https://travis-ci.org/zapheus/illuminate-bridge