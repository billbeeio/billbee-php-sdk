This guide shows you how to use the SDK without having composer installed in your project.

Even if you don't use composer in your project, you need to [install composer](https://getcomposer.org/download/) for this guide.

After you installed composer follow this steps in a command line:

```bash
# Clone the Repository
git clone https://github.com/billbeeio/billbee-php-sdk.git
# Navigate in the repository folder
cd billbee-php-sdk
# Install the prod dependencies using composer
composer install --no-dev --optimize-autoloader
# Create a output directory
mkdir sdk-dist
```

MacOS / Linux:
```bash
# Move needed files into the output directory
mv vendor/autoload.php src vendor sdk-dist/
# Update the composer autoloader path
sed -i 's/\/composer\//\/vendor\/composer\//g' sdk-dist/autoload.php
```

Windows:
```bash
# Move needed files into the output directory
move vendor\autoload.php sdk-dist
move src sdk-dist/src
move vendor sdk-dist/vendor
# Open the sdk-dist\autoload.php and replace
# require_once __DIR__ . '/composer/autoload_real.php';
# with
# require_once __DIR__ . '/vendor/composer/autoload_real.php';
```

Now copy the `sdk-dist` to your target directory and `require_once` the `autoload.php`

For example:
```php
<?php

require_once __DIR__ . '/sdk-dist/autoload.php';

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
