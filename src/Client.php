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

namespace BillbeeDe\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model\Order;
use BillbeeDe\BillbeeAPI\Model\Shipment;
use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use BillbeeDe\BillbeeAPI\Model\Stock;
use BillbeeDe\BillbeeAPI\Model\StockCode;
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
use BillbeeDe\BillbeeAPI\Type\OrderState;
use BillbeeDe\BillbeeAPI\Type\Partner;
use GuzzleHttp\Exception\ClientException;
use MintWare\JOM\Exception\InvalidJsonException;
use MintWare\JOM\ObjectMapper;
use Psr\Http\Message\ResponseInterface;

class Client
{
    /**
     * The API Endpoint
     *
     * @var string
     */
    protected $endpoint = 'https://app01.billbee.de/api/v1/';

    /**
     * The guzzle client
     * @var \GuzzleHttp\Client
     */
    protected $client = null;

    /**
     * The JSON Object Mapper
     *
     * @var ObjectMapper
     */
    protected $jom = null;

    /**
     * Instantiates a new Billbee API client
     *
     * @param string $username The Billbee username
     * @param string $apiPassword The API password for the user
     * @param string $apiKey The API Key
     */
    public function __construct($username, $apiPassword, $apiKey)
    {
        // Setup the HTTP client
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->endpoint,
            'auth' => [$username, $apiPassword],
            'headers' => [
                'X-Billbee-Api-Key' => $apiKey,
            ]
        ]);

        $this->jom = new ObjectMapper();
    }

    //
    // PRODUCTS
    //

    /**
     * Get a list of all products optionally filtered by date
     *
     * @param int $page The start page
     * @param int $pageSize The page size
     * @param \DateTime|null $minCreatedAt The date of creation of the products
     * @return GetProductsResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function getProducts($page = 1, $pageSize = 50, \DateTime $minCreatedAt = null)
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($minCreatedAt !== null && $minCreatedAt instanceof \DateTime) {
            $query['minCreatedAt'] = $minCreatedAt->format('c');
        }

        return $this->requestGET(
            'products',
            $query,
            GetProductsResponse::class
        );
    }

    /**
     * Updates the stock for a single product
     *
     * @param Stock $stockModel The stock model
     * @return UpdateStockResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function updateStock(Stock $stockModel)
    {
        return $this->requestPOST(
            'products/updatestock',
            $stockModel,
            UpdateStockResponse::class
        );
    }

    /**
     * Updates the stock for multiple products
     *
     * @param Stock[] $stockModels The stock models
     * @return UpdateStockResponse[] The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function updateStockMultiple($stockModels)
    {
        return $this->requestPOST(
            'products/updatestockmultiple',
            $stockModels,
            UpdateStockResponse::class . '[]'
        );
    }

    /**
     * Updates the stock code for a single  products
     *
     * @param StockCode $stockCodeModel The stock code model
     * @return BaseResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function updateStockCode(StockCode $stockCodeModel)
    {
        return $this->requestPOST(
            'products/updatestockcode',
            $this->jom->objectToJson($stockCodeModel),
            BaseResponse::class
        );
    }

    /**
     * Get a single product by Id
     *
     * @param int $productId The product Id
     *
     * @return GetProductResponse The product response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function getProduct($productId)
    {
        return $this->requestGET(
            'products/' . $productId,
            [],
            GetProductResponse::class
        );
    }

    //
    // PROVISIONING
    //

    /**
     * Returns information about Billbee terms and conditions
     *
     * @return GetTermsInfoResponse The terms info response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function getTermsInfo()
    {
        return $this->requestGET(
            'automaticprovision/termsinfo',
            [],
            GetTermsInfoResponse::class
        );
    }

    //
    // EVENTS
    //

    /**
     * Get a list of all events optionally filtered by date and / or event type
     *
     * @param int $page The start page
     * @param int $pageSize The page size
     * @param \DateTime $minDate Start date
     * @param \DateTime $maxDate End date
     * @param array $typeIds An array of event type id's
     *
     * @return GetEventsResponse The events
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function getEvents(
        $page = 1,
        $pageSize = 50,
        \DateTime $minDate = null,
        \DateTime $maxDate = null,
        $typeIds = []
    )
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($minDate !== null && $minDate instanceof \DateTime) {
            $query['minDate'] = $minDate->format('c');
        }

        if ($maxDate !== null && $maxDate instanceof \DateTime) {
            $query['maxDate'] = $maxDate->format('c');
        }

        if (is_array($typeIds) && count($typeIds) > 0) {
            $query['typeId'] = $typeIds;
        }

        return $this->requestGET(
            'events',
            $query,
            GetEventsResponse::class
        );
    }

    //
    // ORDERS
    //

    // GET

    /**
     * Get a list of all orders optionally filtered by date
     *
     * @param int $page Specifies the page to request
     * @param int $pageSize Specifies the pagesize. Defaults to 50, max value is 250
     * @param \DateTime|null $minOrderDate Specifies the oldest order date to include in the response
     * @param \DateTime|null $maxOrderDate Specifies the newest order date to include in the response
     * @param int[] $shopId Specifies a list of shop ids for which invoices should be included
     * @param int[] $orderStateId Specifies a list of state ids to include in the response
     * @param string[] $tag Specifies a list of tags the order must have attached to be included in the response
     * @param null $minimumOrderId If given, all delivered orders have an Id greater than or equal to the given minimumOrderId
     * @param \DateTime|null $modifiedAtMin If given, the last modification has to be newer than the given date
     * @param \DateTime|null $modifiedAtMax If given, the last modification has to be older or equal than the given date.
     *
     * @return GetOrdersResponse The orders
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function getOrders(
        $page = 1,
        $pageSize = 50,
        \DateTime $minOrderDate = null,
        \DateTime $maxOrderDate = null,
        $shopId = [],
        $orderStateId = [],
        $tag = [],
        $minimumOrderId = null,
        \DateTime $modifiedAtMin = null,
        \DateTime $modifiedAtMax = null
    )
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($minOrderDate !== null && $minOrderDate instanceof \DateTime) {
            $query['minOrderDate'] = $minOrderDate->format('c');
        }

        if ($maxOrderDate !== null && $maxOrderDate instanceof \DateTime) {
            $query['maxOrderDate'] = $maxOrderDate->format('c');
        }

        if ($shopId !== null && (is_numeric($shopId) || is_array($shopId))) {
            if (is_numeric($shopId)) {
                $shopId = [$shopId];
            } elseif (is_array($shopId)) {
                foreach ($shopId as $value) {
                    if (!is_numeric($value)) {
                        throw new \InvalidArgumentException('shopId must be an instance of int or an array of int');
                    }
                }
            }
            $shopId = array_filter($shopId);
            if (count($shopId) > 0) {
                $query['shopId'] = $shopId;
            }
        }

        if ($orderStateId !== null && (is_numeric($orderStateId) || is_array($orderStateId))) {
            if (is_numeric($orderStateId)) {
                $orderStateId = [$orderStateId];
            } elseif (is_array($orderStateId)) {
                foreach ($orderStateId as $value) {
                    if (!is_numeric($value)) {
                        throw new \InvalidArgumentException('orderStateId must be an instance of int or an array of int');
                    }
                }
            }
            $orderStateId = array_filter($orderStateId);
            if (count($orderStateId) > 0) {
                $query['orderStateId'] = $orderStateId;
            }

            if ($tag !== null && (is_string($tag) || is_array($tag))) {
                if (is_string($tag)) {
                    $tag = [$tag];
                }
                $tag = array_filter($tag);
                if (count($tag) > 0) {
                    $query['tag'] = $tag;
                }
            }
        }

        if ($minimumOrderId !== null && !empty($minimumOrderId)) {
            $query['minimumBillBeeOrderId'] = $minimumOrderId;
        }

        if ($modifiedAtMin !== null && $modifiedAtMin instanceof \DateTime) {
            $query['modifiedAtMin'] = $modifiedAtMin->format('c');
        }

        if ($modifiedAtMax !== null && $modifiedAtMax instanceof \DateTime) {
            $query['modifiedAtMax'] = $modifiedAtMax->format('c');
        }

        return $this->requestGET(
            'orders',
            $query,
            GetOrdersResponse::class
        );
    }

    /**
     * Returns a list of fields which can be updated with the patchOrder call
     *
     * @return GetPatchableFieldsResponse
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function getPatchableFields()
    {
        return $this->requestGET(
            'orders/PatchableFields',
            [],
            GetPatchableFieldsResponse::class
        );
    }

    /**
     * Get a single order by its internal billbee id
     *
     * @param int $id The internal billbee id of the order
     *
     * @return GetOrderResponse The order response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function getOrder($id)
    {
        return $this->requestGET(
            'orders/' . $id,
            [],
            GetOrderResponse::class
        );
    }

    /**
     * Get a single order by its internal billbee id
     *
     * @param string $extRef The internal billbee id of the order
     *
     * @return GetOrderResponse The order response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function getOrderByOrderNumber($extRef)
    {
        return $this->requestGET(
            'orders/findbyextref/' . $extRef,
            [],
            GetOrderResponse::class
        );
    }


    /**
     * Find a single order by its external id (order number)
     *
     * @param string $externalId The order id in the partner system
     * @param string $partner The partner name. Possible partners in Partner-Class
     *
     * @return GetOrderResponse The order response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     *
     * @see Partner
     */
    public function getOrderByPartner($externalId, $partner)
    {
        return $this->requestGET(
            'orders/find/' . $externalId . '/' . $partner,
            [],
            GetOrderByPartnerResponse::class
        );
    }

    // POST

    /**
     * Get a single order by its internal billbee id
     *
     * @param Order $order The order Data
     * @param int $shopId The id of the shop
     *
     * @return BaseResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function createOrder(Order $order, $shopId)
    {
        return $this->requestPOST(
            'orders?shopId=' . $shopId,
            $this->jom->objectToJson($order),
            BaseResponse::class
        );
    }

    /**
     * Attach one or more tags to an order
     *
     * @param int $orderId The internal id of the order
     * @param string[] $tags Tags to attach
     *
     * @return BaseResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function addOrderTags($orderId, $tags = [])
    {
        if (!is_array($tags)) {
            $tags = [$tags];
        }
        return $this->requestPOST(
            'orders/' . $orderId . '/tags',
            json_encode(['Tags' => $tags]),
            BaseResponse::class
        );
    }

    /**
     * Attach one or more tags to an order
     *
     * @param int $orderId The internal id of the order
     * @param Shipment $shipment The Shipment
     *
     * @return bool True if the shipment was added
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function addOrderShipment($orderId, Shipment $shipment)
    {
        $res = $this->requestPOST(
            'orders/' . $orderId . '/shipment',
            $this->jom->objectToJson($shipment),
            BaseResponse::class
        );
        return $res === '' || $res === null;
    }

    /**
     * Create an delivery note for an existing order
     *
     * @param int $orderId The internal id of the order
     * @param bool $includePdf If true, the PDF is included in the response as base64 encoded string
     *
     * @return CreateDeliveryNoteResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function createDeliveryNote($orderId, $includePdf)
    {
        return $this->requestPOST(
            'orders/CreateDeliveryNote/' . $orderId . '?includePdf=' . ($includePdf ? 'True' : 'False'),
            [],
            CreateDeliveryNoteResponse::class
        );
    }

    /**
     * Create an invoice for an existing order
     *
     * @param int $orderId The internal id of the order
     * @param bool $includePdf If true, the PDF is included in the response as base64 encoded string
     *
     * @return CreateDeliveryNoteResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function createInvoice($orderId, $includePdf)
    {
        $node = 'orders/CreateInvoice/' . $orderId . '?includeInvoicePdf=' . ($includePdf ? 'True' : 'False');
        return $this->requestPOST(
            $node,
            [],
            CreateInvoiceResponse::class
        );
    }

    // PUT

    /**
     * Updates/Sets the tags attached to an order
     *
     * @param int $orderId The internal id of the order
     * @param string[] $tags Tags to attach
     *
     * @return BaseResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function setOrderTags($orderId, $tags = [])
    {
        if (!is_array($tags)) {
            $tags = [$tags];
        }
        return $this->requestPUT(
            'orders/' . $orderId . '/tags',
            json_encode(['Tags' => $tags]),
            BaseResponse::class
        );
    }

    /**
     * Changes the main state of a single order
     *
     * @param int $orderId The internal id of the order
     * @param int $newState The new OrderState
     *
     * @return bool True if the state was updated
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     *
     * @see OrderState
     */
    public function setOrderState($orderId, $newState)
    {
        $res = $this->requestPUT(
            'orders/' . $orderId . '/orderstate',
            json_encode(['NewStateId' => $newState]),
            BaseResponse::class
        );
        return $res === null;
    }

    // PATCH

    /**
     * Updates one or more fields of an order
     *
     * @param int $orderId The internal id of the order
     * @param array $model The fields to patch
     *
     * @return GetOrderResponse The order
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function patchOrder($orderId, $model)
    {
        return $this->requestPATCH(
            'orders/' . $orderId,
            $model,
            GetOrderResponse::class
        );
    }

    //
    // INVOICE
    //

    /**
     * Get a list of all invoices
     *
     * @param \DateTime $minInvoiceDate Specifies the oldest invoice date to include
     * @param \DateTime $maxInvoiceDate Specifies the newest invoice date to include
     * @param int $page Specifies the page to request
     * @param int $pageSize Specifies the pagesize. Defaults to 50, max value is 250
     * @param array $shopId Specifies a list of shop ids for which invoices should be included
     * @param array $orderStateId Specifies a list of state ids to include in the response
     * @param array $tag Specifies a list of tags to include in the response
     * @param \DateTime $minPayDate Specifies the oldest pay date to include
     * @param \DateTime $maxPayDate Specifies the newest pay date to include
     * @param bool $includePositions Specifies to include the positions
     *
     * @return GetInvoicesResponse The Invoices
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function getInvoices(
        $page = 1,
        $pageSize = 50,
        \DateTime $minInvoiceDate = null,
        \DateTime $maxInvoiceDate = null,
        $shopId = [],
        $orderStateId = [],
        $tag = [],
        \DateTime $minPayDate = null,
        \DateTime $maxPayDate = null,
        $includePositions = false
    )
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($minInvoiceDate !== null && $minInvoiceDate instanceof \DateTime) {
            $query['minInvoiceDate'] = $minInvoiceDate->format('c');
        }

        if ($maxInvoiceDate !== null && $maxInvoiceDate instanceof \DateTime) {
            $query['maxInvoiceDate'] = $maxInvoiceDate->format('c');
        }

        if ($shopId !== null && (is_numeric($shopId) || is_array($shopId))) {
            if (is_numeric($shopId)) {
                $shopId = [$shopId];
            } elseif (is_array($shopId)) {
                foreach ($shopId as $value) {
                    if (!is_numeric($value)) {
                        throw new \InvalidArgumentException('shopId must be an instance of int or an array of int');
                    }
                }
            }
            $shopId = array_filter($shopId);
            if (count($shopId) > 0) {
                $query['shopId'] = $shopId;
            }
        }

        if ($orderStateId !== null && (is_numeric($orderStateId) || is_array($orderStateId))) {
            if (is_numeric($orderStateId)) {
                $orderStateId = [$orderStateId];
            } elseif (is_array($orderStateId)) {
                foreach ($orderStateId as $value) {
                    if (!is_numeric($value)) {
                        throw new \InvalidArgumentException('orderStateId must be an instance of int or an array of int');
                    }
                }
            }
            $orderStateId = array_filter($orderStateId);
            if (count($orderStateId) > 0) {
                $query['orderStateId'] = $orderStateId;
            }
        }

        if ($tag !== null && (is_string($tag) || is_array($tag))) {
            if (is_string($tag)) {
                $tag = [$tag];
            }
            $tag = array_filter($tag);
            if (count($tag) > 0) {
                $query['tag'] = $tag;
            }
        }

        if ($minPayDate !== null && $minPayDate instanceof \DateTime) {
            $query['minPayDate'] = $minPayDate->format('c');
        }

        if ($maxPayDate !== null && $maxPayDate instanceof \DateTime) {
            $query['maxPayDate'] = $maxPayDate->format('c');
        }

        if (is_bool($includePositions) && $includePositions === true) {
            $query['includePositions'] = 'true';
        }

        return $this->requestGET(
            'orders/invoices',
            $query,
            GetInvoicesResponse::class
        );
    }

    //
    // SHIPMENTS
    //

    /**
     * Query all defined shipping providers
     *
     * @return GetShippingProvidersResponse The shipping providers response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    public function getShippingProviders()
    {
        $providers = $this->requestGET(
            'shipment/shippingproviders',
            [],
            ShippingProvider::class . '[]'
        );

        $response = new GetShippingProvidersResponse();
        $response->data = $providers;
        return $response;
    }

    /**
     * Starts an GET request
     *
     * @param string $node The requested node
     * @param array $query The parameters
     * @param string $responseClass The response class
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    protected function requestGET(
        $node,
        $query,
        $responseClass
    )
    {
        return $this->internalRequest($responseClass, function () use ($node, $query) {
            return $this->client->request('GET', $node, [
                'query' => $query
            ]);
        });
    }

    /**
     * Starts an POST request
     *
     * @param string $node The requested node
     * @param mixed $data The body
     * @param string $responseClass The response class
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    protected function requestPOST(
        $node,
        $data,
        $responseClass
    )
    {
        return $this->internalRequest($responseClass, function () use ($data, $node) {
            $field = is_string($data) ? 'body' : 'json';
            return $this->client->request('POST', $node, [
                $field => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);
        });
    }

    /**
     * Starts an PUT request
     *
     * @param string $node The requested node
     * @param mixed $data The body
     * @param string $responseClass The response class
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    protected function requestPUT(
        $node,
        $data,
        $responseClass
    )
    {
        return $this->internalRequest($responseClass, function () use ($data, $node) {
            $field = is_string($data) ? 'body' : 'json';
            return $this->client->request('PUT', $node, [
                $field => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);
        });
    }

    /**
     * Starts an PATCH request
     *
     * @param string $node The requested node
     * @param mixed $data The body
     * @param string $responseClass The response class
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    protected function requestPATCH(
        $node,
        $data,
        $responseClass
    )
    {
        return $this->internalRequest($responseClass, function () use ($data, $node) {
            $field = is_string($data) ? 'body' : 'json';
            return $this->client->request('PATCH', $node, [
                $field => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);
        });
    }

    /**
     * Handles a general request
     *
     * @param string $responseClass The response class
     * @param callable $request A callable which "do" the request
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response can not be parsed
     */
    private function internalRequest($responseClass, callable $request)
    {
        try {

            /** @var ResponseInterface $res */
            $res = $request();
        } catch (ClientException $ex) {
            if ($ex->getCode() == 429) {
                throw new QuotaExceededException($ex->getMessage());
            } else {
                throw $ex;
            }
        }

        $contents = $res->getBody()->getContents();

        $data = null;
        try {
            if (trim($contents) != '') {
                $data = $this->jom->mapJson($contents, $responseClass);
            }
        } catch (InvalidJsonException $exception) {
            throw $exception;
        } catch (\Exception $exception) {
            throw $exception;
        }

        return $data;
    }
}
