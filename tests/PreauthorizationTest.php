<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class PreauthorizationTest extends TestCase
{
    public function testPreauthorizationCanBeInitiated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->preauthorizations->initiate([
            'token' => 'abc',
            'email' => 'contact@starfolksoftware.com',
            'currency' => 'NGN',
            'country' => 'NG',
            'amount' => 100,
            'tx_ref' => '12345',
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testPreauthorizationCanBeInitiatedInBulk(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "id" => 469462,
        ]))->withStatus(200));

        $refund = $this->client()->preauthorizations->initiateInBulk([
            "title" => "Monthly payment to vendors",
            "retry_strategy" => [
                "retry_interval" => 120,
                "retry_amount_variable" => 60,
                "retry_attempt_variable" => 2
            ],
            "bulk_data" => [
                [
                    'token' => 'abc',
                    'email' => 'contact@starfolksoftware.com',
                    'currency' => 'NGN',
                    'country' => 'NG',
                    'amount' => 100,
                    'tx_ref' => '12345',
                ],
                [
                    'token' => 'adsdbc',
                    'email' => 'contact@starfolksoftware.com',
                    'currency' => 'NGN',
                    'country' => 'NG',
                    'amount' => 1000,
                    'tx_ref' => '123dds45',
                ],
            ]
        ]);

        $this->assertEquals(469462, $refund['id']);
    }

    public function testPreauthorizationCanBeCaptured(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->preauthorizations->capture(
            '12345',
            '100'
        );

        $this->assertEquals("success", $response['status']);
    }

    public function testPreauthorizationCanBeVoided(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->preauthorizations->void(
            '12345',
        );

        $this->assertEquals("success", $response['status']);
    }

    public function testPreauthorizationCanBeRefunded(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->preauthorizations->capture(
            '12345',
            '100'
        );

        $this->assertEquals("success", $response['status']);
    }
}
