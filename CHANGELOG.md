# Changelog

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