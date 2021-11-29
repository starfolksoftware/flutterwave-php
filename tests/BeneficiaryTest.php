<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class BeneficiaryTest extends TestCase
{
    public function testBeneficiaryCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->beneficiaries->create([
            "account_bank" => "044",
            "account_number" => "0690000034",
            "beneficiary_name" => "Ade Bond",
            "currency" => "NGN",
            "bank_name" => "ACCESS BANK NIGERIA"
        ]);

        $this->assertEquals('success', $plan['status']);
    }

    public function testBeneficiariesCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->beneficiaries->all();

        $this->assertEquals('success', $plan['status']);
    }

    public function testBeneficiaryCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->beneficiaries->find(1);

        $this->assertEquals('success', $plan['status']);
    }

    public function testBeneficiaryCanBeDeleted(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->beneficiaries->delete(1);

        $this->assertEquals('success', $plan['status']);
    }
}
