<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave;

use Http\Mock\Client as MockClient;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use StarfolkSoftware\Flutterwave\API\Bank;
use StarfolkSoftware\Flutterwave\API\Beneficiary;
use StarfolkSoftware\Flutterwave\API\Charge;
use StarfolkSoftware\Flutterwave\API\Chargeback;
use StarfolkSoftware\Flutterwave\API\Otp;
use StarfolkSoftware\Flutterwave\API\PayoutSubaccount;
use StarfolkSoftware\Flutterwave\API\Plan;
use StarfolkSoftware\Flutterwave\API\Preauthorization;
use StarfolkSoftware\Flutterwave\API\Refund;
use StarfolkSoftware\Flutterwave\API\Settlement;
use StarfolkSoftware\Flutterwave\API\Subaccount;
use StarfolkSoftware\Flutterwave\API\Subscription;
use StarfolkSoftware\Flutterwave\API\Transaction;
use StarfolkSoftware\Flutterwave\API\Transfer;
use StarfolkSoftware\Flutterwave\API\VirtualAccountNumber;
use StarfolkSoftware\Flutterwave\API\VirtualCard;

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
     * Charge API
     * 
     * @return Charge
     */
    protected function charges(): Charge
    {
        return new Charge($this);
    }

    /**
     * Preauthorization API
     * 
     * @return Preauthorization
     */
    protected function preauthorizations(): Preauthorization
    {
        return new Preauthorization($this);
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
     * Refund API
     * 
     * @return Refund
     */
    protected function refunds(): Refund
    {
        return new Refund($this);
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
     * Virtual Cards API
     * 
     * @return VirtualCard
     */
    protected function virtualCards(): VirtualCard
    {
        return new VirtualCard($this);
    }

    /**
     * Virtual Account Number API
     * 
     * @return VirtualAccountNumber
     */
    protected function virtualAccountNumbers(): VirtualAccountNumber
    {
        return new VirtualAccountNumber($this);
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
     * Subaccount API
     * 
     * @return Subaccount
     */
    protected function subaccounts(): Subaccount
    {
        return new Subaccount($this);
    }

    /**
     * Transfer API
     * 
     * @return Transfer
     */
    protected function transfers(): Transfer
    {
        return new Transfer($this);
    }

    /**
     * Bank API
     * 
     * @return Bank
     */
    protected function banks(): Bank
    {
        return new Bank($this);
    }

    /**
     * Settlement API
     * 
     * @return Settlement
     */
    protected function settlements(): Settlement
    {
        return new Settlement($this);
    }

    /**
     * Otp API
     * 
     * @return Otp
     */
    protected function otps(): Otp
    {
        return new Otp($this);
    }

    /**
     * Chargeback API
     * 
     * @return Chargeback
     */
    protected function chargebacks(): Chargeback
    {
        return new Chargeback($this);
    }

    /**
     * Payout Subaccount API
     * 
     * @return PayoutSubaccount
     */
    protected function payoutSubaccounts(): PayoutSubaccount
    {
        return new PayoutSubaccount($this);
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
