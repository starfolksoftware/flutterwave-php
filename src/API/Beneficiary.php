<?php

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\CreateBeneficiaryOptions;

final class Beneficiary extends ApiAbstract
{
    /**
     * Creates a new beneficiary
     * 
     * @param array $params
     * 
     * @return array
     */
    public function create(array $params): array
    {
        $options = new CreateBeneficiaryOptions($params);

        $response = $this->httpClient->post('/beneficiaries', [
            'json' => $options->all(),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Retrieves all beneficiaries
     * 
     * @param int $page
     * @return array
     */
    public function all(int $page = 1): array
    {
        $response = $this->httpClient->get('/beneficiaries', [
            'query' => [
                'page' => $page,
            ],
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Retrieves a beneficiary
     * 
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $response = $this->httpClient->get("/beneficiaries/{$id}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Deletes a beneficiary
     * 
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $response = $this->httpClient->delete("/beneficiaries/{$id}");

        return ResponseMediator::getContent($response);
    }
}
