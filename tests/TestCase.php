<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Http\Mock\Client;
use StarfolkSoftware\Flutterwave\Client as FlutterwaveClient;
use StarfolkSoftware\Flutterwave\ClientBuilder;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Client $mockClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockClient = new Client();
    }

    protected function client(): FlutterwaveClient
    {
        return new FlutterwaveClient([
            'clientBuilder' => new ClientBuilder($this->mockClient),
            'secretKey' => 'secret',
        ]);
    }
}