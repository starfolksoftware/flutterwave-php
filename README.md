# [WIP] Flutterwave PHP bindings

[![Latest Stable Version](https://poser.pugx.org/starfolksoftware/flutterwave-php/v/stable.svg)](https://packagist.org/packages/starfolksoftware/flutterwave-php)
[![License](https://poser.pugx.org/starfolksoftware/flutterwave-php/license.svg)](https://packagist.org/packages/starfolksoftware/flutterwave-php)

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

## Roadmap

- [ ] Charge
- [ ] Validate a charge
- [x] Tokenized Charges
- [ ] Preauthorization
- [x] Transactions
- [ ] Transfers
- [x] Beneficiaries
- [ ] Virtual cards
- [ ] Virtual account number
- [x] Payment Plans
- [x] Subscriptions
- [ ] Collection subaccounts
- [ ] Payout subaccounts
- [ ] Bills
- [ ] Remita payments
- [ ] Banks
- [ ] Misc
- [ ] Settlements
- [ ] OTPS
- [ ] Chargebacks

## Documentation

See the [PHP API docs](https://developer.flutterwave.com/reference#introduction-1).
