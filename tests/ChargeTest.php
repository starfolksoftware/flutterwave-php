<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;
use StarfolkSoftware\Flutterwave\Options\ChargeWithTokenOptions;
use StarfolkSoftware\Flutterwave\Options\UpdateCustomerTokenOptions;

final class ChargeTest extends TestCase
{
    public function testCanPerformTokenizedCharges(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->charge()->withToken(
            new ChargeWithTokenOptions([
                'token' => 'abc',
                'email' => 'contact@starfolksoftware.com',
                'currency' => 'NGN',
                'country' => 'NG',
                'amount' => 100,
                'tx_ref' => '12345',
            ])
        );

        $this->assertEquals('success', $plan['status']);
    }

    public function testCanUpdateCustomerToken(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->charge()->updateCustomerToken(
            token: 124343,
            options: new UpdateCustomerTokenOptions([
                'email' => 'contact@starfolksoftware.com',
                'first_name' => 'Faruk',
                'last_name' => 'Nasir',
                'phone_number' => '09022334433'
            ])
        );

        $this->assertEquals('success', $plan['status']);
    }
}