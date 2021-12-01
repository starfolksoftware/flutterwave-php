<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class RemitaPaymentTest extends TestCase
{
    public function testAgenciesCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->remitaPayments->agencies();

        $this->assertEquals('success', $response['status']);
    }

    public function testAgenciesProductsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->remitaPayments->products('dsfsdf');

        $this->assertEquals('success', $response['status']);
    }

    public function testAgenciesProductAmountCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->remitaPayments->products('dsfsdf', 'dsfdfs');

        $this->assertEquals('success', $response['status']);
    }

    public function testOrderCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->remitaPayments->createOrder(
            'dsfsdf', 
            'dsfdfs', [
                "amount" => "3500.00",
                "reference" => "FLWTTOT1000000029",
                "customer" => [
                    "name" => "emmanuel",
                    "email" => "emmanuel@x.com",
                    "phone_number" => "08060811638"
                ],
                "fields" => [
                    [
                        "id" => "42107711:42107712",
                        "quantity" => "1",
                        "value" => "3500"
                    ],
                    [
                        "id" => "42107710",
                        "quantity" => "1",
                        "value" => "t@x.com"
                    ]
                ]
            ]
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testOrderCanBeUpdated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->remitaPayments->updateOrder(
            'ddfsdf',
            2000,
            'dsfsfsf',
        );

        $this->assertEquals('success', $response['status']);
    }
}
