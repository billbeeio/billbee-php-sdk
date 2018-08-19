<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2018 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Client;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model\DeliveryNoteDocument;
use BillbeeDe\BillbeeAPI\Model\Event;
use BillbeeDe\BillbeeAPI\Model\Invoice;
use BillbeeDe\BillbeeAPI\Model\InvoiceDocument;
use BillbeeDe\BillbeeAPI\Model\InvoicePosition;
use BillbeeDe\BillbeeAPI\Model\Order;
use BillbeeDe\BillbeeAPI\Model\OrderItem;
use BillbeeDe\BillbeeAPI\Model\PartnerOrder;
use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\Shipment;
use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use BillbeeDe\BillbeeAPI\Model\Stock;
use BillbeeDe\BillbeeAPI\Model\StockCode;
use BillbeeDe\BillbeeAPI\Model\TermsInfo;
use BillbeeDe\BillbeeAPI\Response\BaseResponse;
use BillbeeDe\BillbeeAPI\Response\CreateDeliveryNoteResponse;
use BillbeeDe\BillbeeAPI\Response\CreateInvoiceResponse;
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
use BillbeeDe\BillbeeAPI\Type\EventType;
use BillbeeDe\BillbeeAPI\Type\OrderState;
use PHPUnit\Framework\TestCase;
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
        ];
    }

    public function testConstruct()
    {
        $client = $this->getClient();
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testGetProductsFails()
    {
        $client = $this->getClient();
        $client->getProducts(1, 1, new \DateTime('now'));
        $client->getProducts(1, 1, new \DateTime('now'));

        $this->expectException(QuotaExceededException::class);
        $this->expectExceptionMessage('quota exceeded');
        $client->getProducts(1, 1, new \DateTime('now'));
    }

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

    public function testGetProduct()
    {
        $client = $this->getClient();
        sleep(1);

        $productResponse = $client->getProduct($this->sampleProductId);

        $this->assertTrue($productResponse instanceof GetProductResponse);
        $this->assertTrue($productResponse->data instanceof Product);
    }

    public function testGetTermsInfo()
    {
        $client = $this->getClient();
        sleep(1);

        $termsInfoResponse = $client->getTermsInfo();

        $this->assertTrue($termsInfoResponse instanceof GetTermsInfoResponse);
        $this->assertTrue($termsInfoResponse->data instanceof TermsInfo);
    }

    public function testGetEvents()
    {
        $client = $this->getClient();
        sleep(1);

        $eventsResponse = $client->getEvents(
            2,
            10,
            new \DateTime('01.01.2017'),
            new \DateTime(),
            [EventType::LOG_IN]
        );
        $this->assertInstanceOf(GetEventsResponse::class, $eventsResponse);
        $this->assertTrue(is_array($eventsResponse->data));
        $this->assertGreaterThan(1, count($eventsResponse->data));
        $this->assertInstanceOf(Event::class, $eventsResponse->data[0]);
    }

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

    public function testGetInvoicesFailsWrongShopId()
    {
        $client = $this->getClient();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('shopId must be an instance of int or an array of int');
        $client->getInvoices(
            2,
            10,
            new \DateTime('01.01.2017'),
            new \DateTime(),
            ['asdf'],
            2,
            [],
            new \DateTime('01.01.2017'),
            new \DateTime(),
            false
        );
    }

    public function testGetInvoicesFailsWrongStateId()
    {
        $client = $this->getClient();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('orderStateId must be an instance of int or an array of int');
        $client->getInvoices(
            2,
            10,
            new \DateTime('01.01.2017'),
            new \DateTime(),
            $this->shopId,
            ['asdf'],
            [],
            new \DateTime('01.01.2017'),
            new \DateTime(),
            false
        );
    }

    public function testGetInvoices()
    {
        $client = $this->getClient();
        sleep(1);

        $invoices = $client->getInvoices(
            1,
            10,
            new \DateTime('01.01.2017'),
            new \DateTime(),
            $this->shopId,
            2,
            $this->tag,
            new \DateTime('01.01.2017'),
            new \DateTime(),
            false
        );
        $this->assertInstanceOf(GetInvoicesResponse::class, $invoices);
        $this->assertTrue(is_array($invoices->data));
        $this->assertGreaterThan(0, count($invoices->data));
        $this->assertInstanceOf(Invoice::class, $invoices->data[0]);
        $this->assertCount(0, $invoices->data[0]->positions);
    }

    public function testGetInvoicesAndPositions()
    {
        $client = $this->getClient();
        sleep(1);

        $invoices = $client->getInvoices(
            1,
            10,
            new \DateTime('01.01.2017'),
            new \DateTime(),
            [$this->shopId],
            [2],
            $this->tag,
            new \DateTime('01.01.2017'),
            new \DateTime(),
            true
        );

        $this->assertInstanceOf(GetInvoicesResponse::class, $invoices);
        $this->assertTrue(is_array($invoices->data));
        $this->assertGreaterThan(0, count($invoices->data));
        $this->assertInstanceOf(Invoice::class, $invoices->data[0]);
        $this->assertGreaterThan(0, count($invoices->data[0]->positions));
        $this->assertInstanceOf(InvoicePosition::class, $invoices->data[0]->positions[0]);
    }

    public function testGetOrders()
    {
        $client = $this->getClient();
        sleep(1);
        $orders = $client->getOrders(
            2,
            19,
            new \DateTime('01.01.2017'),
            new \DateTime(),
            [$this->shopId],
            [2],
            $this->tag,
            1,
            new \DateTime('01.01.2017'),
            new \DateTime()
        );

        $this->assertInstanceOf(GetOrdersResponse::class, $orders);
        $this->assertTrue(is_array($orders->data));
        $this->assertGreaterThan(0, count($orders->data));
        $this->assertInstanceOf(Order::class, $orders->data[0]);
        $this->assertGreaterThan(0, count($orders->data[0]->orderItems));
        $this->assertInstanceOf(OrderItem::class, $orders->data[0]->orderItems[0]);
    }

    public function testGetOrder()
    {
        $client = $this->getClient();
        sleep(1);
        /** @var GetOrderResponse $order */
        $order = $client->getOrder($this->sampleOrderId);
        $this->assertInstanceOf(GetOrderResponse::class, $order);
        $this->assertInstanceOf(Order::class, $order->data);
    }

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

    public function testSetOrderState()
    {
        $client = $this->getClient();
        sleep(1);
        $res = $client->setOrderState($this->sampleOrderId, OrderState::SHIPPED);
        $this->assertTrue($res);
    }

    public function testAddOrderShipment()
    {
        $client = $this->getClient();
        sleep(1);

        /** @var Shipment $shipment */
        $shipment = $this->createMock(Shipment::class);
        $shipment->shippingProviderId = 5871;
        $shipment->shippingProductId = 45540;
        $shipment->orderId = 'A-123';
        $shipment->comment = 'PRIO VERSENDEN';
        $shipment->shippingId = 'B-456';

        $res = $client->addOrderShipment($this->sampleOrderId, $shipment);
        $this->assertTrue($res);
    }

    public function testGetOrderByPartner()
    {
        $client = $this->getClient();
        sleep(1);

        $res = $client->getOrderByPartner($this->partnerId, $this->partner);
        $this->assertInstanceOf(GetOrderByPartnerResponse::class, $res);
        $this->assertInstanceOf(PartnerOrder::class, $res->data);
        $this->assertSame($this->partnerId, $res->data->externalId);
    }

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

    public function testGetPatchableFields()
    {
        $client = $this->getClient();
        /** @var GetPatchableFieldsResponse $result */
        $result = $client->getPatchableFields();
        $this->assertInstanceOf(GetPatchableFieldsResponse::class, $result);
        $this->assertGreaterThanOrEqual(1, $result->data);
    }

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
    }

    public function getClient()
    {
        static $client = null;
        if ($client === null) {
            $client = new Client($this->username, $this->password, $this->apiKey);
        }
        return $client;
    }
}
