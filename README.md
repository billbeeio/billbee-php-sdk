[![Packagist](https://img.shields.io/packagist/v/billbee/billbee-api.svg)](https://packagist.org/packages/billbee/billbee-api)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/billbeeio/billbee-php-sdk/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/dt/billbee/billbee-api.svg)](https://packagist.org/packages/billbee/billbee-api)

[![Logo](https://app.billbee.io/static/billbee/img/logo.png)](https://www.billbee.de)

# Billbee API
With this package you can implement the official Billbee API in your application.

## Prerequisites
- For accessing the Billbee API you need an API Key.
To get an API key, send a mail to [support@billbee.de](mailto:support@billbee.de) and send us a short note about what you are building.
- The API module must be activated in the account ([https://app.billbee.io/app_v2/settings/api/general](https://app.billbee.io/app_v2/settings/api/general))

## Install
You can add this package as composer dependency
```bash
$ composer require billbee/billbee-api
```

[Instructions without composer](./doc/usage_without_composer.md)

## Official API Documentation
[https://app.billbee.io/swagger/ui/index](https://app.billbee.io/swagger/ui/index)

## Usage

Simply instantiate a client object for accessing the api:

```php
<?php

use BillbeeDe\BillbeeAPI\Client;

$user = 'Your Billbee username';
$apiPassword = 'Your Billbee API Password'; // https://app.billbee.io/de/settings/api
$apiKey = 'Your Billbee API Key';

$client = new Client($user, $apiPassword, $apiKey);
```

## Example: Retrieve a list of products

```php
<?php
 
use BillbeeDe\BillbeeAPI\Client;

$user = 'Your Billbee username';
$apiPassword = 'Your Billbee API Password'; // https://app.billbee.io/de/settings/api
$apiKey = 'Your Billbee API Key';
 
$client = new Client($user, $apiPassword, $apiKey);

/** @var \BillbeeDe\BillbeeAPI\Response\GetProductsResponse $productsResponse */
$productsResponse = $client->products()->getProducts($page = 1, $pageSize = 10);
 
/** @var \BillbeeDe\BillbeeAPI\Model\Product $product */
foreach ($productsResponse->data as $product) {
    echo sprintf("Id: %s, SKU: %s, Price: %f\n", $product->id, $product->sku, $product->price);
}
```

## Example: Batch requests

```php
<?php

use BillbeeDe\BillbeeAPI\Client;
use BillbeeDe\BillbeeAPI\Response;

$user = 'Your Billbee username';
$apiPassword = 'Your Billbee API Password'; // https://app.billbee.io/de/settings/api
$apiKey = 'Your Billbee API Key';
 
$client = new Client($user, $apiPassword, $apiKey);
$client->enableBatchMode();
 
$client->products()->getProducts(1, 1); # Adds the request to the batch pool / returns null
$client->orders()->getOrders(1, 1); # Adds the request to the batch pool / returns null
$client->events()->getEvents(1, 1); # Adds the request to the batch pool / returns null
 
$results = $client->executeBatch(); # Results contain all responses in the added order
 
/** @var Response\GetProductsResponse $productsResult */
$productsResult = $results[0];
 
/** @var Response\GetOrdersResponse $ordersResult */
$ordersResult = $results[1];
 
/** @var Response\GetEventsResponse $eventsResult */
$eventsResult = $results[2];
```

## Testing
Run `phpunit`

## Contributing
Feel free to fork the repository and create pull-requests
