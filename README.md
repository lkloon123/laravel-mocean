Laravel Mocean
===============
[![Latest Stable Version](https://poser.pugx.org/neoson/laravel-mocean/v/stable)](https://packagist.org/packages/neoson/laravel-mocean)
[![Build Status](https://travis-ci.com/lkloon123/laravel-mocean.svg?branch=master)](https://travis-ci.com/lkloon123/laravel-mocean)
[![StyleCI](https://github.styleci.io/repos/156104998/shield?branch=master)](https://github.styleci.io/repos/156104998)
[![License](https://poser.pugx.org/neoson/laravel-mocean/license)](https://packagist.org/packages/neoson/laravel-mocean)
[![Total Downloads](https://poser.pugx.org/neoson/laravel-mocean/downloads)](https://packagist.org/packages/neoson/laravel-mocean)

## Installation

To install the library, run this command in terminal:
```bash
composer require neoson/laravel-mocean
```

### Laravel 5.5

You don't have to do anything else, this package autoloads the Service Provider and create the Alias, using the new Auto-Discovery feature.

### Laravel 5.4 and below

Add the Service Provider and Facade alias to your `config/app.php`

```php
'providers' => [
    NeoSon\Mocean\Laravel\MoceanServiceProvider::class,
]

'aliases' => [
    'Mocean' => NeoSon\Mocean\Laravel\Facade::class,
]
```

### Publish the config file

```bash
php artisan vendor:publish --provider="NeoSon\Mocean\Laravel\MoceanServiceProvider"
```

## Usage

Creating a Mocean object
```php
//use configured mocean setting
$mocean = app('mocean');

//custom setting
$mocean = new NeoSon\Mocean\Mocean($apiKey, $apiSecret);
```

Send a text message
```php
$mocean->message('NeoSon', '60123456789', 'Simple Text');
```

Get the configured [Mocean SDK](https://github.com/MoceanAPI/mocean-sdk-php) Object
```php
$sdk = $mocean->getMocean();
```

If you have multiple account defined in config
```php
$mocean->using('second_account')->message('NeoSon', '60123456789', 'Simple Text');
$mocean->using('third_account')->message('NeoSon', '60123456789', 'Simple Text');
```

or use credential programmatically
```php
//by \Mocean\Client\Credentials\Basic class
$mocean->using(
    new \Mocean\Client\Credentials\Basic('mocean_api_key', 'mocean_api_secret')
)->message('NeoSon', '60123456789', 'Simple Text');

//by using array
$mocean->using([
    'MOCEAN_API_KEY' => 'mocean_api_key',
    'MOCEAN_API_SECRET' => 'mocean_api_secret'
])->message('NeoSon', '60123456789', 'Simple Text');
```

### Using Facade

Facade auto configured using the config file, make sure u publish the config file.

Include this facade
```php
use Mocean;

Mocean::message(...);
Mocean::using(...)->message(...);
Mocean::getMocean();
```

then u can statically call all function defined in \NeoSon\Mocean\MoceanInterface.
Look [Usage](#usage) for more usage info.

## License

Laravel Mocean is licensed under the [MIT License](LICENSE)
