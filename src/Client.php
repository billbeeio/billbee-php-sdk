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

use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model as Model;
use BillbeeDe\BillbeeAPI\Response as Response;
use BillbeeDe\BillbeeAPI\Type as Type;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use MintWare\JOM\Exception\InvalidJsonException;
use MintWare\JOM\ObjectMapper;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use function GuzzleHttp\Psr7\parse_response;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Client extends AbstractClient
{
    /**
     * The API Endpoint
     *
     * @var string
     */
    protected $endpoint = 'https://app.billbee.io/api/v1/';

    /**
     * The JSON Object Mapper
     *
     * @var ObjectMapper
     */
    protected $jom = null;

    /**
     * If true, the requests will be performed using a batch call.
     * Each single call returns null.
     * Call the executeBatch method to execute all calls and retrieve the responses
     *
     * @see Client::executeBatch()
     *
     * @var bool
     */
    public $useBatching = false;

    /**
     * Contains all requests in batch mode
     *
     * @var array
     */
    protected $requestPool = [];

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Instantiates a new Billbee API client
     *
     * @param string $username The Billbee username
     * @param string $apiPassword The API password for the user
     * @param string $apiKey The API Key
     * @param LoggerInterface $logger Sets a optional logger
     */
    public function __construct($username, $apiPassword, $apiKey, LoggerInterface $logger = null)
    {
        parent::__construct([
            'base_uri' => $this->endpoint,
            'auth' => [$username, $apiPassword],
            'headers' => [
                'X-Billbee-Api-Key' => $apiKey,
            ]
        ]);

        $this->jom = new ObjectMapper();

        if ($logger == null) {
            $logger = new NullLogger();
        }

        $this->logger = $logger;
    }

    #region PRODUCTS

    #region GET

    /**
     * Get a list of all products optionally filtered by date
     *
     * @param int $page The start page
     * @param int $pageSize The page size
     * @param \DateTime|null $minCreatedAt The date of creation of the products
     * @return Response\GetProductsResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
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
            Response\GetProductsResponse::class
        );
    }

    /**
     * Get a single product by Id
     *
     * @param int $productId The product Id
     *
     * @return Response\GetProductResponse The product response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getProduct($productId)
    {
        return $this->requestGET(
            'products/' . $productId,
            [],
            Response\GetProductResponse::class
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
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function updateStock(Model\Stock $stockModel)
    {
        return $this->requestPOST(
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
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function updateStockMultiple($stockModels)
    {
        return $this->requestPOST(
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
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function updateStockCode(Model\StockCode $stockCodeModel)
    {
        return $this->requestPOST(
            'products/updatestockcode',
            $this->jom->objectToJson($stockCodeModel),
            Response\BaseResponse::class
        );
    }

    #endregion

    #endregion

    #region PROVISIONING

    #region GET

    /**
     * Returns information about Billbee terms and conditions
     *
     * @return Response\GetTermsInfoResponse The terms info response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getTermsInfo()
    {
        return $this->requestGET(
            'automaticprovision/termsinfo',
            [],
            Response\GetTermsInfoResponse::class
        );
    }

    #endregion

    #endregion

    #region EVENTS

    #region GET

    /**
     * Get a list of all events optionally filtered by date and / or event type
     *
     * @param int $page The start page
     * @param int $pageSize The page size
     * @param \DateTime $minDate Start date
     * @param \DateTime $maxDate End date
     * @param array $typeIds An array of event type id's
     * @param int $orderId Filter for specific order id
     *
     * @return Response\GetEventsResponse The events
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getEvents(
        $page = 1,
        $pageSize = 50,
        \DateTime $minDate = null,
        \DateTime $maxDate = null,
        $typeIds = [],
        $orderId = null
    ) {
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

        if ($orderId != null) {
            $query['orderId'] = $orderId;
        }

        return $this->requestGET(
            'events',
            $query,
            Response\GetEventsResponse::class
        );
    }

    #endregion

    #endregion

    #region ORDERS

    #region GET

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
     * @param int $articleTitleSource The source field for the article title.
     * @param boolean $excludeTags If true the list of tags passed to the call are used to filter orders to not include these tags
     *
     * @return Response\GetOrdersResponse The orders
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
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
        \DateTime $modifiedAtMax = null,
        $articleTitleSource = Type\ArticleSource::ORDER_POSITION,
        $excludeTags = false
    ) {
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

        if (!is_numeric($articleTitleSource) || $articleTitleSource < 0 || $articleTitleSource > 2) {
            throw new \InvalidArgumentException(sprintf(
                'The articleTitleSource is invalid. Check %s for valid values',
                Type\ArticleSource::class
            ));
        }
        $query['articleTitleSource'] = $articleTitleSource;

        if (is_bool($excludeTags) && $excludeTags === true) {
            $query['excludeTags'] = 'true';
        }

        return $this->requestGET(
            'orders',
            $query,
            Response\GetOrdersResponse::class
        );
    }

    /**
     * Returns a list of fields which can be updated with the patchOrder call
     *
     * @return Response\GetPatchableFieldsResponse
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getPatchableFields()
    {
        return $this->requestGET(
            'orders/PatchableFields',
            [],
            Response\GetPatchableFieldsResponse::class
        );
    }

    /**
     * Get a single order by its internal billbee id
     *
     * @param int $id The internal billbee id of the order
     *
     * @return Response\GetOrderResponse The order response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getOrder($id)
    {
        return $this->requestGET(
            'orders/' . $id,
            [],
            Response\GetOrderResponse::class
        );
    }

    /**
     * Get a single order by its internal billbee id
     *
     * @param string $extRef The internal billbee id of the order
     *
     * @return Response\GetOrderResponse The order response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getOrderByOrderNumber($extRef)
    {
        return $this->requestGET(
            'orders/findbyextref/' . $extRef,
            [],
            Response\GetOrderResponse::class
        );
    }


    /**
     * Find a single order by its external id (order number)
     *
     * @param string $externalId The order id in the partner system
     * @param string $partner The partner name. Possible partners in Partner-Class
     *
     * @return Response\GetOrderResponse The order response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     *
     * @see Type\Partner
     */
    public function getOrderByPartner($externalId, $partner)
    {
        return $this->requestGET(
            'orders/find/' . $externalId . '/' . $partner,
            [],
            Response\GetOrderByPartnerResponse::class
        );
    }

    #endregion

    #region POST

    /**
     * Get a single order by its internal billbee id
     *
     * @param Model\Order $order The order Data
     * @param int $shopId The id of the shop
     *
     * @return Response\BaseResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function createOrder(Model\Order $order, $shopId)
    {
        return $this->requestPOST(
            'orders?shopId=' . $shopId,
            $this->jom->objectToJson($order),
            Response\BaseResponse::class
        );
    }

    /**
     * Attach one or more tags to an order
     *
     * @param int $orderId The internal id of the order
     * @param string[] $tags Tags to attach
     *
     * @return Response\BaseResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function addOrderTags($orderId, $tags = [])
    {
        if (!is_array($tags)) {
            $tags = [$tags];
        }
        return $this->requestPOST(
            'orders/' . $orderId . '/tags',
            json_encode(['Tags' => $tags]),
            Response\BaseResponse::class
        );
    }

    /**
     * Attach one or more tags to an order
     *
     * @param int $orderId The internal id of the order
     * @param Model\Shipment $shipment The Shipment
     *
     * @return bool True if the shipment was added
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function addOrderShipment($orderId, Model\Shipment $shipment)
    {
        $res = $this->requestPOST(
            'orders/' . $orderId . '/shipment',
            $this->jom->objectToJson($shipment),
            Response\BaseResponse::class
        );
        return $res === '' || $res === null;
    }

    /**
     * Create an delivery note for an existing order
     *
     * @param int $orderId The internal id of the order
     * @param bool $includePdf If true, the PDF is included in the response as base64 encoded string
     *
     * @return Response\CreateDeliveryNoteResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function createDeliveryNote($orderId, $includePdf)
    {
        return $this->requestPOST(
            'orders/CreateDeliveryNote/' . $orderId . '?includePdf=' . ($includePdf ? 'True' : 'False'),
            [],
            Response\CreateDeliveryNoteResponse::class
        );
    }

    /**
     * Create an invoice for an existing order
     *
     * @param int $orderId The internal id of the order
     * @param bool $includePdf If true, the PDF is included in the response as base64 encoded string
     *
     * @return Response\CreateDeliveryNoteResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function createInvoice($orderId, $includePdf)
    {
        $node = 'orders/CreateInvoice/' . $orderId . '?includeInvoicePdf=' . ($includePdf ? 'True' : 'False');
        return $this->requestPOST(
            $node,
            [],
            Response\CreateInvoiceResponse::class
        );
    }

    /**
     * Sends a message to the customer
     *
     * @param int $orderId The internal id of the order
     * @param Model\MessageForCustomer $message The message model
     * @return bool True if the message was send, otherwise false
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     * @throws \InvalidArgumentException If the request is not valid
     */
    public function sendMessage($orderId, Model\MessageForCustomer $message)
    {
        if ($message->sendMode < 0 || $message->sendMode > 4) {
            $msg = sprintf("The sendMode is invalid. Check the %s class for valid values", Type\SendMode::class);
            throw new \InvalidArgumentException($msg);
        } elseif (!is_array($message->subject) || count($message->subject) == 0) {
            throw new \InvalidArgumentException("You have to specify a message subject");
        } elseif (!is_array($message->body) || count($message->body) == 0) {
            throw new \InvalidArgumentException("You have to specify a message body");
        } elseif ($message->sendMode == Type\SendMode::EXTERNAL_EMAIL && empty($message->alternativeEmailAddress)) {
            $msg = "With sendMode == 4 it's required to specify an alternativeEmailAddress";
            throw new \InvalidArgumentException($msg);
        }

        if ($message->sendMode != Type\SendMode::EXTERNAL_EMAIL && empty($message->alternativeEmailAddress)) {
            $this->logger->warning('The alternative email address is ignored because sendMode != 4');
        }

        $res = $this->requestPOST(
            'orders/' . $orderId . '/send-message',
            $this->jom->objectToJson($message),
            Response\BaseResponse::class
        );

        return $res === '' || $res === null;
    }

    #endregion

    #region PUT

    /**
     * Updates/Sets the tags attached to an order
     *
     * @param int $orderId The internal id of the order
     * @param string[] $tags Tags to attach
     *
     * @return Response\BaseResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function setOrderTags($orderId, $tags = [])
    {
        if (!is_array($tags)) {
            $tags = [$tags];
        }
        return $this->requestPUT(
            'orders/' . $orderId . '/tags',
            json_encode(['Tags' => $tags]),
            Response\BaseResponse::class
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
     * @throws \Exception If the response cannot be parsed
     *
     * @see Type\OrderState
     */
    public function setOrderState($orderId, $newState)
    {
        $res = $this->requestPUT(
            'orders/' . $orderId . '/orderstate',
            json_encode(['NewStateId' => $newState]),
            Response\BaseResponse::class
        );
        return $res === null;
    }

    #endregion

    #region PATCH

    /**
     * Updates one or more fields of an order
     *
     * @param int $orderId The internal id of the order
     * @param array $model The fields to patch
     *
     * @return Response\GetOrderResponse The order
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function patchOrder($orderId, $model)
    {
        return $this->requestPATCH(
            'orders/' . $orderId,
            $model,
            Response\GetOrderResponse::class
        );
    }

    #endregion

    #endregion

    #region INVOICE

    #region GET

    /**
     * Get a list of all invoices
     *
     * @param \DateTime $minInvoiceDate Specifies the oldest invoice date to include
     * @param \DateTime $maxInvoiceDate Specifies the newest invoice date to include
     * @param int $page Specifies the page to request
     * @param int $pageSize Specifies the number of elements per page. Defaults to 50, max value is 250
     * @param array $shopId Specifies a list of shop ids for which invoices should be included
     * @param array $orderStateId Specifies a list of state ids to include in the response
     * @param array $tag Specifies a list of tags to include in the response
     * @param \DateTime $minPayDate Specifies the oldest pay date to include
     * @param \DateTime $maxPayDate Specifies the newest pay date to include
     * @param bool $includePositions Specifies to include the positions
     *
     * @return Response\GetInvoicesResponse The Invoices
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
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
    ) {
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
            Response\GetInvoicesResponse::class
        );
    }

    #endregion

    #endregion

    #region SHIPMENTS

    #region GET

    /**
     * Query all defined shipping providers
     *
     * @return Response\GetShippingProvidersResponse The shipping providers response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getShippingProviders()
    {
        $providers = $this->requestGET(
            'shipment/shippingproviders',
            [],
            Model\ShippingProvider::class . '[]'
        );

        $response = new Response\GetShippingProvidersResponse();
        $response->data = $providers;
        return $response;
    }

    #endregion

    #endregion

    #region PRODUCT CUSTOM FIELDS

    #region GET

    /**
     * Get a list of all custom fields
     *
     * @param int $page The start page
     * @param int $pageSize The page size
     * @return Response\GetCustomFieldDefinitionsResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getCustomFieldDefinitions($page = 1, $pageSize = 50)
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        return $this->requestGET(
            'products/custom-fields',
            $query,
            Response\GetCustomFieldDefinitionsResponse::class
        );
    }

    /**
     * Get a single custom field
     *
     * @param int $id The id of the custom field
     * @return Response\GetCustomFieldDefinitionResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws InvalidIdException If the id is not an integer or negative
     * @throws \Exception If the response cannot be parsed
     */
    public function getCustomFieldDefinition($id)
    {
        if (!is_integer($id) || $id < 1) {
            throw new InvalidIdException();
        }

        return $this->requestGET(
            'products/custom-fields/' . $id,
            [],
            Response\GetCustomFieldDefinitionResponse::class
        );
    }

    #endregion

    #endregion

    #region WEB HOOKS

    #region GET

    /**
     * Get a list of all registered web hooks
     *
     * @return Model\WebHook[] The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getWebHooks()
    {
        return $this->requestGET(
            'webhooks',
            [],
            Model\WebHook::class . '[]'
        );
    }

    /**
     * Get a web hook by id
     *
     * @param int $id The id of the web hook
     * @return Model\WebHook The Response
     *
     * @throws InvalidJsonException If the response is not valid
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     */
    public function getWebHook($id)
    {
        return $this->requestGET(
            'webhooks/' . $id,
            [],
            Model\WebHook::class
        );
    }

    /**
     * Get a list of all available filters
     *
     * @return array The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getWebHookFilters()
    {
        return $this->requestGET(
            'webhooks/filters',
            [],
            Model\WebHookFilter::class . '[]'
        );
    }

    #endregion

    #region POST

    /**
     * Creates a new web hook
     *
     * @param Model\WebHook $webHook The web hook which should be created
     * @return Model\WebHook The created web hook
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function createWebHook(Model\WebHook $webHook)
    {
        return $this->requestPOST(
            'webhooks',
            $this->jom->objectToJson($webHook),
            Model\WebHook::class
        );
    }

    #endregion

    #region PUT

    /**
     * Updates a web hook
     *
     * @param Model\WebHook $webHook The web hook
     * @return bool True if the web hook was updated
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \InvalidArgumentException If the web hook has no id
     * @throws \Exception If the response cannot be parsed
     */
    public function updateWebHook(Model\WebHook $webHook)
    {
        if ($webHook->id === null) {
            throw new \InvalidArgumentException('The id of the webHook cannot be empty');
        }

        $res = $this->requestPUT(
            'webhooks/' . $webHook->id,
            $this->jom->objectToJson($webHook),
            Model\WebHook::class
        );

        return $res === null;
    }

    #endregion

    #region DELETE

    /**
     * Deletes all existing WebHook registrations.
     *
     * @return bool True if the web hooks was deleted
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function deleteAllWebHooks()
    {
        $res = $this->requestDELETE(
            'webhooks',
            [],
            Response\BaseResponse::class
        );
        return $res === null;
    }

    /**
     * Deletes an existing WebHook registration
     *
     * @param int $id The id of the web hook which should be deleted
     * @return bool True if the web hook was deleted
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \InvalidArgumentException If the web hook has no id
     * @throws \Exception If the response cannot be parsed
     */
    public function deleteWebHookById($id)
    {
        $webHook = new Model\WebHook();
        $webHook->id = $id;
        return $this->deleteWebHook($webHook);
    }

    /**
     * Deletes an existing WebHook registration
     *
     * @param Model\WebHook $webHook The web hook which should be deleted
     * @return bool True if the web hook was deleted
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \InvalidArgumentException If the web hook has no id
     * @throws \Exception If the response cannot be parsed
     */
    public function deleteWebHook(Model\WebHook $webHook)
    {
        if ($webHook->id === null) {
            throw new \InvalidArgumentException('The id of the webHook cannot be empty');
        }

        $res = $this->requestDELETE(
            'webhooks/' . $webHook->id,
            [],
            Response\BaseResponse::class
        );
        return $res === null;
    }

    #endregion

    #endregion

    #region CUSTOMERS

    #region GET

    /**
     * Get a list of all customers
     *
     * @return Response\GetCustomersResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function getCustomers()
    {
        return $this->requestGET(
            'customers',
            [],
            Response\GetCustomersResponse::class
        );
    }

    /**
     * Get a single customers
     *
     * @param int $id The id of the customer
     * @return Response\GetCustomersResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws InvalidIdException If the id is not an integer or negative
     * @throws \Exception If the response cannot be parsed
     */
    public function getCustomer($id)
    {
        if ($id === null || !is_integer($id) || $id < 1) {
            throw new InvalidIdException();
        }
        return $this->requestGET(
            'customers/' . $id,
            [],
            Response\GetCustomerResponse::class
        );
    }

    /**
     * Get the addresses for a single customers
     *
     * @param int $id The id of the customer
     * @param int $page The start page
     * @param int $pageSize The page size
     *
     * @return Response\GetCustomerAddressesResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws InvalidIdException If the id is not an integer or negative
     * @throws \Exception If the response cannot be parsed
     */
    public function getCustomerAddresses($id, $page = 1, $pageSize = 50)
    {
        if ($id === null || !is_integer($id) || $id < 1) {
            throw new InvalidIdException();
        }

        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        return $this->requestGET(
            'customers/' . $id . '/addresses',
            $query,
            Response\GetCustomerAddressesResponse::class
        );
    }

    /**
     * Get the orders for a single customers
     *
     * @param int $id The id of the customer
     * @param int $page The start page
     * @param int $pageSize The page size
     *
     * @return Response\GetOrdersResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws InvalidIdException If the id is not an integer or negative
     * @throws \Exception If the response cannot be parsed
     */
    public function getCustomerOrders($id, $page = 1, $pageSize = 50)
    {
        if ($id === null || !is_integer($id) || $id < 1) {
            throw new InvalidIdException();
        }

        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        return $this->requestGET(
            'customers/' . $id . '/orders',
            $query,
            Response\GetOrdersResponse::class
        );
    }

    #endregion

    #region POST

    /**
     * Creates a new customers
     *
     * @param Model\Customer $customer The customer
     * @param Model\CustomerAddress $address The customers address
     * @return Response\GetCustomersResponse The created customer
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    public function createCustomer(Model\Customer $customer, Model\CustomerAddress $address)
    {
        $customerModel = json_decode($this->jom->objectToJson($customer), true);
        $customerModel['Address'] = json_decode($this->jom->objectToJson($address), true);

        return $this->requestPOST(
            'customers',
            json_encode($customerModel),
            Response\GetCustomerResponse::class
        );
    }

    #endregion

    #region PUT

    /**
     * Updates a customer
     *
     * @param Model\Customer $customer The customer
     * @return Response\GetCustomersResponse The customer
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws InvalidIdException If the customers id is invalid
     * @throws \Exception If the response cannot be parsed
     */
    public function updateCustomer(Model\Customer $customer)
    {
        if (!is_integer($customer->id) || $customer->id < 1) {
            throw new InvalidIdException();
        }

        return $this->requestPUT(
            'customers/' . $customer->id,
            $this->jom->objectToJson($customer),
            Response\GetCustomerResponse::class
        );
    }

    #endregion

    #endregion

    /**
     * Execute all requests in the pool
     *
     * @return Response\BaseResponse[]|mixed[]
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     *
     * @see Client::$useBatching
     */
    public function executeBatch()
    {
        $responses = [];
        if ($this->getPoolSize() > 0) {
            $this->logger->info(sprintf('Performing batch request for %s requests in the pool', $this->getPoolSize()));

            $boundaries = [];
            foreach ($this->requestPool as $_request) {
                $boundaries[] = $this->requestToBoundary($_request['request']);
            }

            $boundary = "--batch\r\n";
            $boundary .= implode("\r\n--batch\r\n", $boundaries);
            $boundary .= "\r\n--batch--\r\n";

            $request = $this->createRequest('POST', 'batch', [
                'headers' => [
                    'Content-Type' => 'multipart/mixed; boundary="batch"',
                    'Mime-Version' => '1.0',
                ],
                'body' => $boundary
            ]);

            $responses = $this->internalRequest(null, function () use ($request) {
                return $request;
            }, true);

            $this->requestPool = [];
        }
        return $responses;
    }

    /**
     * Returns the number of requests in the pool
     *
     * @return int
     */
    public function getPoolSize()
    {
        return count($this->requestPool);
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
     * @throws \Exception If the response cannot be parsed
     */
    protected function requestGET(
        $node,
        $query,
        $responseClass
    ) {
        return $this->internalRequest($responseClass, function () use ($node, $query) {
            return $this->createRequest('GET', $node, [
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
     * @throws \Exception If the response cannot be parsed
     */
    protected function requestPOST(
        $node,
        $data,
        $responseClass
    ) {
        return $this->internalRequest($responseClass, function () use ($data, $node) {
            $field = is_string($data) ? 'body' : 'json';
            return $this->createRequest('POST', $node, [
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
     * @throws \Exception If the response cannot be parsed
     */
    protected function requestPUT(
        $node,
        $data,
        $responseClass
    ) {
        return $this->internalRequest($responseClass, function () use ($data, $node) {
            $field = is_string($data) ? 'body' : 'json';
            return $this->createRequest('PUT', $node, [
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
     * @throws \Exception If the response cannot be parsed
     */
    protected function requestPATCH(
        $node,
        $data,
        $responseClass
    ) {
        return $this->internalRequest($responseClass, function () use ($data, $node) {
            $field = is_string($data) ? 'body' : 'json';
            return $this->createRequest('PATCH', $node, [
                $field => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);
        });
    }

    /**
     * Starts an DELETE request
     *
     * @param string $node The requested node
     * @param array $query The parameters
     * @param string $responseClass The response class
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidJsonException If the response is not valid
     * @throws \Exception If the response cannot be parsed
     */
    protected function requestDELETE(
        $node,
        $query,
        $responseClass
    ) {
        return $this->internalRequest($responseClass, function () use ($node, $query) {
            return $this->createRequest('DELETE', $node, [
                'query' => $query
            ]);
        });
    }

    /**
     * Handles a general request
     *
     * @param string $responseClass The response class
     * @param callable $request A callable which "do" the request
     *
     * @param bool $ignorePool If true and batching is enabled, the request will be executed instead of queueing to pool
     * @return mixed The mapped response object
     *
     * @throws InvalidJsonException If the response is not valid
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws \Exception If the response cannot be parsed
     */
    private function internalRequest($responseClass, callable $request, $ignorePool = false)
    {
        if ($this->useBatching === true && $ignorePool === false) {
            $req = [
                'responseClass' => $responseClass,
                'request' => $request()
            ];
            $this->logger->info('Adding request for batch request to the request pool', $req);
            $this->requestPool[] = $req;
            return null;
        }


        try {
            /** @var ResponseInterface $res */
            $res = $this->sendAsync($request(), [RequestOptions::SYNCHRONOUS => true])->wait();
        } catch (ClientException $ex) {
            if ($ex->getCode() == 429) {
                $this->logger->warning('Request quota exceeded');
                throw new QuotaExceededException($ex->getMessage());
            } else {
                $this->logger->error('Error during request', $ex);
                throw $ex;
            }
        }

        $contents = $res->getBody()->getContents();
        $data = null;
        if ($responseClass !== null) {
            try {
                if (trim($contents) != '' && trim($responseClass) != '') {
                    $data = $this->jom->mapJson($contents, $responseClass);
                } elseif (trim($contents) != '') {
                    $data = $contents;
                }
            } catch (InvalidJsonException $exception) {
                throw $exception;
            } catch (\Exception $exception) {
                throw $exception;
            }
        } else {
            $data = [];
            $responses = $this->getResponsesFromBody($contents);
            foreach ($responses as $i => $response) {
                $responseClass = $this->requestPool[$i]['responseClass'];
                $contents = parse_response($response)->getBody()->getContents();
                try {
                    if (trim($contents) != '' && trim($responseClass) != '') {
                        $data[$i] = $this->jom->mapJson($contents, $responseClass);
                    } elseif (trim($contents) != '') {
                        $data[$i] = $contents;
                    }
                } catch (InvalidJsonException $exception) {
                    $data[$i] = $exception;
                } catch (\Exception $exception) {
                    $data[$i] = $exception;
                }
            }
        }

        return $data;
    }

    /**
     * Converts the response of the batch call in single responses
     *
     * @param string $batchResult
     * @return array
     */
    private function getResponsesFromBody($batchResult)
    {
        $lines = explode("\r\n", $batchResult, 2);
        $batchName = $lines[0];

        $messages = array_filter(explode($batchName . "\r\n", $batchResult));

        $responses = [];
        foreach ($messages as $message) {
            $message = str_replace($batchName . "--\r\n", '', $message);
            $tmpResponse = explode("\r\n\r\n", $message, 2);
            $responses[] = $tmpResponse[1];
        }
        return $responses;
    }

    /**
     * Converts a request to a batch boundary
     * @param RequestInterface $request The request
     * @return string The boundary
     */
    private function requestToBoundary(RequestInterface $request)
    {
        $uri = $request->getUri();
        $plainRequest = '';
        $route = $uri->getPath();
        if (strlen($uri->getQuery()) > 0) {
            $route .= '?' . $uri->getQuery();
        }
        $plainRequest .= "Content-Type: application/http; msgtype=request\r\n";
        $plainRequest .= "\r\n";
        $plainRequest .= sprintf("%s %s HTTP/%s\r\n", $request->getMethod(), $route, $request->getProtocolVersion());
        $plainRequest .= sprintf("Host: %s\r\n", $uri->getHost());
        $headers = $request->getHeaders();
        foreach ($headers as $name => $values) {
            if (strtolower($name) == 'host') {
                continue;
            }
            $plainRequest .= sprintf("%s: %s\r\n", $name, implode(", ", $values));
        }

        $plainRequest .= "\r\n";
        $plainRequest .= $request->getBody()->getContents();
        return $plainRequest;
    }
}
