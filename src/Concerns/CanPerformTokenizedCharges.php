<?php

namespace StarfolkSoftware\Flutterwave\Concerns;

use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\ChargeWithTokenOptions;
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
            'json' => $options->all(),
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
            'json' => $options->all(),
        ]);

        return ResponseMediator::getContent($response);
    }
}
