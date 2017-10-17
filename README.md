[![Logo](https://app01.billbee.de/static/billbee/img/logo.png)](https://www.billbee.de)

# Billbee API
With this package you can implement the official Billbee API in your application.

## Prerequisites
- For accessing the Billbee API you need an API Key.
To get an API key, send a mail to [support@billbee.de](mailto:support@billbee.de) and send us a short note about what you are building.
- The API module must be activated in the account ([https://app01.billbee.de/de/settings/api](https://app01.billbee.de/de/settings/api))

## Install
You can add this package as composer dependency
```bash
$ composer require billbee/billbee-api
```

## Official API Documentation
[https://app01.billbee.de/swagger/ui/index](https://app01.billbee.de/swagger/ui/index)

## Usage

Simply instantiate a client object for accessing the api:
```php
<?php

$user = 'Your Billbee username';
$apiPassword = 'Your Billbee API Password'; // https://app01.billbee.de/de/settings/api
$apiKey = 'Your Billbee API Key';

$client = new \BillbeeDe\BillbeeAPI\Client($user, $apiPassword, $apiKey);
```

### Class methods
```text
__construct()
getProducts()
updateStock()
updateStockMultiple()
updateStockCode()
getProduct()
getTermsInfo()
getEvents()
getOrders()
getOrder()
getOrderByOrderNumber()
getOrderByPartner()
createOrder()
addOrderTags()
addOrderShipment()
createDeliveryNote()
createInvoice()
setOrderTags()
setOrderState()
getInvoices()
getShippingProviders()
```

## Example: Retrieve a list of products
```php
<?php
 
$user = 'Your Billbee username';
$apiPassword = 'Your Billbee API Password'; // https://app01.billbee.de/de/settings/api
$apiKey = 'Your Billbee API Key';
 
$client = new \BillbeeDe\BillbeeAPI\Client($user, $apiPassword, $apiKey);

/** @var \BillbeeDe\BillbeeAPI\Response\GetProductsResponse $productsResponse */
$productsResponse = $client->getProducts($page = 1, $pageSize = 10);
 
/** @var \BillbeeDe\BillbeeAPI\Model\Product $product */
foreach ($productsResponse->data as $product) {
    echo sprintf("Id: %s, SKU: %s, Price: %f\n", $product->id, $product->sku, $product->price);
}
```

## Testing
Clone the repository, copy the `test_config.dist.yml` to `test_config.yml` and fill it.
Run `phpunit`

## Contributing
Feel free to fork the repository and create pull-requests
