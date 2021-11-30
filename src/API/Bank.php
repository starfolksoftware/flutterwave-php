<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;

final class Bank extends ApiAbstract
{
    /**
     * Retrieves all banks.
     *
     * @param string $country
     * @return array
     */
    public function all(string $country = 'NG'): array
    {
        $response = $this->httpClient->get("banks/{$country}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Retrieves bank branches.
     * 
     * @param int $id
     * @return array
     */
    public function branches(int $id): array
    {
        $response = $this->httpClient->get("banks/{$id}/branches");

        return ResponseMediator::getContent($response);
    }
}