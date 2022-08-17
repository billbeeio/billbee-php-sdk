<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\ProductsEndpoint;
use BillbeeDe\BillbeeAPI\Model\Stock;
use BillbeeDe\BillbeeAPI\Model\StockCode;
use BillbeeDe\BillbeeAPI\Response\BaseResponse;
use BillbeeDe\BillbeeAPI\Response\GetCategoriesResponse;
use BillbeeDe\BillbeeAPI\Response\GetPatchableFieldsResponse;
use BillbeeDe\BillbeeAPI\Response\GetProductResponse;
use BillbeeDe\BillbeeAPI\Response\GetProductsResponse;
use BillbeeDe\BillbeeAPI\Response\UpdateStockResponse;
use BillbeeDe\BillbeeAPI\Type\ProductLookupBy;
use BillbeeDe\Tests\BillbeeAPI\FakeSerializer;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use DateTime;
use Exception;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ProductsEndpointTest extends TestCase
{
    /** @var ProductsEndpoint */
    private $endpoint;

    /** @var TestClient */
    private $client;

    /** @var SerializerInterface&MockObject */
    private $mockSerializer;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->mockSerializer = self::createMock(SerializerInterface::class);
        $this->endpoint = new ProductsEndpoint($this->client, $this->mockSerializer);
    }


    /** @throws Exception */
    public function testGetProducts()
    {
        $this->endpoint->getProducts(1, 1);
        $this->endpoint->getProducts(2, 10, new DateTime('2020-10-01T00:00:00'));

        $requests = $this->client->getRequests();
        $this->assertCount(2, $requests);

        list($method, $node, $query, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('products', $node);
        $this->assertSame(['page' => 1, 'pageSize' => 1], $query);
        $this->assertSame(GetProductsResponse::class, $class);

        list($method, $node, $query, $class) = $requests[1];
        $this->assertSame('GET', $method);
        $this->assertSame('products', $node);
        $this->assertSame([
            'page' => 2,
            'pageSize' => 10,
            'minCreatedAt' => '2020-10-01T00:00:00+00:00'
        ], $query);
        $this->assertSame(GetProductsResponse::class, $class);
    }

    /** @throws Exception */
    public function testGetProduct()
    {
        $this->endpoint->getProduct(4711);
        $this->endpoint->getProduct(1234, ProductLookupBy::EAN);

        $requests = $this->client->getRequests();
        $this->assertCount(2, $requests);

        list($method, $node, $query, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('products/4711', $node);
        $this->assertSame(['lookupBy' => ProductLookupBy::ID], $query);
        $this->assertSame(GetProductResponse::class, $class);

        list($method, $node, $query, $class) = $requests[1];
        $this->assertSame('GET', $method);
        $this->assertSame('products/1234', $node);
        $this->assertSame(['lookupBy' => ProductLookupBy::EAN], $query);
        $this->assertSame(GetProductResponse::class, $class);
    }

    public function testGetCategories()
    {
        $this->endpoint->getCategories();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $query, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('products/category', $node);
        $this->assertSame([], $query);
        $this->assertSame(GetCategoriesResponse::class, $class);
    }

    /** @throws Exception */
    public function testGetPatchableProductFields()
    {
        $this->endpoint->getPatchableProductFields();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $query, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('products/PatchableFields', $node);
        $this->assertSame([], $query);
        $this->assertSame(GetPatchableFieldsResponse::class, $class);
    }

    /** @throws Exception */
    public function testUpdateStock()
    {
        $stockModel = new Stock(4711, 1234, 0);

        $this->endpoint->updateStock($stockModel);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('products/updatestock', $node);
        $this->assertSame($stockModel, $data);
        $this->assertSame(UpdateStockResponse::class, $class);
    }


    /** @throws Exception */
    public function testUpdateStockMultiple()
    {
        $stockModel1 = new Stock(4711, 1234, 0);
        $stockModel2 = new Stock(1234, 500, 600);

        $this->endpoint->updateStockMultiple([$stockModel1, $stockModel2]);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('products/updatestockmultiple', $node);
        $this->assertSame([$stockModel1, $stockModel2], $data);
        $this->assertSame(UpdateStockResponse::class . '[]', $class);
    }

    /** @throws Exception */
    public function testUpdateStockCode()
    {
        $stockCode = new StockCode();
        $stockCode->sku = '1234';
        $stockCode->stockCode = '54321';
        $stockCode->stockId = 1234;

        $this->mockSerializer->expects(self::once())
            ->method('serialize')
            ->with($stockCode, 'json');

        $this->endpoint->updateStockCode($stockCode);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('products/updatestockcode', $node);
        $this->assertSame(BaseResponse::class, $class);
    }

    public function testCreateProduct()
    {
        $product = unserialize('O:34:"BillbeeDe\BillbeeAPI\Model\Product":54:{s:2:"id";i:1234;s:4:"type";i:1;s:5:"title";a:3:{i:0;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:8:"Title DE";s:12:"languageCode";s:2:"DE";}i:1;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:8:"Title EN";s:12:"languageCode";s:2:"EN";}i:2;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:8:"Title Fr";s:12:"languageCode";s:2:"FR";}}s:11:"invoiceText";a:3:{i:0;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:6:"Inv DE";s:12:"languageCode";s:2:"DE";}i:1;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:6:"Inv EN";s:12:"languageCode";s:2:"EN";}i:2;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:6:"Inv Fr";s:12:"languageCode";s:2:"FR";}}s:16:"shortDescription";a:3:{i:0;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:13:"Short Desc DE";s:12:"languageCode";s:2:"DE";}i:1;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:13:"Short Desc EN";s:12:"languageCode";s:2:"EN";}i:2;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:13:"Short Desc Fr";s:12:"languageCode";s:2:"FR";}}s:6:"images";a:1:{i:0;O:32:"BillbeeDe\BillbeeAPI\Model\Image":6:{s:2:"id";i:4711;s:3:"url";s:68:"https://cdn.stocksnap.io/img-thumbs/960w/fruit-slices_NNIRPAXZFX.jpg";s:12:"thumbPathExt";s:63:"ab665923-d288-45ff-8d9e-410d10dda01e/40986800/100/493289770.png";s:8:"thumbUrl";s:110:"https://billbee-articleimages.s3.amazonaws.com/ab665923-d288-45ff-8d9e-410d10dda01e/40986800/100/493289770.png";s:8:"position";i:1;s:9:"isDefault";b:1;}}s:11:"description";a:3:{i:0;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:7:"Desc DE";s:12:"languageCode";s:2:"DE";}i:1;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:7:"Desc EN";s:12:"languageCode";s:2:"EN";}i:2;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:7:"Desc Fr";s:12:"languageCode";s:2:"FR";}}s:10:"attributes";a:3:{i:0;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:13:"Basic Attr DE";s:12:"languageCode";s:2:"DE";}i:1;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:13:"Basic Attr EN";s:12:"languageCode";s:2:"EN";}i:2;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:13:"Basic Attr Fr";s:12:"languageCode";s:2:"FR";}}s:3:"sku";s:8:"SKU 1234";s:3:"ean";s:13:"1234123412341";s:7:"sources";a:0:{}s:9:"category1";N;s:9:"category2";N;s:9:"category3";N;s:12:"manufacturer";s:0:"";s:8:"vatIndex";i:1;s:5:"price";d:0;s:9:"costPrice";d:0;s:13:"vatRateNormal";d:16;s:14:"vatRateReduced";d:5;s:9:"materials";a:3:{i:0;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:12:"Materials DE";s:12:"languageCode";s:2:"DE";}i:1;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:12:"Materials EN";s:12:"languageCode";s:2:"EN";}i:2;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:12:"Materials Fr";s:12:"languageCode";s:2:"FR";}}s:4:"tags";a:3:{i:0;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:7:"Tags DE";s:12:"languageCode";s:2:"DE";}i:1;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:7:"Tags EN";s:12:"languageCode";s:2:"EN";}i:2;O:43:"BillbeeDe\BillbeeAPI\Model\TranslatableText":2:{s:4:"text";s:7:"Tags Fr";s:12:"languageCode";s:2:"FR";}}s:12:"stockDesired";d:0;s:12:"stockCurrent";d:3876;s:12:"stockWarning";d:0;s:8:"lowStock";b:0;s:9:"stockCode";s:10:"Stock Code";s:23:"stockReduceItemsPerSale";d:1;s:6:"stocks";a:1:{i:0;a:7:{s:4:"Name";N;s:7:"StockId";i:266;s:12:"StockCurrent";d:3744;s:12:"StockWarning";N;s:9:"StockCode";N;s:17:"UnfulfilledAmount";N;s:12:"StockDesired";N;}}s:6:"weight";i:1230;s:9:"weightNet";i:1200;s:4:"unit";i:1;s:12:"unitsPerItem";d:1;s:10:"soldAmount";i:0;s:12:"soldSumGross";d:0;s:10:"soldSumNet";d:0;s:20:"soldSumNetLast30Days";d:0;s:22:"soldSumGrossLast30Days";d:0;s:20:"soldAmountLast30Days";d:0;s:17:"shippingProductId";i:0;s:9:"isDigital";b:0;s:14:"isCustomizable";b:0;s:12:"deliveryTime";N;s:9:"recipient";N;s:8:"occasion";N;s:15:"countryOfOrigin";s:0:"";s:17:"exportDescription";s:0:"";s:11:"taricNumber";s:0:"";s:12:"customFields";a:0:{}s:9:"condition";i:1;s:7:"widthCm";N;s:8:"lengthCm";N;s:8:"heightCm";N;s:14:"billOfMaterial";a:0:{}}');

        $this->mockSerializer->expects(self::once())
            ->method('serialize')
            ->with($product, 'json');

        $this->endpoint->createProduct($product);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('products', $node);
        $this->assertSame(GetProductResponse::class, $class);
    }

    public function testPatchProduct()
    {
        $this->endpoint->patchProduct(1234, ['foo' => 'bar']);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('PATCH', $method);
        $this->assertSame('products/1234', $node);
        $this->assertSame(['foo' => 'bar'], $data);
        $this->assertSame(GetProductResponse::class, $class);
    }

    public function testDeleteProduct()
    {
        $this->endpoint->deleteProduct(1234);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('DELETE', $method);
        $this->assertSame('products/1234', $node);
        $this->assertSame([], $data);
        $this->assertSame(BaseResponse::class, $class);
    }
}
