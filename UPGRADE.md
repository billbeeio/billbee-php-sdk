# Migration Guide

## `Client::$useBatching`

This field was made private. The Client itself implements the `\BillbeeDe\BillbeeAPI\BatchClientInterface`. Use the
following methods for migration

- `BatchClientInterface::enableBatchMode()`
- `BatchClientInterface::disableBatchMode()`
- `BatchClientInterface::isBatchModeEnabled()`

## Endpoints

The client does not implement the request actions anymore. Instead, we provide "Endpoints" which groups the requests by
its topic. This change was made for testing purposes.

### `Client::cloudStorages()` (`CloudStorageEndpoint`)
Former methods:
- `Client::getCloudStorages()`

### `Client::customers()` (`CustomersEndpoint`)
Former methods:
- `Client::getCustomers()`
- `Client::getCustomer()`
- `Client::getCustomerAddresses()`
- `Client::getCustomerAddress()`
- `Client::getCustomerOrders()`
- `Client::createCustomer()`
- `Client::updateCustomer()`

### `Client::events()` (`EventsEndpoint`)
Former methods:
- `Client::getEvents()`

### `Client::invoices()` (`InvoiceEndpoint`)
Former methods:
- `Client::getInvoices()`

### `Client::layouts()` (`LayoutsEndpoint`)
Former methods:
- `Client::getLayouts()`

### `Client::orders()` (`OrdersEndpoint`)
Former methods:
- `Client::getOrders()`
- `Client::getPatchableFields()`
- `Client::getOrder()`
- `Client::getOrderByOrderNumber()`
- `Client::getOrderByPartner()`
- `Client::createOrder()`
- `Client::addOrderTags()`
- `Client::addOrderShipment()`
- `Client::createDeliveryNote()`
- `Client::createInvoice()`
- `Client::sendMessage()`
- `Client::setOrderTags()`
- `Client::setOrderState()`
- `Client::patchOrder()`

### `Client::productCustomFields()` (`ProductCustomFieldsEndpoint`)
Former methods:
- `Client::getCustomFieldDefinitions()`
- `Client::getCustomFieldDefinition()`

### `Client::products()` (`ProductsEndpoint`)
Former methods:
- `Client::updateStock()`
- `Client::updateStockMultiple()`
- `Client::updateStockCode()`
- `Client::createProduct()`
- `Client::patchProduct()`
- `Client::deleteProduct()`

### `Client::provisioning()` (`ProvisioningEndpoint`)
Former methods:
- `Client::getTermsInfo()`

### `Client::search()` (`SearchEndpoint`)
Former methods:
- `Client::search()`

### `Client::shipments()` (`ShipmentsEndpoint`)
Former methods:
- `Client::getShippingProviders()`
- `Client::shipWithLabel()`

### `Client::webHooks()` (`WebHooksEndpoint`)
Former methods:
- `Client::getWebHooks()`
- `Client::getWebHook()`
- `Client::getWebHookFilters()`
- `Client::createWebHook()`
- `Client::updateWebHook()`
- `Client::deleteAllWebHooks()`
- `Client::deleteWebHookById()`
- `Client::deleteWebHook()`