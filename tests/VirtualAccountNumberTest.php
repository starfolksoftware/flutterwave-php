<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;

final class VirtualAccountNumberTest extends TestCase
{
    public function testVirtualAccountNumberCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualAccountNumbers->create([
            "email" => "johnmadakin@allstar.com",
            "amount" => 50000,
            "tx_ref" => "jhn-mdkn-10192029920"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testBulkVirtualAccountNumberCanBeCreated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualAccountNumbers->createBulk([
            "accounts" => 5,
            "email" => "sam@son.com",
            "is_permanent" => true,
            "tx_ref" => "jhn-mndkn-012439283422"
        ]);

        $this->assertEquals('success', $response['status']);
    }

    public function testBulkVirtualAccountNumbersCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualAccountNumbers->fetchBulk(
            'dfsdfsd'
        );

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualAccountNumberCanBeFound(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualAccountNumbers->find('dfsfd');

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualAccountNumberBvnCanBeUpdated(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualAccountNumbers->updateBvn('dfsfd', 'sdfsf');

        $this->assertEquals('success', $response['status']);
    }

    public function testVirtualAccountNumberCanBeDeleted(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $response = $this->client()->virtualAccountNumbers->delete('23ere23');

        $this->assertEquals('success', $response['status']);
    }
}
