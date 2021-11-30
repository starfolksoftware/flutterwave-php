<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class SettlementTest extends TestCase
{
    public function testSettlementsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->settlements->all();

        $this->assertEquals('success', $plan['status']);
    }

    public function testSettlementCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->settlements->find(1);

        $this->assertEquals('success', $plan['status']);
    }
}