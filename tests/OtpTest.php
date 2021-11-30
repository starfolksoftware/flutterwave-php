<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class OtpTest extends TestCase
{
    public function testOtpsCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->otps->create([
            "length" => 7,
            "customer" => [ "name" => "Kazan", "email" => "kazan@mailinator.com", "phone" => "2348131149273" ],
            "sender" => "log t",
            "send" => true,
            "medium" => ["email", "whatsapp"],
            "expiry" => 5
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testOtpsCanBeValidated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->otps->validate('dsdfsdf', 'ddfsdf');

        $this->assertEquals('success', $response['status']);
    }
}