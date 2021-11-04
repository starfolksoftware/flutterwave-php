<?php

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\TransactionFeeOptions;
use StarfolkSoftware\Flutterwave\Options\TransactionQueryParams;

final class Transaction extends ApiAbstract
{
    /**
     * Get all transactions
     * 
     * @param TransactionQueryParams $params
     * 
     * @return array
     */
    public function all(TransactionQueryParams $params): array
    {
        $response = $this->httpClient->get('/transactions', [
            'query' => $params->all(),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Get fee of a transaction about to happen.
     * 
     * @param TransactionFeeOptions $options
     * 
     * @return array
     */
    public function fee(TransactionFeeOptions $options): array
    {
        $response = $this->httpClient->get('/transactions/fee', [
            'query' => $options->all()
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Resend webhook of a failed transaction
     * 
     * @param int $id
     * 
     * @return array
     */
    public function webhook(int $id, int $wait = 1): array
    {
        $response = $this->httpClient->post("/transactions/{$id}/resend-webhook", [
            'query' => [
                'wait' => $wait
            ]
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Verify a transaction
     * 
     * @param int $id
     * 
     * @return array
     */
    public function verify(int $id): array
    {
        $response = $this->httpClient->get("transactions/{$id}/verify");

        return ResponseMediator::getContent($response);
    }

    /**
     * Get the transaction timeline
     * 
     * @param int $id
     * 
     * @return array
     */
    public function timeline(int $id): array
    {
        $response = $this->httpClient->get("transactions/{$id}/events");

        return ResponseMediator::getContent($response);
    }
}
