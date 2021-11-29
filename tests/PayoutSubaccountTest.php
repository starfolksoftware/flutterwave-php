<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class PayoutSubaccountTest extends TestCase
{
    public function testPayoutSubaccountCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->payoutSubaccounts->create([
            "account_name" => "John Doe",
            "email" => "johndoe@example.com",
            "mobilenumber" => "010101010",
            "country" => "US"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testPayoutSubaccountsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->payoutSubaccounts->all([]);

        $this->assertEquals('success', $response['status']);
    }

    public function testPayoutSubaccountCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->payoutSubaccounts->find(
            'dadfsdfs',
            1
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testPayoutSubaccountCanBeUpdated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->payoutSubaccounts->update('dsdfsdf', [
            "account_name" => "PSA2B22C3E304161004789882",
            "email" => "johndoe@example.com",
            "mobilenumber" => "010101010",
            "country" => "NG"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testPayoutSubaccountTransactionsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->payoutSubaccounts->transactions(
            'dsfdsf',
            'from',
            'to',
            'ngn'
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testPayoutSubaccountAvailableBalanceCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->payoutSubaccounts->availableBalance(
            'dsfdsf',
            'ngn'
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testPayoutSubaccountStaticAccountsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->payoutSubaccounts->availableBalance(
            'dsfdsf',
            'ngn'
        );

        $this->assertEquals('success', $response['status']);
    }
}
