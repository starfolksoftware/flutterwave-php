<?php

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\RefundOptions;
use StarfolkSoftware\Flutterwave\Options\RefundQueryParams;

final class Refund extends ApiAbstract
{
    /**
     * Refund a transaction
     * 
     * @param int $id
     * @param array $params
     * @return array
     */
    public function initiate(int $id, array $params): array
    {
        $options = new RefundOptions($params);

        $headers = count($options->all()) > 0 ? $options->all() : [];

        $response = $this->httpClient->post("/transactions/{$id}/refund", $headers);

        return ResponseMediator::getContent($response);
    }

    /**
     * Find a transaction refund
     * 
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $response = $this->httpClient->get("/refunds/{$id}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Get all refunds
     * 
     * @param array $params
     * @return array
     */
    public function all(array $params): array
    {
        $options = new RefundQueryParams($params);

        $response = $this->httpClient->get('/refunds', [
            'query' => $options->all()
        ]);

        return ResponseMediator::getContent($response);
    }
}
