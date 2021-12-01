<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class BillTest extends TestCase
{
    public function testBillCategoriesCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->bills->categories();

        $this->assertEquals('success', $response['status']);
    }

    public function testBillServiceCanBeValidated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->bills->validate('1234567890', '0987654321', '0987654321');

        $this->assertEquals('success', $response['status']);
    }

    public function testBillPaymentCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->bills->create([
            "country" => "NG",
            "customer" => "+23490803840303",
            "amount" => 500,
            "recurrence" => "ONCE",
            "type" => "AIRTIME",
            "reference" => "9300049404444"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testBillPaymentCanBeCreatedInBulk(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->bills->bulkCreate(
            "edf-12de5223d2f32",
            "https://webhook.site/5f9a659a-11a2-4925-89cf-8a59ea6a019a",
            [
                [
                    "country" => "NG",
                    "customer" => "+23490803840303",
                    "amount" => 500,
                    "recurrence" => "WEEKLY",
                    "type" => "AIRTIME",
                    "reference" => "930049200929"
                ],
                [
                    "country" => "NG",
                    "customer" => "+23490803840304",
                    "amount" => 500,
                    "recurrence" => "WEEKLY",
                    "type" => "AIRTIME",
                    "reference" => "930004912332"
                ]
            ]
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testBillPaymentStatusCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->bills->status('dsdfsdf');

        $this->assertEquals('success', $response['status']);
    }

    public function testBillPaymentsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->bills->payments(
            'from',
            'to',
        );

        $this->assertEquals('success', $response['status']);
    }
}
