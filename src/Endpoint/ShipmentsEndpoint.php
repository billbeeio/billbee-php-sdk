<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2020 by Billbee GmbH
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
use Exception;
use MintWare\DMM\Serializer\SerializerInterface;

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
            Model\ShippingProvider::class.'[]'
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
            $this->serializer->serialize($shipment),
            Response\ShipWithLabelResponse::class
        );
    }

    #endregion
}
