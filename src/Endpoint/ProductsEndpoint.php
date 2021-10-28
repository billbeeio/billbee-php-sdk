<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model as Model;
use BillbeeDe\BillbeeAPI\Response as Response;
use BillbeeDe\BillbeeAPI\Type as Type;
use DateTime;
use Exception;
use MintWare\DMM\Serializer\SerializerInterface;

class ProductsEndpoint
{
    /** @var ClientInterface */
    private $client;

    /** @var SerializerInterface */
    private $serializer;

    public function __construct(ClientInterface $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * Get a list of all products optionally filtered by date
     *
     * @param int $page The start page
     * @param int $pageSize The page size
     * @param DateTime|null $minCreatedAt The date of creation of the products
     * @return Response\GetProductsResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getProducts($page = 1, $pageSize = 50, DateTime $minCreatedAt = null)
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($minCreatedAt !== null && $minCreatedAt instanceof DateTime) {
            $query['minCreatedAt'] = $minCreatedAt->format('c');
        }

        return $this->client->get(
            'products',
            $query,
            Response\GetProductsResponse::class
        );
    }

    /**
     * Get a single product by Id
     *
     * @param int $productId The product id
     * @param string $lookupBy Either the value id, ean or the value sku to specify the meaning of the id parameter
     * @return Response\GetProductResponse The product response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     * @see \BillbeeDe\BillbeeAPI\Type\ProductLookupBy
     */
    public function getProduct($productId, $lookupBy = Type\ProductLookupBy::ID)
    {
        return $this->client->get(
            'products/' . $productId,
            ['lookupBy' => $lookupBy],
            Response\GetProductResponse::class
        );
    }

    /**
     * Get a list of all defined categories
     *
     * @return Response\GetCategoriesResponse The category response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getCategories()
    {
        return $this->client->get(
            'products/category',
            [],
            Response\GetCategoriesResponse::class
        );
    }

    /**
     *
     * Returns a list of fields which can be updated with the patchProduct call
     *
     * @return Response\GetPatchableFieldsResponse
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     *
     * @see Client::patchProduct($productId, $model)
     */
    public function getPatchableProductFields()
    {
        return $this->client->get(
            'products/PatchableFields',
            [],
            Response\GetPatchableFieldsResponse::class
        );
    }

    #endregion

    #region POST

    /**
     * Updates the stock for a single product
     *
     * @param Model\Stock $stockModel The stock model
     * @return Response\UpdateStockResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function updateStock(Model\Stock $stockModel)
    {
        return $this->client->post(
            'products/updatestock',
            $stockModel,
            Response\UpdateStockResponse::class
        );
    }

    /**
     * Updates the stock for multiple products
     *
     * @param Model\Stock[] $stockModels The stock models
     * @return Response\UpdateStockResponse[] The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function updateStockMultiple(array $stockModels)
    {
        return $this->client->post(
            'products/updatestockmultiple',
            $stockModels,
            Response\UpdateStockResponse::class . '[]'
        );
    }

    /**
     * Updates the stock code for a single  products
     *
     * @param Model\StockCode $stockCodeModel The stock code model
     * @return Response\BaseResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function updateStockCode(Model\StockCode $stockCodeModel)
    {
        return $this->client->post(
            'products/updatestockcode',
            $this->serializer->serialize($stockCodeModel),
            Response\BaseResponse::class
        );
    }

    /**
     * Creates a new product
     *
     * @param Model\Product $product
     * @return Response\GetProductResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function createProduct(Model\Product $product)
    {
        return $this->client->post(
            'products',
            $this->serializer->serialize($product),
            Response\GetProductResponse::class
        );
    }

    #endregion

    #region PATCH

    /**
     * Updates one or more fields of a product
     *
     * @param int $productId The internal id of the product
     * @param array $model The fields to patch
     *
     * @return Response\GetProductResponse The order
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     *
     * @see Client::getPatchableProductFields()
     */
    public function patchProduct($productId, $model)
    {
        return $this->client->patch(
            'products/' . $productId,
            $model,
            Response\GetProductResponse::class
        );
    }

    #endregion

    #region DELETE

    /**
     * Deletes a product by id
     *
     * @param int $productId The Id of the product
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function deleteProduct($productId)
    {
        $this->client->delete(
            'products/' . $productId,
            [],
            Response\BaseResponse::class
        );
    }
}
