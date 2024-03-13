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

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\BatchClientInterface;
use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model as Model;
use BillbeeDe\BillbeeAPI\Response as Response;
use DateTimeInterface;
use Exception;
use JMS\Serializer\SerializerInterface;

class ShipmentsEndpoint
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

    #region GET

    /**
     * Query all defined shipping providers
     *
     * @return Response\GetShippingProvidersResponse|null The shipping providers response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getShippingProviders()
    {
        $providers = $this->client->get(
            'shipment/shippingproviders',
            [],
            sprintf('array<%s>', Model\ShippingProvider::class)
        );

        if ($this->client instanceof BatchClientInterface && $this->client->isBatchModeEnabled()) {
            return null;
        }

        $response = new Response\GetShippingProvidersResponse();
        $response->data = $providers;

        return $response;
    }

    #endregion

    #region POST

    /**
     * Creates a shipment for an order in billbee
     *
     * @return Response\ShipWithLabelResponse The response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function shipWithLabel(Model\ShipmentWithLabel $shipment)
    {
        return $this->client->post(
            'shipment/shipwithlabel',
            $this->serializer->serialize($shipment, 'json'),
            Response\ShipWithLabelResponse::class
        );
    }

    #endregion

    /**
     * Get a list of shipments
     *
     * @param int $page The start page
     * @param int $pageSize The page size
     * @param ?DateTimeInterface $createdAtMin Start date
     * @param ?DateTimeInterface $createdAtMax End date
     * @param ?int $orderId Filter for specific order id
     * @param ?int $minimumShipmentId Filter for minimum ShipmentId
     * @param ?int $shippingProviderId Filter for specific ShipmentProvideId
     * @return Response\GetShipmentsResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getShipments($page = 1, $pageSize = 50,
                                 ?DateTimeInterface $createdAtMin=NULL,
                                 ?DateTimeInterface $createdAtMax=NULL,
                                 ?int $orderId=NULL,
                                 ?int $minimumShipmentId=NULL,
                                 ?int $shippingProviderId=NULL)
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($createdAtMin !== null) {
            $query['createdAtMin'] = $createdAtMin->format('c');
        }

        if ($createdAtMax !== null) {
            $query['createdAtMax'] = $createdAtMax->format('c');
        }

        if ($orderId != null) {
            $query['orderId'] = $orderId;
        }

        if ($minimumShipmentId != null) {
            $query['minimumShipmentId'] = $minimumShipmentId;
        }

        if ($shippingProviderId != null) {
            $query['shippingProviderId'] = $shippingProviderId;
        }

        return $this->client->get(
            'shipment/shipments',
            $query,
            Response\GetShipmentsResponse::class
        );
    }
}
