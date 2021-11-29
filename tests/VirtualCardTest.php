<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class VirtualCardTest extends TestCase
{
    public function testVirtualCardCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualCards->create([
            "currency" => "USD",
            "amount" => 5000,
            "billing_name" => "Jermaine Graham",
            "billing_address" => "333 fremont road",
            "billing_city" => "San Francisco",
            "billing_state" => "CA",
            "billing_postal_code" => "984105",
            "billing_country" => "US",
            "callback_url" => "https://your-callback-url.com/"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualCardsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualCards->all();

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualCardCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualCards->find(1);

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualCardCanBeFunded(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualCards->fund(1, 1000);

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualCardCanBeTerminated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualCards->terminate(1);

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualCardTransactionsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualCards->transactions(
            323,
            'from',
            'to',
            1,
            15
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualCardFundsCanBeWithdrawn(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualCards->withdraw(
            1,
            2000
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualCardCanBeBlocked(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualCards->block(1);

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualCardCanBeUnblocked(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualCards->unblock(1);

        $this->assertEquals('success', $response['status']);
    }
}
