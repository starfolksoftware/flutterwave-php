<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;
use StarfolkSoftware\Flutterwave\Options\CreatePlanOptions;
use StarfolkSoftware\Flutterwave\Options\UpdatePlanOptions;

final class PlanTest extends TestCase
{
    public function testPlanCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->plan()->create(new CreatePlanOptions([
            'name' => 'Test Plan',
            'amount' => 100,
            'interval' => 'monthly'
        ]));

        $this->assertEquals('success', $plan['status']);
    }

    public function testPlansCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->plan()->all();

        $this->assertEquals('success', $plan['status']);
    }

    public function testPlanCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->plan()->find(1);

        $this->assertEquals('success', $plan['status']);
    }

    public function testPlanCanBeUpdated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->plan()->update(1, new UpdatePlanOptions([
            'name' => 'plan 1',
            'status' => 'cancelled',
        ]));

        $this->assertEquals('success', $plan['status']);
    }

    public function testPlanCanBeCancelled(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->plan()->cancel(1);

        $this->assertEquals('success', $plan['status']);
    }
}
