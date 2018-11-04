Laravel Mocean
===============
Laravel Mocean API Integration

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
$mocean = new NeoSon\Mocean\Mocean($apiKey, $apiSecret, $from);
```

Send a text message
```php
$mocean->message('60123456789', 'Simple Text');
```

Get the configured [Mocean SDK](https://github.com/MoceanAPI/mocean-sdk-php) Object
```php
$sdk = $mocean->getMocean();
```

### Using Facade

Facade auto configured using the config file, make sure u publish the config file.

Include this facade
```php
use Mocean;
```

Send a text message
```php
Mocean::message('60123456789', 'Simple Text');
```

If you have multiple account defined in config
```php
Mocean::using('second_account')->message('60123456789', 'Simple Text');
Mocean::using('third_account')->message('60123456789', 'Simple Text');
```

## License

Laravel Mocean is licensed under the [MIT License](LICENSE)
