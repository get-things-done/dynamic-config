# 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/get-things-done/dynamic-config.svg?style=flat-square)](https://packagist.org/packages/get-things-done/dynamic-config)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/get-things-done/dynamic-config/run-tests?label=tests)](https://github.com/get-things-done/dynamic-config/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/get-things-done/dynamic-config.svg?style=flat-square)](https://packagist.org/packages/get-things-done/dynamic-config)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.


## Installation

You can install the package via composer:

```bash
composer require get-things-done/dynamic-config
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="GetThingsDone\DynamicConfig\DynamicConfigServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="GetThingsDone\DynamicConfig\DynamicConfigServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

``` php
//Determine if the given dynamic configuration value exists.
app('dynamic_config')->has('key');

//Get the specified dynamic configuration value.
app('dynamic_config')->get('key');

//Get all of the dynamic configuration items for the application.
app('dynamic_config')->all();

//Set a given dynamic configuration value.
app('dynamic_config')->set('key','value');

//Prepend a value onto an array dynamic configuration value.
app('dynamic_config')->prepend('key','value');

//Push a value onto an array dynamic configuration value.
app('dynamic_config')->push('key','value');

```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Cao Minh Duc](https://github.com/CaoMinhDuc)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
