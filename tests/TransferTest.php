<?php

declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class TransferTest extends TestCase
{
    public function testTransferCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->transfers->create([
            "account_bank" => "044",
            "account_number" => "0690000040",
            "amount" => 5500,
            "narration" => "Akhlm Pstmn Trnsfr xx007",
            "currency" => "NGN",
            "reference" => "akhlm-pstmnpyt-rfxx007_PMCKDU_1",
            "callback_url" => "https://webhook.site/b3e505b0-fe02-430e-a538-22bbbce8ce0d",
            "debit_currency" => "NGN"
        ]);

        $this->assertEquals('success', $plan['status']);
    }

    public function testTransferCanBeRetried(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->transfers->retry(1);

        $this->assertEquals('success', $plan['status']);
    }

    public function testBulkTransferCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->transfers->bulk(
            [
                [
                    "account_bank" => "044",
                    "account_number" => "0690000032",
                    "amount" => 45000,
                    "currency" => "NGN",
                    "narration" => "akhlm blktrnsfr",
                    "reference" => "akhlm-blktrnsfr-xx03"
                ],
                [
                    "account_bank" => "044",
                    "account_number" => "0690000034",
                    "amount" => 5000,
                    "currency" => "NGN",
                    "narration" => "akhlm blktrnsfr",
                    "reference" => "akhlm-blktrnsfr-xy03"
                ]
            ],
            "Staff salary"
        );

        $this->assertEquals('success', $plan['status']);
    }

    public function testTransferFeeCanBeFetched(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->transfers->fee(2000);

        $this->assertEquals('success', $plan['status']);
    }

    public function testTransfersCanBeFetched(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->transfers->all();

        $this->assertEquals('success', $plan['status']);
    }

    public function testTransferCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->transfers->find(2);

        $this->assertEquals('success', $plan['status']);
    }

    public function testTransferRetryCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->transfers->findRetry(2);

        $this->assertEquals('success', $plan['status']);
    }

    public function testBulkTransferCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->transfers->findBulk(2);

        $this->assertEquals('success', $plan['status']);
    }

    public function testTransferRatesCanBeFetched(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->transfers->rates(2000, 'NGN', 'USD');

        $this->assertEquals('success', $plan['status']);
    }
}
