<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class PlanTest extends TestCase
{
    public function testPlanCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->plans->create([
            'name' => 'Test Plan',
            'amount' => 100,
            'interval' => 'monthly'
        ]);

        $this->assertEquals('success', $plan['status']);
    }

    public function testPlansCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->plans->all();

        $this->assertEquals('success', $plan['status']);
    }

    public function testPlanCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->plans->find(1);

        $this->assertEquals('success', $plan['status']);
    }

    public function testPlanCanBeUpdated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->plans->update(1, [
            'name' => 'plan 1',
            'status' => 'cancelled',
        ]);

        $this->assertEquals('success', $plan['status']);
    }

    public function testPlanCanBeCancelled(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->plans->cancel(1);

        $this->assertEquals('success', $plan['status']);
    }
}
