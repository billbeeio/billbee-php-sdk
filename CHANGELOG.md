# Changelog

## Next Version

New features:
- Added missing fields to the product model ([PR #32](https://github.com/billbeeio/billbee-php-sdk/pull/32))
  - `Product::$condition`
  - `Product::$widthCm`
  - `Product::$lengthCm`
  - `Product::$heightCm`
  - `Product::$billOfMaterial` 
- `GET /api/v1/products/PatchableFields` added. (`Client::getPatchableProductFields()`);
- `PATCH /api/v1/products/{id}` added. (`Client::patchProduct($productId, $model)`);

## 1.7.0 (15 Nov 2019)
New features:
- `GET /api/v1/cloudstorages` added. (`Client::getCloudStorages()`) ([PR #18](https://github.com/billbeeio/billbee-php-sdk/pull/18))
- `GET /api/v1/products/category` added. (`Client::getCategories()`) ([PR #19](https://github.com/billbeeio/billbee-php-sdk/pull/19))
- `GET /api/v1/layouts` added. (`Client::getLayouts()`) ([PR #20](https://github.com/billbeeio/billbee-php-sdk/pull/20))
- Added `$templateId` and `$sendToCloudId` to `Client::createInvoice()` ([PR #20](https://github.com/billbeeio/billbee-php-sdk/pull/20))
- `POST /api/v1/products` added. (`Client::createProduct($product)`) ([PR #25](https://github.com/billbeeio/billbee-php-sdk/pull/25))
- `POST /api/v1/search` added. (`Client::search()`) ([PR #26](https://github.com/billbeeio/billbee-php-sdk/pull/26))

Bug fixes:
- Unit tests fixed ([PR #23](https://github.com/billbeeio/billbee-php-sdk/pull/23))
- Default values in the `Product` class fixed ([PR #23](https://github.com/billbeeio/billbee-php-sdk/pull/23))

Misc:
- Added composer scripts for development ([PR #24](https://github.com/billbeeio/billbee-php-sdk/pull/24))
- Added a code documentation generator ([PR #24](https://github.com/billbeeio/billbee-php-sdk/pull/24))
- Fixed code style ([PR #24](https://github.com/billbeeio/billbee-php-sdk/pull/24))

## 1.6.2 (16 Sep 2019)

New features:
- Added the `SoldProduct` model which is used in `OrderItem::$product`

Bug Fixes:
- Added a mapping for `Order::$paymentTransactionId` and `Order::$deliverySourceCountryCode`

## 1.6.1 (24 Jul 2019)

Bug Fixes:
- Fixed `use-before-initialize` bug in the `Client::__construct` ([PR #15](https://github.com/billbeeio/billbee-php-sdk/pull/15))
- Fixed empty response bug ([PR #17](https://github.com/billbeeio/billbee-php-sdk/pull/17))

## v1.6.0 (1 Apr 2019)

New features:
- Added a `DiagnosticsLogger` for debugging

## v1.5.0 (7 Mar 2019)

New features:
- `POST /api/v1/shipment/shipwithlabel` added. (`Client::shipWithLabel(Model\ShipmentWithLabel)`)

## v1.4.1 (7 Jan 2019)

Bug Fixes:
- `Order::$vatMode` used the wrong type.

General:
- Copyright updated

## v1.4.0 (12 Dec 2018)

New features:
- Added the `Order::$distributionCenter` property
- Single customer addresses can now queried with the `getCustomerAddress`
- Added the `Order::$customer` property
- `.gitattributes` added to exclude test files in prod

Bug fixes:
- `The alternative email address is ignored because sendMode != 4` logger warning fixed
- Several type annotations fixed

General:
- Abandoned package `json-object-mapper` replaced by `data-model-mapper`
- Test coverage increased

## v1.3.0 (6 Nov 2018)

- Added the lookupBy parameter to the `getProduct()` call
- Added the properties `ShippingProviderId`, `ShippingProviderProductId`, `ShippingProviderName`, `ShippingProviderProductName` to the `getOrder()` resposne


## v1.2.0 (3 Oct 2018)

- sendMessage endpoint implemented ([PR #11](https://github.com/billbeeio/billbee-php-sdk/pull/11))
- serialNumber in OrderItem added and orderId parameter added in getEvents ([PR #12](https://github.com/billbeeio/billbee-php-sdk/pull/12))
- Added logger interface ([PR #13](https://github.com/billbeeio/billbee-php-sdk/pull/13))

## v1.1.5 (27 Aug 2018)

- Removed dev proxy from client ([PR #9](https://github.com/billbeeio/billbee-php-sdk/pull/9))

## v1.1.4 (23 Aug 2018)

- `articleTitleSource` and `excludeTags` arguments added to `getOrders()` ([PR #5](https://github.com/billbeeio/billbee-php-sdk/pull/5)) 
- `AutosubtractReservedAmount` parameter added to stock model
- Customer Endpoints implemented
- Links updated from `app01.billbee.de` to `app.billbee.io`
- Changelog added

### Internal Changes
- Code folding optimized
- Imports optimized



## v1.1.3 (20 Aug 2018)
- `/api/v1/products/custom-fields` endpoints added
- `/api/v1/webhooks` endpoints added
- `unrebatedTotalPrice` property added to `OrderItem`
- `customFields` property added to `Product`
- Tests optimized
- Typos / spelling fixed

## v1.1.2 (13 Apr 2018)
- Added a type check in the constructor of the stock model.  ([Issue #4](https://github.com/billbeeio/billbee-php-sdk/issues/4))

## v1.1.1 (30 Jan 2018)
- Proxy setting removed

## v1.1.0 (30 Jan 2018)
- Batch requests implemented

## v1.0.2 (30 Jan 2018)
- `patchOrder` and `getPatchableFields` method implemeted.
- Copyright updated
- `PartnerOrder.paidAt` property type changed from `bool` to `datetime`

## v1.0.1 (28 Nov 2017)
- TypeMismatch in OrderItemAttribute fixed ([Issue #2](https://github.com/billbeeio/billbee-php-sdk/issues/2))

## v1.0.0  - Initial Release (17 Oct 2017)
