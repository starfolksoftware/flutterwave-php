<?php

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\ChargeWithTokenOptions;

final class Preauthorization extends ApiAbstract
{
    /**
     * Initiate a preauthorized charge
     * 
     * @param array $params
     * @return array
     */
    public function initiate(array $params): array
    {
        return (new Charge($this->client))->withToken(array_merge(
            $params, [
                'preauthorize' => true
            ]
        ));
    }

    /**
     * Initiate a preauthorized charge in bulk
     * 
     * @param array $params
     * @return array
     */
    public function initiateInBulk(array $params): array
    {
        foreach ($params['bulk_data'] as $key => $data) {
            new ChargeWithTokenOptions($data);

            $params['bulk_data'][$key] = array_merge($data, [
                'preauthorize' => true
            ]);
        }

        return (new Charge($this->client))->withTokenInBulk($params);
    }

    /**
     * Capture or collect the preauthorized 
     * funds from the customer
     * 
     * @param string $flwRef
     * @param string $amount
     * @return array
     */
    public function capture(string $flwRef, string $amount): array
    {
        $response = $this->httpClient->post("/charges/{$flwRef}/capture", [
            'json' => [
                'amount' => $amount,
            ]
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Release the hold on the funds
     * 
     * @param string $flwRef
     * @return array
     */
    public function void(string $flwRef): array
    {
        $response = $this->httpClient->post("/charges/{$flwRef}/void");

        return ResponseMediator::getContent($response);
    }

    /**
     * Refund a captured amount
     * 
     * @param string $flwRef
     * @param string $amount
     * @return array
     */
    public function refund(string $flwRef, string $amount): array
    {
        $response = $this->httpClient->post("/charges/{$flwRef}/refund", [
            'json' => [
                'amount' => $amount,
            ]
        ]);

        return ResponseMediator::getContent($response);
    }
}
