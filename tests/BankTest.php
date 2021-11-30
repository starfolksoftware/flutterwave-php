<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class BankTest extends TestCase
{
    public function testBanksCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->banks->all('NG');

        $this->assertEquals('success', $response['status']);
    }

    public function testBankBranchesCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->banks->branches(1);

        $this->assertEquals('success', $response['status']);
    }
}