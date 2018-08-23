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

## Official API Documentation
[https://app.billbee.io/swagger/ui/index](https://app.billbee.io/swagger/ui/index)

## Usage

Simply instantiate a client object for accessing the api:
```php
<?php

$user = 'Your Billbee username';
$apiPassword = 'Your Billbee API Password'; // https://app.billbee.io/de/settings/api
$apiKey = 'Your Billbee API Key';

$client = new \BillbeeDe\BillbeeAPI\Client($user, $apiPassword, $apiKey);
```

## Example: Retrieve a list of products
```php
<?php
 
$user = 'Your Billbee username';
$apiPassword = 'Your Billbee API Password'; // https://app.billbee.io/de/settings/api
$apiKey = 'Your Billbee API Key';
 
$client = new \BillbeeDe\BillbeeAPI\Client($user, $apiPassword, $apiKey);

/** @var \BillbeeDe\BillbeeAPI\Response\GetProductsResponse $productsResponse */
$productsResponse = $client->getProducts($page = 1, $pageSize = 10);
 
/** @var \BillbeeDe\BillbeeAPI\Model\Product $product */
foreach ($productsResponse->data as $product) {
    echo sprintf("Id: %s, SKU: %s, Price: %f\n", $product->id, $product->sku, $product->price);
}
```

## Example: Batch requests
```php

<?php

$user = 'Your Billbee username';
$apiPassword = 'Your Billbee API Password'; // https://app.billbee.io/de/settings/api
$apiKey = 'Your Billbee API Key';
 
$client = new \BillbeeDe\BillbeeAPI\Client($user, $apiPassword, $apiKey);
$client->useBatching = true; # Enable batching
 
$client->getProducts(1, 1); # Adds the request to the batch pool / returns null
$client->getOrders(1, 1); # Adds the request to the batch pool / returns null
$client->getEvents(1, 1); # Adds the request to the batch pool / returns null
 
$results = $client->executeBatch(); # Results contain all responses in the added order
 
/** @var \BillbeeDe\BillbeeAPI\Response\GetProductsResponse $productsResult */
$productsResult = $results[0];
 
/** @var \BillbeeDe\BillbeeAPI\Response\GetOrdersResponse $productsResult */
$ordersResult = $results[1];
 
/** @var \BillbeeDe\BillbeeAPI\Response\GetEventsResponse $productsResult */
$eventsResult = $results[2];
```

## Testing
Clone the repository, copy the `test_config.dist.yml` to `test_config.yml` and fill it.
Run `phpunit`

## Contributing
Feel free to fork the repository and create pull-requests
