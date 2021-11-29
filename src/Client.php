<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave;

use Http\Mock\Client as MockClient;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use StarfolkSoftware\Flutterwave\API\Beneficiary;
use StarfolkSoftware\Flutterwave\API\Charge;
use StarfolkSoftware\Flutterwave\API\Plan;
use StarfolkSoftware\Flutterwave\API\Refund;
use StarfolkSoftware\Flutterwave\API\Subscription;
use StarfolkSoftware\Flutterwave\API\Transaction;

/**
 * PHP Flutterwave client.
 * 
 * @author Faruk Nasir <faruk@starfolksoftware.com>
 *
 * Website: http://github.com/starfolksoftware/flutterwave-php
 */
final class Client
{
    /** @var ClientBuilder $clientBuilder */
    private ClientBuilder $clientBuilder;

    /**
     * Intantiate the client class
     * 
     * @param array $opts
     * 
     * @return void
     */
    public function __construct(array $opts = [])
    {
        $options = new Options($opts);

        $this->apiVersion = $options->getApiVersion();

        $this->clientBuilder = $options->getClientBuilder();

        $this->clientBuilder->addPlugin(new BaseUriPlugin($options->getUri()));

        $this->clientBuilder->addPlugin(
            new HeaderDefaultsPlugin(
                [
                    'User-Agent' => sprintf(
                        'Flutterwave SDK by Starfolk Software %s (http://github.com/starfolksoftware/flutterwave-php).',
                        $options->getApiVersion()
                    ),
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => sprintf('Bearer %s', $options->getSecretKey()),
                ]
            )
        );
    }

    /**
     * Get http client
     * 
     * @return HttpMethodsClientInterface
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->clientBuilder->getHttpClient();
    }

    /**
     * Plan API
     * 
     * @return Plan
     */
    protected function plans(): Plan
    {
        return new Plan($this);
    }

    /**
     * Subscription API
     * 
     * @return Subscription
     */
    protected function subscriptions(): Subscription
    {
        return new Subscription($this);
    }

    /**
     * Charge API
     * 
     * @return Charge
     */
    protected function charges(): Charge
    {
        return new Charge($this);
    }

    /**
     * Transaction API
     * 
     * @return Transaction
     */
    protected function transactions(): Transaction
    {
        return new Transaction($this);
    }

    /**
     * Beneficiary API
     * 
     * @return Beneficiary
     */
    protected function beneficiaries(): Beneficiary
    {
        return new Beneficiary($this);
    }

    /**
     * Refund API
     * 
     * @return Refund
     */
    protected function refunds(): Refund
    {
        return new Refund($this);
    }

    /**
     * Read data from inaccessible (protected or private) 
     * or non-existing properties.
     * 
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        if (method_exists($this, $name)) {
            return $this->{$name}();
        }
    }

    /**
     * Mock client
     * 
     * @param MockClient $client
     * @return static
     */
    public static function fake(MockClient $client)
    {
        return new Client([
            'clientBuilder' => new ClientBuilder($client),
            'secretKey' => 'fake'
        ]);
    }
}
