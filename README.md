# Flutterwave PHP bindings

[![Latest Stable Version](http://poser.pugx.org/starfolksoftware/flutterwave-php/v)](https://packagist.org/packages/starfolksoftware/flutterwave-php) [![Total Downloads](http://poser.pugx.org/starfolksoftware/flutterwave-php/downloads)](https://packagist.org/packages/starfolksoftware/flutterwave-php) [![Latest Unstable Version](http://poser.pugx.org/starfolksoftware/flutterwave-php/v/unstable)](https://packagist.org/packages/starfolksoftware/flutterwave-php) [![License](http://poser.pugx.org/starfolksoftware/flutterwave-php/license)](https://packagist.org/packages/starfolksoftware/flutterwave-php) [![PHP Version Require](http://poser.pugx.org/starfolksoftware/flutterwave-php/require/php)](https://packagist.org/packages/starfolksoftware/flutterwave-php)

The Flutterwave PHP library provides convenient access to the Flutterwave API from
applications written in the PHP language. It includes a pre-defined set of
classes for API resources that initialize themselves dynamically from API
responses which makes it compatible with a wide range of versions of the Flutterwave
API.

## Requirements

PHP 8.0 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require starfolksoftware/flutterwave-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Dependencies

Any package that implements [psr/http-client-implementation](https://packagist.org/providers/psr/http-client-implementation)

## Getting Started

Simple usage looks like:

```php
<?php

require_once "vendor/autoload.php";

use StarfolkSoftware\Flutterwave\Client as FlutterwaveClient;

$flutterwave = new FlutterwaveClient([
    'secretKey' => 'FLWSECK_TEST-*******',
]);

$response = $flutterwave
    ->transactions
    ->all([]);

var_dump($response['data'][0]);

\\ dumps
array(21) { ... }
...
```

## Documentation

See the [PHP API docs](https://developer.flutterwave.com/reference#introduction-1).
