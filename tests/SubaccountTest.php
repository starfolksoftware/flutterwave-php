<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class SubaccountTest extends TestCase
{
    public function testSubaccountCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->subaccounts->create([
            "account_bank" => "044",
            "account_number" => "0690000037",
            "business_name" => "Eternal Blue",
            "business_email" => "petya@stux.net",
            "business_contact" => "Anonymous",
            "business_contact_mobile" => "090890382",
            "business_mobile" => "09087930450",
            "country" => "NG",
            "split_type" => "percentage",
            "split_value" => 0.5
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testSubaccountsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->subaccounts->all([]);

        $this->assertEquals('success', $response['status']);
    }

    public function testSubaccountCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->subaccounts->find(1);

        $this->assertEquals('success', $response['status']);
    }

    public function testSubaccountCanBeUpdated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->subaccounts->update(1, [
            "business_name" => "Mad O!",
            "business_email" => "mad@o.enterprises",
            "account_bank" => "044",
            "account_number" => "0690000040",
            "split_type" => "flat",
            "split_value" => 2000.00
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testSubaccountCanBeDeleted(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->subaccounts->delete(1);

        $this->assertEquals('success', $response['status']);
    }
}
