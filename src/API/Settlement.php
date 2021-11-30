<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;

final class Settlement extends ApiAbstract
{
    /**
     * Retrieves all settlements.
     *
     * @param int $page
     * @param string $from
     * @param string $to
     * @param string $subaccountId
     * @return array
     */
    public function all(int $page = 1, string $from = '', string $to = '', string $subaccountId = ''): array
    {
        $response = $this->httpClient->get("settlements", [
            'query' => json_encode([
                'page' => $page,
                'from' => $from,
                'to' => $to,
                'subaccount_id' => $subaccountId,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Finds a settlement.
     * 
     * @param int $id
     * @param int $page
     * @return array
     */
    public function find(int $id, int $page = 1): array
    {
        $response = $this->httpClient->get("settlements/{$id}", [
            'query' => json_encode([
                'page' => $page,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }
}