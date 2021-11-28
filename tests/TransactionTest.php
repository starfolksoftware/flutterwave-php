<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class TransactionTest extends TestCase
{
    public function testTransactionsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $transaction = $this->client()->transactions->all([]);

        $this->assertEquals('success', $transaction['status']);
    }

    public function testTransactionFeeCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $transaction = $this->client()->transactions->fee([
            'amount' => 10000,
            'currency' => 'NGN',
        ]);

        $this->assertEquals('success', $transaction['status']);
    }

    public function testWebhookCanBeResent(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $transaction = $this->client()->transactions->webhook(
            id: 12345
        );

        $this->assertEquals('success', $transaction['status']);
    }

    public function testTransactionCanBeVerified(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $transaction = $this->client()->transactions->verify(
            id: 12345
        );

        $this->assertEquals('success', $transaction['status']);
    }

    public function testTransactionTimelineCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $transaction = $this->client()->transactions->timeline(
            id: 12345
        );

        $this->assertEquals('success', $transaction['status']);
    }
}
