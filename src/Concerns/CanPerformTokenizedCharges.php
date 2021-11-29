<?php

namespace StarfolkSoftware\Flutterwave\Concerns;

use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\ChargeWithTokenInBulkOptions;
use StarfolkSoftware\Flutterwave\Options\ChargeWithTokenOptions;
use StarfolkSoftware\Flutterwave\Options\RetryStrategyOptions;
use StarfolkSoftware\Flutterwave\Options\UpdateCustomerTokenOptions;

trait CanPerformTokenizedCharges
{
    /**
     * Charge with token
     * 
     * @param array $params
     * 
     * @return array
     */
    public function withToken(array $params): array
    {
        $options = new ChargeWithTokenOptions($params);

        $response = $this->httpClient->post('/tokenized-charges', [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Update token details
     * 
     * @param string $token
     * @param array $params
     * 
     * @return array
     */
    public function updateCustomerToken(string $token, array $params): array
    {
        $options = new UpdateCustomerTokenOptions($params);

        $response = $this->httpClient->put("/tokens/{$token}", [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Charge with token in bulk
     * 
     * @param array $params
     * @return array
     */
    public function withTokenInBulk(array $params): array
    {
        $options = new ChargeWithTokenInBulkOptions($params);

        new RetryStrategyOptions($params['retry_strategy']);

        foreach ($params['bulk_data'] as $data) {
            new ChargeWithTokenOptions($data);
        }

        $response = $this->httpClient->post('/bulk-tokenized-charges', [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Get bulk tokenized charges responses
     * 
     * @param int $bulkId
     * @return array
     */
    public function getBulkTokenizedChargesResponses(int $bulkId): array
    {
        $response = $this->httpClient->get("/bulk-tokenized-charges/{$bulkId}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Get bulk tokenized charges transactions
     * 
     * @param int $bulkId
     * @return array
     */
    public function getBulkTokenizedChargesTransactions(int $bulkId): array
    {
        $response = $this->httpClient->get("/bulk-tokenized-charges/{$bulkId}/transactions");

        return ResponseMediator::getContent($response);
    }
}
