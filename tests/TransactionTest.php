<?php

namespace StarfolkSoftware\Flutterwave\Tests;

use Laminas\Diactoros\Response\JsonResponse;
use StarfolkSoftware\Flutterwave\Options\TransactionQueryParams;

final class TransactionTest extends TestCase
{
    public function testTransactionsCanBeRetrieved(): void
    {
        $this->mockClient->addResponse((new JsonResponse([
            "status" => "success",
        ]))->withStatus(200));

        $plan = $this->client()->transaction()->all(
            params: new TransactionQueryParams([])
        );

        $this->assertEquals('success', $plan['status']);
    }
}
