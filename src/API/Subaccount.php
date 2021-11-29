<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\CreateSubaccountOptions;
use StarfolkSoftware\Flutterwave\Options\UpdateSubaccountOptions;

final class Subaccount extends ApiAbstract
{
    /**
     * Create a subaccount
     * 
     * @param array $params
     * @return array
     */
    public function create(array $params): array
    {
        $options = new CreateSubaccountOptions($params);

        $response = $this->httpClient->post('subaccounts', [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetch all subaccounts
     * 
     * @param array $params
     * @return array
     */
    public function all(array $params = []): array
    {
        $response = $this->httpClient->get('subaccounts', [
            'query' => json_encode($params),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Find a subaccount
     * 
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $response = $this->httpClient->get("subaccounts/{$id}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Udapte a subaccount
     * 
     * @param int $id
     * @param array $params
     * @return array
     */
    public function update(int $id, array $params): array
    {
        $options = new UpdateSubaccountOptions($params);

        $response = $this->httpClient->put("subaccounts/{$id}", [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Delete a subaccount
     * 
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $response = $this->httpClient->delete("subaccounts/{$id}");

        return ResponseMediator::getContent($response);
    }
}