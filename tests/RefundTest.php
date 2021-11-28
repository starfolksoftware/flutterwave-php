<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class RefundTest extends TestCase
{
    public function testRefundsCanBeInitiated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->refunds->initiate(1, []);

        $this->assertEquals('success', $response['status']);
    }

    public function testRefundCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "id" => 469462,
        ]))->withStatus(200));

        $refund = $this->client()->refunds->find(469462);

        $this->assertEquals(469462, $refund['id']);
    }

    public function testRefundsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->refunds->all([]);

        $this->assertEquals("success", $response['status']);
    }
}
