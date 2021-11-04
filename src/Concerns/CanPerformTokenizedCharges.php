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
     * @param ChargeWithTokenOptions $options
     * 
     * @return array
     */
    public function withToken(ChargeWithTokenOptions $options): array
    {
        $response = $this->httpClient->post('/tokenized-charges', [
            'json' => $options->all(),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Update token details
     * 
     * @param string $token
     * @param UpdateCustomerTokenOptions $options
     * 
     * @return array
     */
    public function updateCustomerToken(string $token, UpdateCustomerTokenOptions $options): array
    {
        $response = $this->httpClient->put("/tokens/{$token}", [
            'json' => $options->all(),
        ]);

        return ResponseMediator::getContent($response);
    }
}
