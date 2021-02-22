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
use DateTimeInterface;
use Exception;
use InvalidArgumentException;
use MintWare\DMM\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;

class OrdersEndpoint
{
    /** @var ClientInterface */
    private $client;

    /** @var LoggerInterface|null */
    private $logger;

    /** @var SerializerInterface */
    private $serializer;

    public function __construct(
        ClientInterface $client,
        SerializerInterface $serializer,
        LoggerInterface $logger = null
    ) {
        $this->client = $client;
        $this->serializer = $serializer;
        $this->logger = $logger;
    }

    #region GET

    /**
     * Get a list of all orders optionally filtered by date
     *
     * @param int $page Specifies the page to request
     * @param int $pageSize Specifies the pagesize. Defaults to 50, max value is 250
     * @param DateTimeInterface|null $minOrderDate Specifies the oldest order date to include in the response
     * @param DateTimeInterface|null $maxOrderDate Specifies the newest order date to include in the response
     * @param int[] $shopId Specifies a list of shop ids for which invoices should be included
     * @param int[] $orderStateId Specifies a list of state ids to include in the response
     * @param string[] $tag Specifies a list of tags the order must have attached to be included in the response
     * @param null $minimumOrderId If given, all delivered orders have an Id greater than or equal to the given minimumOrderId
     * @param DateTimeInterface|null $modifiedAtMin If given, the last modification has to be newer than the given date
     * @param DateTimeInterface|null $modifiedAtMax If given, the last modification has to be older or equal than the given date.
     * @param int $articleTitleSource The source field for the article title.
     * @param boolean $excludeTags If true the list of tags passed to the call are used to filter orders to not include these tags
     *
     * @return Response\GetOrdersResponse The orders
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getOrders(
        $page = 1,
        $pageSize = 50,
        DateTimeInterface $minOrderDate = null,
        DateTimeInterface $maxOrderDate = null,
        array $shopId = [],
        array $orderStateId = [],
        array $tag = [],
        $minimumOrderId = null,
        DateTimeInterface $modifiedAtMin = null,
        DateTimeInterface $modifiedAtMax = null,
        $articleTitleSource = Type\ArticleSource::ORDER_POSITION,
        $excludeTags = false
    ) {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($minOrderDate !== null) {
            $query['minOrderDate'] = $minOrderDate->format('c');
        }

        if ($maxOrderDate !== null) {
            $query['maxOrderDate'] = $maxOrderDate->format('c');
        }

        if (!empty($shopId)) {
            $shopId = array_values(array_unique(array_filter($shopId)));
            foreach ($shopId as $value) {
                if (!is_numeric($value)) {
                    throw new InvalidArgumentException('All elements in shopId must be numeric.');
                }
            }
            if (!empty($shopId)) {
                $query['shopId'] = $shopId;
            }
        }

        if (!empty($orderStateId)) {
            $orderStateId = array_values(array_unique(array_filter($orderStateId)));
            foreach ($orderStateId as $value) {
                if (!is_numeric($value)) {
                    throw new InvalidArgumentException('All elements in orderStateId must be numeric.');
                }
            }
            if (!empty($orderStateId)) {
                $query['orderStateId'] = $orderStateId;
            }
        }

        if (!empty($tag)) {
            $tag = array_values(array_unique(array_filter($tag)));
            if (!empty($tag)) {
                $query['tag'] = $tag;
            }
        }

        if (!empty($minimumOrderId)) {
            $query['minimumBillBeeOrderId'] = $minimumOrderId;
        }

        if ($modifiedAtMin !== null) {
            $query['modifiedAtMin'] = $modifiedAtMin->format('c');
        }

        if ($modifiedAtMax !== null) {
            $query['modifiedAtMax'] = $modifiedAtMax->format('c');
        }

        if (!is_numeric($articleTitleSource) || $articleTitleSource < 0 || $articleTitleSource > 2) {
            throw new InvalidArgumentException(sprintf(
                'The articleTitleSource is invalid. Check %s for valid values',
                Type\ArticleSource::class
            ));
        }
        $query['articleTitleSource'] = $articleTitleSource;

        if (is_bool($excludeTags) && $excludeTags) {
            $query['excludeTags'] = 'true';
        }

        return $this->client->get(
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
     * @throws Exception If the response cannot be parsed
     */
    public function getPatchableFields()
    {
        return $this->client->get(
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
     * @throws Exception If the response cannot be parsed
     */
    public function getOrder($id)
    {
        return $this->client->get(
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
     * @throws Exception If the response cannot be parsed
     */
    public function getOrderByOrderNumber($extRef)
    {
        return $this->client->get(
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
     * @throws Exception If the response cannot be parsed
     *
     * @see \BillbeeDe\BillbeeAPI\Type\Partner
     */
    public function getOrderByPartner($externalId, $partner)
    {
        return $this->client->get(
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
     * @throws Exception If the response cannot be parsed
     */
    public function createOrder(Model\Order $order, $shopId)
    {
        return $this->client->post(
            'orders?shopId=' . $shopId,
            $this->serializer->serialize($order),
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
     * @throws Exception If the response cannot be parsed
     */
    public function addOrderTags($orderId, array $tags = [])
    {
        return $this->client->post(
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
     * @throws Exception If the response cannot be parsed
     */
    public function addOrderShipment($orderId, Model\Shipment $shipment)
    {
        $res = $this->client->post(
            'orders/' . $orderId . '/shipment',
            $this->serializer->serialize($shipment),
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
     * @throws Exception If the response cannot be parsed
     */
    public function createDeliveryNote($orderId, $includePdf = false)
    {
        return $this->client->post(
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
     * @param int|null $templateId The internal id of a template
     * @param int|null $sendToCloudId The internal id of an cloud storage where the invoice is uploaded to
     *
     * @return Response\CreateDeliveryNoteResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function createInvoice($orderId, $includePdf = false, $templateId = null, $sendToCloudId = null)
    {
        $node = 'orders/CreateInvoice/' . $orderId . '?includeInvoicePdf=' . ($includePdf ? 'True' : 'False');
        if ($templateId != null && is_numeric($templateId)) {
            $node .= '&templateId=' . $templateId;
        }
        if ($sendToCloudId != null && is_numeric($sendToCloudId)) {
            $node .= '&sendToCloudId=' . $sendToCloudId;
        }
        return $this->client->post(
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
     * @throws Exception If the response cannot be parsed
     * @throws InvalidArgumentException If the request is not valid
     */
    public function sendMessage($orderId, Model\MessageForCustomer $message)
    {
        if ($message->sendMode < 0 || $message->sendMode > 4) {
            $msg = sprintf("The sendMode is invalid. Check the %s class for valid values", Type\SendMode::class);
            throw new InvalidArgumentException($msg);
        }
        if (!is_array($message->subject) || count($message->subject) == 0) {
            throw new InvalidArgumentException("You have to specify a message subject");
        }
        if (!is_array($message->body) || count($message->body) == 0) {
            throw new InvalidArgumentException("You have to specify a message body");
        }
        if ($message->sendMode == Type\SendMode::EXTERNAL_EMAIL && empty($message->alternativeEmailAddress)) {
            $msg = "With sendMode == 4 it's required to specify an alternativeEmailAddress";
            throw new InvalidArgumentException($msg);
        }

        if ($message->sendMode != Type\SendMode::EXTERNAL_EMAIL
            && !empty($message->alternativeEmailAddress)
            && $this->logger != null
        ) {
            $this->logger->warning('The alternative email address is ignored because sendMode != 4');
        }

        $res = $this->client->post(
            'orders/' . $orderId . '/send-message',
            $this->serializer->serialize($message),
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
     * @throws Exception If the response cannot be parsed
     */
    public function setOrderTags($orderId, array $tags = [])
    {
        return $this->client->put(
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
     * @throws Exception If the response cannot be parsed
     *
     * @see \BillbeeDe\BillbeeAPI\Type\OrderState
     */
    public function setOrderState($orderId, $newState)
    {
        $res = $this->client->put(
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
     * @throws Exception If the response cannot be parsed
     */
    public function patchOrder($orderId, $model)
    {
        return $this->client->patch(
            'orders/' . $orderId,
            $model,
            Response\GetOrderResponse::class
        );
    }

    #endregion
}
