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

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model as Model;
use BillbeeDe\BillbeeAPI\Response as Response;
use Exception;
use InvalidArgumentException;
use MintWare\DMM\Serializer\SerializerInterface;

class WebHooksEndpoint
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
     * Get a list of all registered web hooks
     *
     * @return Model\WebHook[] The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getWebHooks()
    {
        return $this->client->get(
            'webhooks',
            [],
            Model\WebHook::class . '[]'
        );
    }

    /**
     * Get a web hook by id
     *
     * @param string $id The id of the web hook
     * @return Model\WebHook The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     */
    public function getWebHook($id)
    {
        return $this->client->get(
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
     * @throws Exception If the response cannot be parsed
     */
    public function getWebHookFilters()
    {
        return $this->client->get(
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
     * @throws Exception If the response cannot be parsed
     */
    public function createWebHook(Model\WebHook $webHook)
    {
        return $this->client->post(
            'webhooks',
            $this->serializer->serialize($webHook),
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
     * @throws InvalidArgumentException If the web hook has no id
     * @throws Exception If the response cannot be parsed
     */
    public function updateWebHook(Model\WebHook $webHook)
    {
        if ($webHook->id === null) {
            throw new InvalidArgumentException('The id of the webHook cannot be empty');
        }

        $res = $this->client->put(
            'webhooks/' . $webHook->id,
            $this->serializer->serialize($webHook),
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
     * @throws Exception If the response cannot be parsed
     */
    public function deleteAllWebHooks()
    {
        $res = $this->client->delete(
            'webhooks',
            [],
            Response\BaseResponse::class
        );
        return $res === null;
    }

    /**
     * Deletes an existing WebHook registration
     *
     * @param string $id The id of the web hook which should be deleted
     * @return bool True if the web hook was deleted
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidArgumentException If the web hook has no id
     * @throws Exception If the response cannot be parsed
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
     * @throws InvalidArgumentException If the web hook has no id
     * @throws Exception If the response cannot be parsed
     */
    public function deleteWebHook(Model\WebHook $webHook)
    {
        if ($webHook->id === null) {
            throw new InvalidArgumentException('The id of the webHook cannot be empty');
        }

        $res = $this->client->delete(
            'webhooks/' . $webHook->id,
            [],
            Response\BaseResponse::class
        );
        return $res === null;
    }

    #endregion
}
