<?php

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\CreateTransferOptions;

final class Transfer extends ApiAbstract
{
    /**
     * Creates a transfer
     * 
     * @param array $params
     * @return array
     */
    public function create(array $params): array
    {
        $options = new CreateTransferOptions($params);

        $response = $this->httpClient->post('transfers', [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Retries a transfer
     * 
     * @param int $id
     * @return array
     */
    public function retry(int $id): array
    {
        $response = $this->httpClient->post("transfers/{$id}/retries");

        return ResponseMediator::getContent($response);
    }

    /**
     * Creates bulk transfer
     * 
     * @param array $params
     * @param string $title
     * @return array
     */
    public function bulk(array $params, string $title = ''): array
    {
        foreach ($params as $param) {
            new CreateTransferOptions($param);
        }

        $response = $this->httpClient->post("bulk-transfers", [
            'json' => json_encode([
                'title' => $title,
                'transfers' => $params,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetches a tranfer fee
     * 
     * @param int $amount
     * @param string $currency
     * @param string $type
     * @return array
     */
    public function fee(int $amount, string $currency = 'NGN', string $type = 'account'): array
    {
        $response = $this->httpClient->get("transfers/fee", [
            'query' => json_encode([
                'amount' => $amount,
                'currency' => $currency,
                'type' => $type,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetches all transfers
     * 
     * @param int $page
     * @param string $status
     * @return array
     */
    public function all(int $page = 1, string $status = 'successful'): array
    {
        $response = $this->httpClient->get("transfers", [
            'query' => json_encode([
                'page' => $page,
                'status' => $status,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Finds a transfer
     * 
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $response = $this->httpClient->get("transfers/{$id}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetches transfer retry
     * 
     * @param int $id
     * @return array
     */
    public function findRetry(int $id): array
    {
        $response = $this->httpClient->get("transfers/{$id}/retries");

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetches bulk transfer statuses
     * 
     * @param int $batchId
     * @return array
     */
    public function findBulk(int $batchId): array
    {
        $response = $this->httpClient->get("transfers", [
            'query' => json_encode([
                'batch_id' => $batchId,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetches transfer rates
     * 
     * @param int $amount
     * @param string $destinationCurrency
     * @param string $sourceCurrency
     * @return array
     */
    public function rates(int $amount, string $destinationCurrency, string $sourceCurrency): array
    {
        $response = $this->httpClient->get("transfers/rates", [
            'query' => json_encode([
                'amount' => $amount,
                'destination_currency' => $destinationCurrency,
                'source_currency' => $sourceCurrency,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }
}