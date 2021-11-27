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
    'secretKey' => 'FLWSECK_TEST-8bfa3677596bd0967882c4a4c9603790-X',
]);

$response = $flutterwave
    ->transactions
    ->all([]);

var_dump($response['data'][0]);

\\ dumps
array(21) { ["id"]=> int(2654445) ["tx_ref"]=> string(44) "billing_inv_8eed889459f14cd0b2afadd485fe85fa" ["flw_ref"]=> string(41) "FLW-M03K-4bbacc878adb35c76cf37e95e61d26e4" ["device_fingerprint"]=> string(3) "N/A" ["amount"]=> float(8958.333333333332) ["currency"]=> string(3) "NGN" ["charged_amount"]=> float(8958.33) ["app_fee"]=> float(125.42) ["merchant_fee"]=> int(0) ["processor_response"]=> string(8) "Approved" ["auth_model"]=> string(6) "noauth" ["ip"]=> string(14) "52.209.154.143" ["narration"]=> string(23) "Sample tokenized charge" ["status"]=> string(10) "successful" ["payment_type"]=> string(4) "card" ["created_at"]=> string(24) "2021-11-26T11:14:11.000Z" ["amount_settled"]=> float(8832.91) ["card"]=> array(6) { ["type"]=> string(10) "MASTERCARD" ["country"]=> string(10) "NIGERIA NG" ["issuer"]=> string(18) "MASTERCARD CREDIT" ["first_6digits"]=> string(5) "55318" ["last_4digits"]=> string(4) "2950" ["expiry"]=> string(5) "09/32" } ["customer"]=> array(5) { ["id"]=> int(1450916) ["email"]=> string(18) "team-1@bizbooq.com" ["phone_number"]=> string(3) "N/A" ["name"]=> string(16) "Faruk's business" ["created_at"]=> string(24) "2021-11-24T21:17:04.000Z" } ["account_id"]=> int(779467) ["meta"]=> NULL }
```

## Documentation

See the [PHP API docs](https://developer.flutterwave.com/reference#introduction-1).
