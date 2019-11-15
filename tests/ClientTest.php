<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2019 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Client;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model\Customer;
use BillbeeDe\BillbeeAPI\Model\CustomerAddress;
use BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition;
use BillbeeDe\BillbeeAPI\Model\DeliveryNoteDocument;
use BillbeeDe\BillbeeAPI\Model\Dimensions;
use BillbeeDe\BillbeeAPI\Model\Event;
use BillbeeDe\BillbeeAPI\Model\Invoice;
use BillbeeDe\BillbeeAPI\Model\InvoiceDocument;
use BillbeeDe\BillbeeAPI\Model\InvoicePosition;
use BillbeeDe\BillbeeAPI\Model\MessageForCustomer;
use BillbeeDe\BillbeeAPI\Model\Order;
use BillbeeDe\BillbeeAPI\Model\OrderItem;
use BillbeeDe\BillbeeAPI\Model\PartnerOrder;
use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\Shipment;
use BillbeeDe\BillbeeAPI\Model\ShipmentWithLabel;
use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use BillbeeDe\BillbeeAPI\Model\Stock;
use BillbeeDe\BillbeeAPI\Model\StockCode;
use BillbeeDe\BillbeeAPI\Model\TermsInfo;
use BillbeeDe\BillbeeAPI\Model\TranslatableText;
use BillbeeDe\BillbeeAPI\Model\WebHook;
use BillbeeDe\BillbeeAPI\Model\WebHookFilter;
use BillbeeDe\BillbeeAPI\Response\BaseResponse;
use BillbeeDe\BillbeeAPI\Response\CreateDeliveryNoteResponse;
use BillbeeDe\BillbeeAPI\Response\CreateInvoiceResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressesResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomerResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomersResponse;
use BillbeeDe\BillbeeAPI\Response\GetEventsResponse;
use BillbeeDe\BillbeeAPI\Response\GetInvoicesResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrderByPartnerResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrderResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrdersResponse;
use BillbeeDe\BillbeeAPI\Response\GetPatchableFieldsResponse;
use BillbeeDe\BillbeeAPI\Response\GetProductResponse;
use BillbeeDe\BillbeeAPI\Response\GetProductsResponse;
use BillbeeDe\BillbeeAPI\Response\GetShippingProvidersResponse;
use BillbeeDe\BillbeeAPI\Response\GetTermsInfoResponse;
use BillbeeDe\BillbeeAPI\Response\UpdateStockResponse;
use BillbeeDe\BillbeeAPI\Type\ArticleSource;
use BillbeeDe\BillbeeAPI\Type\EventType;
use BillbeeDe\BillbeeAPI\Type\OrderState;
use DateTime;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\Yaml\Yaml;

class ClientTest extends TestCase
{
    protected $username = '';
    protected $password = '';
    protected $apiKey = '';
    protected $sampleProductId = '';
    protected $shopId = '';
    protected $tag = '';
    protected $sampleOrderId = '';
    protected $sampleOrderNumber = '';
    protected $partner = '';
    protected $partnerId = '';
    protected $customFieldDefinitionId = '';
    protected $webHookUri = '';
    protected $testDeleteWebHooks = false;
    protected $customerId = '';
    protected $addressId;
    protected $shippableOrderId;
    protected $shippingProviderId;
    protected $shippingProviderProduct;
    protected $cloudStorageId = 0;
    protected $categoryId = 0;
    protected $layoutId = 0;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $data = Yaml::parse(file_get_contents(__DIR__ . '/../test_config.yml'));
        list(
            $this->username,
            $this->password,
            $this->apiKey,
            $this->sampleProductId,
            $this->shopId,
            $this->tag,
            $this->sampleOrderId,
            $this->sampleOrderNumber,
            $this->partner,
            $this->partnerId,
            $this->customFieldDefinitionId,
            $this->webHookUri,
            $this->testDeleteWebHooks,
            $this->customerId,
            $this->addressId,
            $this->shippableOrderId,
            $this->shippingProviderId,
            $this->shippingProviderProduct,
            $this->cloudStorageId,
            $this->categoryId,
            $this->layoutId,
            ) = [
            $data['username'],
            $data['password'],
            $data['api_key'],
            $data['sample_product'],
            $data['shop_id'],
            $data['tag'],
            $data['sample_order'],
            $data['sample_order_number'],
            $data['partner'],
            $data['partner_id'],
            $data['custom_field_definition_id'],
            $data['web_hook_uri'],
            $data['test_delete_web_hooks'],
            $data['customer_id'],
            $data['address_id'],
            $data['shippable_order_id'],
            $data['shipping_provider_id'],
            $data['shipping_provider_product'],
            $data['cloud_storage_id'],
            $data['category_id'],
            $data['layout_id'],
        ];
    }

    /** @throws Exception */
    public function testConstruct()
    {
        $client = $this->getClient();
        $this->assertInstanceOf(Client::class, $client);
    }

    /** @throws Exception */
    public function testGetProductsFails()
    {
        $client = $this->getClient();
        $client->getProducts(1, 1, new DateTime('now'));
        $client->getProducts(1, 1, new DateTime('now'));

        $this->expectException(QuotaExceededException::class);
        $this->expectExceptionMessage('quota exceeded');
        $client->getProducts(1, 1, new DateTime('now'));
        $client->getProducts(1, 1, new DateTime('now'));
    }

    /** @throws Exception */
    public function testGetProducts()
    {
        $client = $this->getClient();
        sleep(1);

        $productsResponse = $client->getProducts(1, 1);
        $this->assertTrue($productsResponse instanceof GetProductsResponse);
        $this->assertGreaterThan(0, $productsResponse->data);
        $this->assertTrue($productsResponse->data[0] instanceof Product);

        $productsResponse2 = $client->getProducts(2, 1);
        $this->assertTrue($productsResponse2 instanceof GetProductsResponse);
        $this->assertGreaterThan(0, $productsResponse2->data);
        $this->assertNotEquals($productsResponse->data[0], $productsResponse2->data[0]);
    }

    /** @throws Exception */
    public function testGetProduct()
    {
        $client = $this->getClient();
        sleep(1);

        $productResponse = $client->getProduct($this->sampleProductId);

        $this->assertTrue($productResponse instanceof GetProductResponse);
        $this->assertTrue($productResponse->data instanceof Product);
    }

    /** @throws Exception */
    public function testGetTermsInfo()
    {
        $client = $this->getClient();
        sleep(1);

        $termsInfoResponse = $client->getTermsInfo();

        $this->assertTrue($termsInfoResponse instanceof GetTermsInfoResponse);
        $this->assertTrue($termsInfoResponse->data instanceof TermsInfo);
    }

    /** @throws Exception */
    public function testGetEvents()
    {
        $client = $this->getClient();
        sleep(1);

        $eventsResponse = $client->getEvents(
            2,
            10,
            new DateTime('01.01.2017'),
            new DateTime(),
            [EventType::ORDER_IMPORTED],
            $this->sampleOrderId
        );
        $this->assertInstanceOf(GetEventsResponse::class, $eventsResponse);
        $this->assertEquals(0, $eventsResponse->errorCode);
        $this->assertTrue(is_array($eventsResponse->data));
        $this->assertGreaterThanOrEqual(0, count($eventsResponse->data));
        if (count($eventsResponse->data) > 0) {
            $this->assertInstanceOf(Event::class, $eventsResponse->data[0]);
        }
    }

    /** @throws Exception */
    public function testGetShippingProviders()
    {
        $client = $this->getClient();
        sleep(1);

        $shippingProvidersResponse = $client->getShippingProviders();
        $this->assertInstanceOf(GetShippingProvidersResponse::class, $shippingProvidersResponse);
        $this->assertTrue(is_array($shippingProvidersResponse->data));
        $this->assertGreaterThan(1, count($shippingProvidersResponse->data));
        $this->assertInstanceOf(ShippingProvider::class, $shippingProvidersResponse->data[0]);
    }

    /** @throws Exception */
    public function testGetInvoicesFailsWrongShopId()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('shopId must be an instance of int or an array of int');
        $client->getInvoices(
            2,
            10,
            new DateTime('01.01.2017'),
            new DateTime(),
            ['asdf'],
            2,
            [],
            new DateTime('01.01.2017'),
            new DateTime(),
            false
        );
    }

    /** @throws Exception */
    public function testGetInvoicesFailsWrongStateId()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('orderStateId must be an instance of int or an array of int');
        $client->getInvoices(
            2,
            10,
            new DateTime('01.01.2017'),
            new DateTime(),
            $this->shopId,
            ['asdf'],
            [],
            new DateTime('01.01.2017'),
            new DateTime(),
            false
        );
    }

    /** @throws Exception */
    public function testGetInvoices()
    {
        $client = $this->getClient();
        sleep(1);

        $invoices = $client->getInvoices(
            1,
            10,
            new DateTime('01.01.2017'),
            new DateTime(),
            $this->shopId,
            2,
            $this->tag,
            new DateTime('01.01.2017'),
            new DateTime(),
            false
        );
        $this->assertEquals(0, $invoices->errorCode);
        $this->assertInstanceOf(GetInvoicesResponse::class, $invoices);
        $this->assertTrue(is_array($invoices->data));
        $this->assertGreaterThanOrEqual(0, count($invoices->data));
        $this->assertInstanceOf(Invoice::class, $invoices->data[0]);
        if (isset($invoices->data[0])) {
            $this->assertCount(0, $invoices->data[0]->positions);
        }
    }

    /** @throws Exception */
    public function testGetInvoicesAndPositions()
    {
        $client = $this->getClient();
        sleep(1);

        $invoices = $client->getInvoices(
            1,
            10,
            new DateTime('01.01.2017'),
            new DateTime(),
            [$this->shopId],
            [2],
            $this->tag,
            new DateTime('01.01.2017'),
            new DateTime(),
            true
        );

        $this->assertEquals(0, $invoices->errorCode);
        $this->assertInstanceOf(GetInvoicesResponse::class, $invoices);
        $this->assertTrue(is_array($invoices->data));
        $this->assertGreaterThanOrEqual(0, count($invoices->data));
        $this->assertInstanceOf(Invoice::class, $invoices->data[0]);
        $this->assertGreaterThan(0, count($invoices->data[0]->positions));
        if (isset($invoices->data[0])) {
            $this->assertInstanceOf(InvoicePosition::class, $invoices->data[0]->positions[0]);
        }
    }

    /** @throws Exception */
    public function testGetOrders()
    {
        $client = $this->getClient();
        sleep(1);
        $orders = $client->getOrders(
            1,
            19,
            new DateTime('01.01.2017'),
            new DateTime(),
            [$this->shopId],
            [2],
            $this->tag,
            1,
            new DateTime('01.01.2017'),
            new DateTime(),
            ArticleSource::ORDER_POSITION,
            true
        );

        $this->assertEquals(0, $orders->errorCode);
        $this->assertInstanceOf(GetOrdersResponse::class, $orders);
        $this->assertTrue(is_array($orders->data));
        $this->assertGreaterThanOrEqual(0, count($orders->data));
        if (isset($orders->data[0])) {
            $this->assertInstanceOf(Order::class, $orders->data[0]);
            $this->assertGreaterThan(0, count($orders->data[0]->orderItems));
            $this->assertInstanceOf(OrderItem::class, $orders->data[0]->orderItems[0]);
        }
        sleep(1);
        $orders2 = $client->getOrders(
            1,
            19,
            new DateTime('01.01.2017'),
            new DateTime(),
            $this->shopId, // No array
            2, // No array
            $this->tag,
            1,
            new DateTime('01.01.2017'),
            new DateTime(),
            ArticleSource::ORDER_POSITION,
            true
        );

        $this->assertEquals($orders, $orders2);
    }

    /** @throws Exception */
    public function testGetOrdersFailsShopIdNaN()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('shopId must be an instance of int or an array of int');

        $client->getOrders(
            2,
            19,
            new DateTime('01.01.2017'),
            new DateTime(),
            ['hello'],
            [2],
            $this->tag,
            1,
            new DateTime('01.01.2017'),
            new DateTime()
        );
    }

    /** @throws Exception */
    public function testGetOrdersFailsOrderStateIdNaN()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('orderStateId must be an instance of int or an array of int');

        $client->getOrders(
            2,
            19,
            new DateTime('01.01.2017'),
            new DateTime(),
            [1],
            ['hello'],
            $this->tag,
            1,
            new DateTime('01.01.2017'),
            new DateTime()
        );
    }

    /** @throws Exception */
    public function testGetOrdersFailsArticleSourceInvalid()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The articleTitleSource is invalid. Check ' . ArticleSource::class . ' for valid values');

        $client->getOrders(
            2,
            19,
            new DateTime('01.01.2017'),
            new DateTime(),
            [1],
            [],
            $this->tag,
            1,
            new DateTime('01.01.2017'),
            new DateTime(),
            3
        );

        $client->getOrders(
            2,
            19,
            new DateTime('01.01.2017'),
            new DateTime(),
            [1],
            [],
            $this->tag,
            1,
            new DateTime('01.01.2017'),
            new DateTime(),
            false
        );
    }

    /** @throws Exception */
    public function testGetOrder()
    {
        $client = $this->getClient();
        sleep(1);
        /** @var GetOrderResponse $order */
        $order = $client->getOrder($this->sampleOrderId);
        $this->assertInstanceOf(GetOrderResponse::class, $order);
        $this->assertInstanceOf(Order::class, $order->data);
        $this->assertInstanceOf(Customer::class, $order->data->customer);
    }

    /** @throws Exception */
    public function testGetOrderByOrderNumber()
    {
        $client = $this->getClient();
        sleep(1);
        /** @var GetOrderResponse $order */
        $order = $client->getOrderByOrderNumber($this->sampleOrderNumber);
        $this->assertInstanceOf(GetOrderResponse::class, $order);
        $this->assertInstanceOf(Order::class, $order->data);
        $this->assertSame($this->sampleOrderNumber, $order->data->orderNumber);
    }

    /** @throws Exception */
    public function testUpdateStock()
    {
        $client = $this->getClient();
        sleep(1);

        $product = $client->getProduct($this->sampleProductId);
        $stockModel = Stock::fromProduct($product->data);

        $stockModel->setDeltaQuantity(1);

        $currentStockResult = $client->updateStock($stockModel);
        $this->assertInstanceOf(UpdateStockResponse::class, $currentStockResult);
        $this->assertSame($stockModel->getNewQuantity(), $currentStockResult->data['CurrentStock']);
        sleep(1);
        $product = $client->getProduct($this->sampleProductId);
        $this->assertSame($product->data->stockCurrent, $currentStockResult->data['CurrentStock']);
    }

    /** @throws Exception */
    public function testUpdateStockMultiple()
    {
        $client = $this->getClient();
        sleep(1);

        $products = $client->getProducts(1, 10);

        $stockModels = [];
        foreach ($products->data as $product) {
            if (empty($product->sku)) {
                continue;
            }
            $stockModel = Stock::fromProduct($product);
            $stockModel->setDeltaQuantity(1);
            $stockModels[] = $stockModel;
        }

        $currentStockResult = $client->updateStockMultiple($stockModels);
        $this->assertInstanceOf(UpdateStockResponse::class, reset($currentStockResult));
        foreach ($stockModels as $i => $stockModel) {
            $this->assertSame($stockModel->getNewQuantity(), $currentStockResult[$i]->data['CurrentStock']);
        }
    }

    /** @throws Exception */
    public function testUpdateStockCode()
    {
        $client = $this->getClient();
        sleep(1);
        $product = $client->getProduct($this->sampleProductId);
        $stockCode = StockCode::fromProduct($product->data);
        $stockCode->stockCode = 'asdasd';
        $stockCode->stockId = 0;

        $result = $client->updateStockCode($stockCode);
        $this->assertInstanceOf(BaseResponse::class, $result);
    }

    /** @throws Exception */
    public function testCreateOrder()
    {
        $client = $this->getClient();
        sleep(1);

        $order = $client->getOrder($this->sampleOrderId)->data;
        $order->externalId = 'API_ORDER_' . substr(md5(time()), 0, 4);
        $order->orderNumber = 'API_ORDER_1';
        $res = $client->createOrder($order, $this->shopId);

        $this->assertInstanceOf(BaseResponse::class, $res);
    }

    /** @throws Exception */
    public function testAddOrderTags()
    {
        $client = $this->getClient();
        sleep(1);
        $order = $client->getOrder($this->sampleOrderId)->data;
        $hash = substr(md5(time()), 0, 4);
        $client->addOrderTags($order->id, $hash);
        sleep(1);
        $order = $client->getOrder($this->sampleOrderId)->data;
        $this->assertContains($hash, $order->tags);
    }

    /** @throws Exception */
    public function testSetOrderTags()
    {
        $client = $this->getClient();
        sleep(1);
        $order = $client->getOrder($this->sampleOrderId)->data;
        $hash = substr(md5(time()), 0, 4);
        $client->setOrderTags($order->id, $hash);
        sleep(1);
        $order = $client->getOrder($this->sampleOrderId)->data;
        $this->assertEquals([$hash], $order->tags);
    }

    /** @throws Exception */
    public function testSetOrderState()
    {
        $client = $this->getClient();
        sleep(1);
        $res = $client->setOrderState($this->sampleOrderId, OrderState::SHIPPED);
        $this->assertTrue($res);
    }

    /** @throws Exception */
    public function testAddOrderShipment()
    {
        $client = $this->getClient();
        sleep(1);

        /** @var Shipment $shipment */
        $shipment = $this->createMock(Shipment::class);
        $shipment->shippingProviderId = $this->shippingProviderId;
        $shipment->shippingProductId = $this->shippingProviderProduct;
        $shipment->orderId = 'A-123';
        $shipment->comment = 'PRIO VERSENDEN';
        $shipment->shippingId = 'B-456';

        $res = $client->addOrderShipment($this->sampleOrderId, $shipment);
        $this->assertTrue($res);
    }

    /** @throws Exception */
    public function testGetOrderByPartner()
    {
        $client = $this->getClient();
        sleep(1);

        $res = $client->getOrderByPartner($this->partnerId, $this->partner);
        $this->assertInstanceOf(GetOrderByPartnerResponse::class, $res);
        $this->assertInstanceOf(PartnerOrder::class, $res->data);
    }

    /** @throws Exception */
    public function testCreateDeliveryNote()
    {
        $client = $this->getClient();
        sleep(1);

        /** @var CreateDeliveryNoteResponse $res */
        $res = $client->createDeliveryNote($this->sampleOrderId, false);
        $this->assertInstanceOf(CreateDeliveryNoteResponse::class, $res);
        $this->assertInstanceOf(DeliveryNoteDocument::class, $res->data);
        $this->assertEmpty($res->data->pdfData);
        $this->assertNotEmpty($res->data->pdfDownloadUrl);

        /** @var CreateDeliveryNoteResponse $res */
        $res = $client->createDeliveryNote($this->sampleOrderId, true);
        $this->assertInstanceOf(CreateDeliveryNoteResponse::class, $res);
        $this->assertInstanceOf(DeliveryNoteDocument::class, $res->data);
        $this->assertNotEmpty($res->data->pdfData);
        $this->assertEmpty($res->data->pdfDownloadUrl);
    }

    /** @throws Exception */
    public function testCreateInvoice()
    {
        $client = $this->getClient();
        sleep(1);

        /** @var CreateInvoiceResponse $res */
        $res = $client->createInvoice($this->sampleOrderId, false);
        $this->assertInstanceOf(CreateInvoiceResponse::class, $res);
        $this->assertInstanceOf(InvoiceDocument::class, $res->data);
        $this->assertEmpty($res->data->pdfData);
        $this->assertNotEmpty($res->data->pdfDownloadUrl);

        /** @var CreateInvoiceResponse $res */
        $res = $client->createInvoice($this->sampleOrderId, true);
        $this->assertInstanceOf(CreateInvoiceResponse::class, $res);
        $this->assertInstanceOf(InvoiceDocument::class, $res->data);
        $this->assertNotEmpty($res->data->pdfData);
        $this->assertEmpty($res->data->pdfDownloadUrl);
    }

    /** @throws Exception */
    public function testGetPatchableFields()
    {
        $client = $this->getClient();
        /** @var GetPatchableFieldsResponse $result */
        $result = $client->getPatchableFields();
        $this->assertInstanceOf(GetPatchableFieldsResponse::class, $result);
        $this->assertGreaterThanOrEqual(1, $result->data);
    }

    /** @throws Exception */
    public function testPatchOrder()
    {
        $client = $this->getClient();
        $orderResponse = $client->getOrder($this->sampleOrderId);
        $order = $orderResponse->data;

        $oldPrefix = $order->invoiceNumberPrefix;
        $newPrefix = substr(md5($oldPrefix), 0, 8);

        $model = ['InvoiceNumberPrefix' => $newPrefix];
        $patchOrderResult = $client->patchOrder($this->sampleOrderId, $model);
        $this->assertEquals(0, $patchOrderResult->errorCode);
        $patchedOrder = $patchOrderResult->data;
        $this->assertEquals($newPrefix, $patchedOrder->invoiceNumberPrefix);

        sleep(1);
        $orderResponse = $client->getOrder($this->sampleOrderId);
        $order = $orderResponse->data;
        $this->assertEquals($newPrefix, $order->invoiceNumberPrefix);
    }

    /** @throws Exception */
    public function testBatchRequests()
    {
        $client = $this->getClient();
        $client->useBatching = true;
        $this->assertEquals(0, $client->getPoolSize());
        $this->assertNull($client->getProducts(1, 1));
        $this->assertEquals(1, $client->getPoolSize());
        $this->assertNull($client->getOrders(1, 1));
        $this->assertNull($client->getEvents(3, 1));
        $this->assertEquals(3, $client->getPoolSize());

        $results = $client->executeBatch();
        $this->assertEquals(0, $client->getPoolSize());
        $this->assertCount(3, $results);
        $this->assertInstanceOf(GetProductsResponse::class, $results[0]);
        $this->assertInstanceOf(GetOrdersResponse::class, $results[1]);
        $this->assertInstanceOf(GetEventsResponse::class, $results[2]);
        $client->useBatching = false;
    }

    /** @throws Exception */
    public function testGetCustomFieldDefinitions()
    {
        $client = $this->getClient();
        sleep(1);

        $definitions = $client->getCustomFieldDefinitions();
        $this->assertGreaterThanOrEqual(0, count($definitions->data));

        if (count($definitions->data) > 0) {
            $this->assertInstanceOf(CustomFieldDefinition::class, $definitions->data[0]);
        }
    }

    /** @throws Exception */
    public function testGetCustomFieldDefinitionFailsNaN()
    {
        $client = $this->getClient();
        sleep(1);

        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $client->getCustomFieldDefinition('hello');
    }

    /** @throws Exception */
    public function testGetCustomFieldDefinitionFailsNegative()
    {
        $client = $this->getClient();

        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $client->getCustomFieldDefinition(-1);
    }

    /** @throws Exception */
    public function testGetCustomFieldDefinition()
    {
        $client = $this->getClient();

        $definition = $client->getCustomFieldDefinition($this->customFieldDefinitionId);
        $this->assertInstanceOf(CustomFieldDefinition::class, $definition->data);
    }

    /** @throws Exception */
    public function testGetAllWebHooks()
    {
        $client = $this->getClient();
        $webHooks = $client->getWebHooks();
        $this->assertTrue(is_array($webHooks));

        if (count($webHooks) > 0) {
            $this->assertInstanceOf(WebHook::class, $webHooks[0]);
        }
    }

    /** @throws Exception */
    public function testWebHookFilters()
    {
        $client = $this->getClient();
        $filters = $client->getWebHookFilters();
        $this->assertTrue(is_array($filters));
        $this->assertGreaterThan(0, count($filters));

        $this->assertInstanceOf(WebHookFilter::class, $filters[0]);
    }

    /** @throws Exception */
    public function testCreateUpdateGetDeleteWebHook()
    {
        $client = $this->getClient();

        $hook = new WebHook();
        $hook->id = md5('Hello World' . time());
        $hook->secret = md5('4711');
        $hook->isPaused = true;
        $hook->description = 'A nice webhook';
        $hook->filters = ['*'];
        $hook->webHookUri = $this->webHookUri;

        $this->createWebHookAndCompare($client, $hook);

        $hook->description = 'A updated web hook';
        $updateRes = $client->updateWebHook($hook);
        $this->assertTrue($updateRes);

        $this->getWebHookAndCompare($client, $hook);

        $getRes = $client->deleteWebHook($hook);
        $this->assertTrue($getRes);

        try {
            $client->getWebHook($hook->id);
            $this->fail('The webhook was not deleted');
        } catch (Exception $ex) {
        }

        $this->createWebHookAndCompare($client, $hook);
        $this->getWebHookAndCompare($client, $hook);
        $client->deleteWebHookById($hook->id);
        $this->assertTrue($getRes);

        try {
            $client->getWebHook($hook->id);
            $this->fail('The webhook was not deleted');
        } catch (Exception $ex) {
        }
    }

    /**
     * @param Client $client
     * @param $hook
     * @throws Exception
     */
    private function createWebHookAndCompare($client, $hook)
    {
        sleep(1);
        $createRes = $client->createWebHook($hook);
        $this->assertEquals($hook->id, $createRes->id);
        $this->assertEquals($hook->secret, $createRes->secret);
        $this->assertEquals($hook->description, $createRes->description);
        $this->assertEquals($hook->filters, $createRes->filters);
        $this->assertEquals($hook->webHookUri, $createRes->webHookUri);
    }

    /**
     * @param Client $client
     * @param $hook
     * @throws Exception
     */
    private function getWebHookAndCompare($client, $hook)
    {
        sleep(1);
        $getRes = $client->getWebHook($hook->id);
        $this->assertEquals($hook->id, $getRes->id);
        $this->assertEquals($hook->secret, $getRes->secret);
        $this->assertEquals($hook->description, $getRes->description);
        $this->assertEquals($hook->filters, $getRes->filters);
        $this->assertEquals($hook->webHookUri, $getRes->webHookUri);
    }

    /** @throws Exception */
    public function testDeleteWebHookFailsInvalidId()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The id of the webHook cannot be empty');
        $client->deleteWebHookById(null);
    }

    /** @throws Exception */
    public function testUpdateWebHookFailsInvalidId()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The id of the webHook cannot be empty');
        $client->updateWebHook(new WebHook());
    }

    /** @throws Exception */
    public function testDeleteAllWebHooks()
    {
        if ($this->testDeleteWebHooks === true) {
            $client = $this->getClient();
            $res = $client->deleteAllWebHooks();
            $this->assertTrue($res);
        }
    }

    /** @throws Exception */
    public function testSendMessageFailsSendMode()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The sendMode is invalid. Check the BillbeeDe\\BillbeeAPI\\Type\\SendMode class for valid values');
        $client->sendMessage(null, new MessageForCustomer([], [], 6));
    }

    /** @throws Exception */
    public function testSendMessageFailsNoSubject()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('You have to specify a message subject');
        $client->sendMessage(null, new MessageForCustomer([], [], 0));
    }

    /** @throws Exception */
    public function testSendMessageFailsNoBody()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('You have to specify a message body');
        $client->sendMessage(null, new MessageForCustomer([new TranslatableText()], [], 0));
    }

    /** @throws Exception */
    public function testSendMessageFailsNoExternalAddress()
    {
        $client = $this->getClient();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('With sendMode == 4 it\'s required to specify an alternativeEmailAddress');
        $client->sendMessage(null, new MessageForCustomer([new TranslatableText()], [new TranslatableText()], 4));
    }

    /** @throws Exception */
    public function testGetSetLogger()
    {
        $client = $this->getClient();
        $this->assertInstanceOf(LoggerInterface::class, $client->getLogger());
        $this->assertInstanceOf(NullLogger::class, $client->getLogger());

        $client->setLogger(new EchoLogger());
        $this->assertInstanceOf(LoggerInterface::class, $client->getLogger());
        $this->assertInstanceOf(EchoLogger::class, $client->getLogger());

        $client->setLogger();
        $this->assertInstanceOf(LoggerInterface::class, $client->getLogger());
        $this->assertInstanceOf(NullLogger::class, $client->getLogger());

        $client->setLogger(null);
        $this->assertInstanceOf(LoggerInterface::class, $client->getLogger());
        $this->assertInstanceOf(NullLogger::class, $client->getLogger());
    }

    /** @throws Exception */
    public function testGetCustomers()
    {
        $client = $this->getClient();
        $customersResponse = $client->getCustomers();
        $this->assertInstanceOf(GetCustomersResponse::class, $customersResponse);
        $this->assertEquals(0, $customersResponse->errorCode);
        $this->assertGreaterThanOrEqual(0, $customersResponse->data);

        if (count($customersResponse->data) > 0) {
            $this->assertInstanceOf(Customer::class, $customersResponse->data[0]);
        }
    }

    /** @throws Exception */
    public function testGetCustomerFails()
    {
        $client = $this->getClient();
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $client->getCustomer(null);
    }

    /** @throws Exception */
    public function testGetCustomer()
    {
        $client = $this->getClient();
        $customerResponse = $client->getCustomer($this->customerId);
        $this->assertInstanceOf(GetCustomerResponse::class, $customerResponse);
        $this->assertEquals(0, $customerResponse->errorCode);
        $this->assertInstanceOf(Customer::class, $customerResponse->data);
        $this->assertEquals($this->customerId, $customerResponse->data->id);
    }

    /** @throws Exception */
    public function testGetCustomerAddressesFails()
    {
        $client = $this->getClient();
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $client->getCustomerAddresses(null);
    }

    /** @throws Exception */
    public function testGetCustomerAddresses()
    {
        $client = $this->getClient();
        sleep(1);
        $addressesResponse = $client->getCustomerAddresses($this->customerId);
        $this->assertInstanceOf(GetCustomerAddressesResponse::class, $addressesResponse);
        $this->assertEquals(0, $addressesResponse->errorCode);

        if (count($addressesResponse->data) > 0) {
            $this->assertInstanceOf(CustomerAddress::class, $addressesResponse->data[0]);
        }
    }

    /** @throws Exception */
    public function testGetCustomerAddress()
    {
        $client = $this->getClient();
        $addressResponse = $client->getCustomerAddress($this->addressId);
        $this->assertInstanceOf(GetCustomerAddressResponse::class, $addressResponse);
        $this->assertEquals(0, $addressResponse->errorCode);
        $this->assertInstanceOf(CustomerAddress::class, $addressResponse->data);
        $this->assertEquals($this->addressId, $addressResponse->data->id);
    }

    /** @throws Exception */
    public function testGetCustomerOrdersFails()
    {
        $client = $this->getClient();

        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $client->getCustomerOrders(null);
    }

    /** @throws Exception */
    public function testGetCustomerOrders()
    {
        $client = $this->getClient();
        $customerOrdersResponse = $client->getCustomerOrders($this->customerId);
        $this->assertInstanceOf(GetOrdersResponse::class, $customerOrdersResponse);
        $this->assertEquals(0, $customerOrdersResponse->errorCode);
        $this->assertGreaterThanOrEqual(0, $customerOrdersResponse->data);

        if (count($customerOrdersResponse->data) > 0) {
            $this->assertInstanceOf(Order::class, $customerOrdersResponse->data[0]);
        }
    }

    /** @throws Exception */
    public function testCreateCustomer()
    {
        $client = $this->getClient();
        sleep(1);

        $customer = new Customer();
        $customer->email = 'max@mustermann.de';
        $customer->name = 'Max Mustermann';
        $customer->tel1 = '0123456';
        $customer->tel2 = '124658';
        $customer->vatId = '4711';

        $address = new CustomerAddress();
        $address->id = 0;
        $address->customerId = 0;
        $address->firstName = 'Max';
        $address->lastName = 'Mustermann';
        $address->zip = '00000';
        $address->countryCode = 'DE';
        $address->city = 'Musterstadt';
        $address->email = 'max@mustermann.de';
        $address->addressType = CustomerAddress::TYPE_INVOICE;
        $address->street = 'Test Straße';
        $address->houseNumber = '1';

        $resp = $client->createCustomer($customer, $address);
        $this->assertInstanceOf(GetCustomerResponse::class, $resp);
        $this->assertEquals(0, $resp->errorCode);
        $this->assertInstanceOf(Customer::class, $resp->data);

        $this->assertEquals($customer->email, $resp->data->email);
        $this->assertEquals($customer->name, $resp->data->name);
        $this->assertEquals($customer->tel1, $resp->data->tel1);
        $this->assertEquals($customer->tel2, $resp->data->tel2);
        $this->assertEquals($customer->vatId, $resp->data->vatId);
    }

    /** @throws Exception */
    public function testUpdateCustomerFails()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $this->getClient()->updateCustomer(new Customer());
    }

    /** @throws Exception */
    public function testUpdateCustomer()
    {
        $hash = md5(microtime(1));

        $client = $this->getClient();
        sleep(1);
        $customerResp = $client->getCustomer($this->customerId);
        $customer = $customerResp->data;

        $originalName = $customer->name;

        $newName = $customer->name . ' | ' . $hash;
        $customer->name = $newName;
        $client->updateCustomer($customer);
        sleep(1);
        $customer2Resp = $client->getCustomer($this->customerId);
        sleep(1);
        $customer2 = $customer2Resp->data;

        $this->assertEquals($newName, $customer2->name);

        $customer2->name = $originalName;

        sleep(1);
        $client->updateCustomer($customer2);
    }

    /** @throws Exception */
    public function testShipOrderWithLabel()
    {
        if (empty($this->shippableOrderId)
            || empty($this->shippingProviderId)
            || empty($this->shippingProviderProduct)) {
            return;
        }

        $client = $this->getClient();
        sleep(1);
        $shipment = new ShipmentWithLabel();
        $shipment->changeStateToSend = true;
        $shipment->clientReference = 'Hallo Welt';
        $shipment->dimension = new Dimensions(15, 15, 10);
        $shipment->orderId = $this->shippableOrderId;
        $shipment->providerId = $this->shippingProviderId;
        $shipment->productId = $this->shippingProviderProduct;
        $shipment->shipDate = new DateTime('now');
        $shipment->weightInGram = 130;

        $client->shipWithLabel($shipment);
    }

    /** @throws Exception */
    public function testGetSetLogRequests()
    {
        $client = $this->getClient();
        $this->assertFalse($client->getLogRequests());
        $client->setLogRequests(true);
        $this->assertTrue($client->getLogRequests());
        $client->setLogRequests(false);
        $this->assertFalse($client->getLogRequests());
    }

    /** @throws Exception */
    public function testGetCloudStorages()
    {
        if ($this->cloudStorageId == 0) {
            return;
        }

        $client = $this->getClient();
        sleep(1);
        $cloudStorages = $client->getCloudStorages();
        $this->assertGreaterThanOrEqual(1, count($cloudStorages->data));

        $containsCloudStorage = false;
        foreach ($cloudStorages->data as $cloudStorage) {
            if ($cloudStorage->id == $this->cloudStorageId) {
                $containsCloudStorage = true;
                break;
            }
        }

        $this->assertTrue($containsCloudStorage);
    }

    /** @throws Exception */
    public function testGetCategories()
    {
        if ($this->categoryId == 0) {
            return;
        }

        $client = $this->getClient();
        sleep(1);
        $categories = $client->getCategories();
        $this->assertGreaterThanOrEqual(1, count($categories->data));

        $containsCategory = false;
        foreach ($categories->data as $category) {
            if ($category->id == $this->categoryId) {
                $containsCategory = true;
                break;
            }
        }

        $this->assertTrue($containsCategory);
    }

    /** @throws Exception */
    public function testGetLayouts()
    {
        if ($this->layoutId == 0) {
            return;
        }

        $client = $this->getClient();
        sleep(1);
        $layouts = $client->getLayouts();
        $this->assertGreaterThanOrEqual(1, count($layouts->data));

        $containsLayout = false;
        foreach ($layouts->data as $layout) {
            if ($layout->id == $this->layoutId) {
                $containsLayout = true;
                break;
            }
        }

        $this->assertTrue($containsLayout);
    }

    /** @throws Exception */
    public function getClient()
    {
        static $client = null;
        if ($client === null) {
            $client = new Client($this->username, $this->password, $this->apiKey);
        }
        return $client;
    }
}
