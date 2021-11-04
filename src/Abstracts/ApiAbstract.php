<?php

namespace StarfolkSoftware\Flutterwave\Abstracts;

use Http\Client\Common\HttpMethodsClientInterface;
use StarfolkSoftware\Flutterwave\Client;

abstract class ApiAbstract
{
    /** @var Client $client */
    protected Client $client;

    /** @var HttpMethodsClientInterface $httpClient */
    protected HttpMethodsClientInterface $httpClient;

    /**
     * Subscription constructor.
     * 
     * @param Client $client
     * 
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;

        $this->httpClient = $this->client->getHttpClient();
    }
}