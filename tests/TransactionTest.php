<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;
use StarfolkSoftware\Flutterwave\Options\TransactionFeeOptions;
use StarfolkSoftware\Flutterwave\Options\TransactionQueryParams;

final class TransactionTest extends TestCase
{
    public function testTransactionsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $transaction = $this->client()->transaction()->all(
            params: new TransactionQueryParams([])
        );

        $this->assertEquals('success', $transaction['status']);
    }

    public function testTransactionFeeCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $transaction = $this->client()->transaction()->fee(
            options: new TransactionFeeOptions([
                'amount' => 10000,
                'currency' => 'NGN',
            ])
        );

        $this->assertEquals('success', $transaction['status']);
    }

    public function testWebhookCanBeResent(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $transaction = $this->client()->transaction()->webhook(
            id: 12345
        );

        $this->assertEquals('success', $transaction['status']);
    }

    public function testTransactionCanBeVerified(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $transaction = $this->client()->transaction()->verify(
            id: 12345
        );

        $this->assertEquals('success', $transaction['status']);
    }

    public function testTransactionTimelineCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $transaction = $this->client()->transaction()->timeline(
            id: 12345
        );

        $this->assertEquals('success', $transaction['status']);
    }
}
