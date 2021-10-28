This guide shows you how to use the SDK without having composer installed in your project.

Even if you don't use composer in your project, you need to [install composer](https://getcomposer.org/download/) for this guide.

After you installed composer follow this steps in a command line:

```bash
# Clone the Repository
git clone https://github.com/billbeeio/billbee-php-sdk.git
# Navigate in the repository folder
cd billbee-php-sdk

# Optional: checkout the version that you need
# git checkout tags/v2.0.0-RC3

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

use BillbeeDe\BillbeeAPI\Client;
use BillbeeDe\BillbeeAPI\Response;

require_once __DIR__ . '/sdk-dist/autoload.php';

$user = 'Your Billbee username';
$apiPassword = 'Your Billbee API Password'; // https://app.billbee.io/de/settings/api
$apiKey = 'Your Billbee API Key';
 
$client = new Client($user, $apiPassword, $apiKey);
$client->enableBatchMode(); # Enable batching
 
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
