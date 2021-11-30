<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class ChargebackTest extends TestCase
{
    public function testChargebacksCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->chargebacks->all();

        $this->assertEquals('success', $response['status']);
    }

    public function testChargebackCanBeAccepted(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->chargebacks->accept('dsfsd');

        $this->assertEquals('success', $response['status']);
    }

    public function testChargebackCanBeDeclined(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->chargebacks->decline('dsfsd');

        $this->assertEquals('success', $response['status']);
    }

    public function testChargebackCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->chargebacks->find('dsfsd');

        $this->assertEquals('success', $response['status']);
    }
}