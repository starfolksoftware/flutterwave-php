<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;
use StarfolkSoftware\Flutterwave\Options\SubscriptionQueryParams;

final class SubscriptionTest extends TestCase
{
    public function testSubscriptionsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->subscription()->all(
            new SubscriptionQueryParams([])
        );

        $this->assertEquals('success', $plan['status']);
    }

    public function testSubscriptionCanBeCancelled(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->subscription()->cancel(1);

        $this->assertEquals('success', $plan['status']);
    }

    public function testSubscriptionCanBeActivated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->subscription()->activate(1);

        $this->assertEquals('success', $plan['status']);
    }
}