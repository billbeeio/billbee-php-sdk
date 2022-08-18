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

namespace BillbeeDe\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Endpoint\CloudStorageEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\CustomersEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\EventsEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\InvoiceEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\LayoutsEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\OrdersEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\ProductCustomFieldsEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\ProductsEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\ProvisioningEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\SearchEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\ShipmentsEndpoint;
use BillbeeDe\BillbeeAPI\Endpoint\WebHooksEndpoint;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Logger\DiagnosticsLogger;
use BillbeeDe\BillbeeAPI\Response as Response;
use BillbeeDe\BillbeeAPI\Transformer\AsIsTransformer;
use BillbeeDe\BillbeeAPI\Transformer\DefaultDateTimeHandler;
use BillbeeDe\BillbeeAPI\Transformer\DefinitionConfigTransformer;
use Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\RequestOptions;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class Client implements ClientInterface, BatchClientInterface
{
    use LoggerAwareTrait;

    /**
     * The API Endpoint
     *
     * @var string
     */
    protected $endpoint = 'https://api.billbee.io/api/v1/';

    /**
     * The serializer.
     *
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * If true, the requests will be performed using a batch call.
     * Each single call returns null.
     * Call the executeBatch method to execute all calls and retrieve the responses
     *
     * @see Client::executeBatch()
     *
     * @var bool
     */
    private $useBatching = false;

    /**
     * Contains all requests in batch mode
     *
     * @var array
     */
    protected $requestPool = [];

    /**
     * If true, the requests will be logged
     *
     * @var bool
     */
    private $logRequests = false;

    /** @var ProductsEndpoint */
    private $productsEndpoint;

    /** @var ProvisioningEndpoint */
    private $provisioningEndpoint;

    /** @var EventsEndpoint */
    private $eventsEndpoint;

    /** @var OrdersEndpoint */
    private $ordersEndpoint;

    /** @var InvoiceEndpoint */
    private $invoicesEndpoint;

    /** @var ShipmentsEndpoint */
    private $shipmentsEndpoint;

    /** @var ProductCustomFieldsEndpoint */
    private $customFieldsEndpoint;

    /** @var WebHooksEndpoint */
    private $webHooksEndpoint;

    /** @var CustomersEndpoint */
    private $customersEndpoint;

    /** @var CloudStorageEndpoint */
    private $cloudStoragesEndpoint;

    /** @var LayoutsEndpoint */
    private $layoutsEndpoint;

    /** @var SearchEndpoint */
    private $searchEndpoint;

    /** @var CustomClient */
    private $client;

    /**
     * Instantiates a new Billbee API client
     *
     * @param string $username The Billbee username
     * @param string $apiPassword The API password for the user
     * @param string $apiKey The API Key
     * @param LoggerInterface $logger Sets a optional logger
     * @throws Exception
     */
    public function __construct($username, $apiPassword, $apiKey, LoggerInterface $logger = null)
    {
        $this->client = new CustomClient([
            'base_uri' => $this->endpoint,
            'auth' => [$username, $apiPassword],
            'headers' => [
                'X-Billbee-Api-Key' => $apiKey,
            ],
            'verify' => false
        ]);

        $this->setLogger($logger);
        $this->client->setLogger($logger);
        $this->serializer = SerializerBuilder::create()
            ->addDefaultDeserializationVisitors()
            ->addDefaultSerializationVisitors()
            ->addDefaultHandlers()
            ->addDefaultListeners()
            ->configureHandlers(
                function (HandlerRegistry $registry) {
                    $registry->registerSubscribingHandler(new DefinitionConfigTransformer());
                    $registry->registerSubscribingHandler(new AsIsTransformer());
                    $registry->registerSubscribingHandler(new DefaultDateTimeHandler());
                }
            )->build();

        $this->productsEndpoint = new ProductsEndpoint($this, $this->serializer);
        $this->provisioningEndpoint = new ProvisioningEndpoint($this);
        $this->eventsEndpoint = new EventsEndpoint($this);
        $this->ordersEndpoint = new OrdersEndpoint($this, $this->serializer, $logger);
        $this->invoicesEndpoint = new InvoiceEndpoint($this);
        $this->shipmentsEndpoint = new ShipmentsEndpoint($this, $this->serializer);
        $this->customFieldsEndpoint = new ProductCustomFieldsEndpoint($this);
        $this->webHooksEndpoint = new WebHooksEndpoint($this, $this->serializer);
        $this->customersEndpoint = new CustomersEndpoint($this, $this->serializer);
        $this->cloudStoragesEndpoint = new CloudStorageEndpoint($this);
        $this->layoutsEndpoint = new LayoutsEndpoint($this);
        $this->searchEndpoint = new SearchEndpoint($this);
    }

    /** @return ProductsEndpoint */
    public function products()
    {
        return $this->productsEndpoint;
    }


    /** @return ProvisioningEndpoint */
    public function provisioning()
    {
        return $this->provisioningEndpoint;
    }

    /** @return EventsEndpoint */
    public function events()
    {
        return $this->eventsEndpoint;
    }

    /** @return OrdersEndpoint */
    public function orders()
    {
        return $this->ordersEndpoint;
    }

    /** @return InvoiceEndpoint */
    public function invoices()
    {
        return $this->invoicesEndpoint;
    }

    /** @return ShipmentsEndpoint */
    public function shipments()
    {
        return $this->shipmentsEndpoint;
    }

    /** @return ProductCustomFieldsEndpoint */
    public function productCustomFields()
    {
        return $this->customFieldsEndpoint;
    }

    /** @return WebHooksEndpoint */
    public function webHooks()
    {
        return $this->webHooksEndpoint;
    }

    /** @return CustomersEndpoint */
    public function customers()
    {
        return $this->customersEndpoint;
    }

    /** @return CloudStorageEndpoint */
    public function cloudStorages()
    {
        return $this->cloudStoragesEndpoint;
    }

    /** @return LayoutsEndpoint */
    public function layouts()
    {
        return $this->layoutsEndpoint;
    }

    /** @return SearchEndpoint */
    public function search()
    {
        return $this->searchEndpoint;
    }

    /**
     * Execute all requests in the pool
     *
     * @return Response\BaseResponse[]|mixed[]
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
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
                $boundaries[] = $this->requestToBoundary($_request['requestFactory']());
            }

            $boundary = "--batch\r\n";
            $boundary .= implode("\r\n--batch\r\n", $boundaries);
            $boundary .= "\r\n--batch--\r\n";

            $request = $this->client->createRequest('POST', 'batch', [
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

    /**+
     * Enables the batch mode
     * Requests will be performed using a batch call.
     * Each single call returns null.
     * Call the executeBatch method to execute all calls and retrieve the responses
     *
     * @see Client::executeBatch()
     */
    public function enableBatchMode()
    {
        $this->useBatching = true;
    }

    /**+
     * Disables the batch mode
     * Requests are executed directly and returns the result.
     */
    public function disableBatchMode()
    {
        $this->useBatching = false;
    }

    public function isBatchModeEnabled()
    {
        return $this->useBatching;
    }

    public function get(
        $node,
        $query,
        $responseClass
    ) {
        return $this->internalRequest($responseClass, function () use ($node, $query) {
            return $this->client->createRequest('GET', $node, [
                'query' => $query,
            ]);
        });
    }

    public function post(
        $node,
        $data,
        $responseClass
    ) {
        return $this->internalRequest($responseClass, function () use ($data, $node) {
            $field = is_string($data) ? 'body' : 'json';

            return $this->client->createRequest('POST', $node, [
                $field => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);
        });
    }

    public function put(
        $node,
        $data,
        $responseClass
    ) {
        return $this->internalRequest($responseClass, function () use ($data, $node) {
            $field = is_string($data) ? 'body' : 'json';

            return $this->client->createRequest('PUT', $node, [
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
     * @throws Exception If the response cannot be parsed
     */
    public function patch(
        $node,
        $data,
        $responseClass
    ) {
        return $this->internalRequest($responseClass, function () use ($data, $node) {
            $field = is_string($data) ? 'body' : 'json';

            return $this->client->createRequest('PATCH', $node, [
                $field => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);
        });
    }

    public function delete(
        $node,
        $query,
        $responseClass
    ) {
        return $this->internalRequest($responseClass, function () use ($node, $query) {
            return $this->client->createRequest('DELETE', $node, [
                'query' => $query,
            ]);
        });
    }

    /**
     * Handles a general request
     *
     * @param string|null $responseClass The response class
     * @param callable $requestFactory A callable which creates the request object
     *
     * @param bool $ignorePool If true and batching is enabled, the request will be executed instead of queueing to pool
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    private function internalRequest($responseClass, callable $requestFactory, $ignorePool = false)
    {
        if ($this->useBatching === true && $ignorePool === false) {
            $req = [
                'responseClass' => $responseClass,
                'requestFactory' => $requestFactory
            ];
            $this->logger->info('Adding request for batch request to the request pool', $req);
            $this->requestPool[] = $req;
            return null;
        }

        $contents = null;
        try {
            $request = $requestFactory();
            if ($this->logRequests || $this->logger instanceof DiagnosticsLogger) {
                $this->logger->debug(sprintf('Execute request to %s', $request->getUri()), [
                    'method' => $request->getMethod(),
                    'body' => $request->getBody(),
                ]);
            }
            /** @var ResponseInterface $res */
            $res = $this->client->sendAsync($request, [RequestOptions::SYNCHRONOUS => true])->wait();
            $contents = $res->getBody()->getContents();

            if ($this->logRequests || $this->logger instanceof DiagnosticsLogger) {
                $this->logger->debug(sprintf('Request to %s executed successfully', $request->getUri()), [
                    'headers' => $res->getHeaders(),
                    'body' => $contents,
                ]);
            }
        } catch (ClientException $ex) {
            if ($ex->getCode() == 429) {
                $this->logger->warning('Request quota exceeded');
                throw new QuotaExceededException($ex->getMessage());
            } else {
                $this->logger->error('Error during request', (array)$ex);
                throw $ex;
            }
        }

        $data = null;
        if ($responseClass !== null) {
            try {
                if (trim($contents) != '' && trim($responseClass) != '') {
                    $data = $this->serializer->deserialize($contents, $responseClass, 'json');
                } elseif (trim($contents) != '') {
                    $data = $contents;
                }
            } catch (Exception $exception) {
                throw $exception;
            }
        } else {
            $data = [];
            $responses = $this->getResponsesFromBody($contents);
            foreach ($responses as $i => $response) {
                $responseClass = $this->requestPool[$i]['responseClass'];
                $contents = Message::parseResponse($response)->getBody()->getContents();
                try {
                    if (trim($contents) != '' && trim($responseClass) != '') {
                        $data[$i] = $this->serializer->deserialize($contents, $responseClass, 'json');
                    } elseif (trim($contents) != '') {
                        $data[$i] = $contents;
                    }
                } catch (Exception $exception) {
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

    /** @return bool */
    public function getLogRequests()
    {
        return $this->logRequests;
    }

    /**
     * @param bool $logRequests
     * @return Client
     */
    public function setLogRequests($logRequests)
    {
        $this->logRequests = $logRequests;
        return $this;
    }
}
