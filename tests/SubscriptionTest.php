<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class SubscriptionTest extends TestCase
{
    public function testSubscriptionsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $subscription = $this->client()->subscriptions->all([]);

        $this->assertEquals('success', $subscription['status']);
    }

    public function testSubscriptionCanBeCancelled(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $subscription = $this->client()->subscriptions->cancel(1);

        $this->assertEquals('success', $subscription['status']);
    }

    public function testSubscriptionCanBeActivated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $subscription = $this->client()->subscriptions->activate(1);

        $this->assertEquals('success', $subscription['status']);
    }
}