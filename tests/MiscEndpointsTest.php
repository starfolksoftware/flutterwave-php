<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class MiscEndpointsTest extends TestCase
{
    public function testBalancesCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->balances();

        $this->assertEquals('success', $response['status']);
    }

    public function testAccountsCanBeResolved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->resolveAccount('dsdfs', 'dsdfsdf');

        $this->assertEquals('success', $response['status']);
    }

    public function testBvnCanBeResolved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->resolveBvn('dsdfs');

        $this->assertEquals('success', $response['status']);
    }

    public function testCardBinCanBeResolved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->resolveCardBin(2332);

        $this->assertEquals('success', $response['status']);
    }

    public function testFxRatesCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->fxRates('ngn', 'usd', 2000);

        $this->assertEquals('success', $response['status']);
    }

    public function testBalanceHistoryCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->balanceHistory('dsdfs', 'dfsdf', 'ngn');

        $this->assertEquals('success', $response['status']);
    }
}