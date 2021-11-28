<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class ChargeTest extends TestCase
{
    public function testCanPerformTokenizedCharges(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $charge = $this->client()->charges->withToken([
            'token' => 'abc',
            'email' => 'contact@starfolksoftware.com',
            'currency' => 'NGN',
            'country' => 'NG',
            'amount' => 100,
            'tx_ref' => '12345',
        ]);

        $this->assertEquals('success', $charge['status']);
    }

    public function testCanUpdateCustomerToken(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $charge = $this->client()->charges->updateCustomerToken(
            124343, [
                'email' => 'contact@starfolksoftware.com',
                'first_name' => 'Faruk',
                'last_name' => 'Nasir',
                'phone_number' => '09022334433'
            ]
        );

        $this->assertEquals('success', $charge['status']);
    }
}