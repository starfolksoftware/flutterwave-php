<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\ChargebackQueryParams;

final class Chargeback extends ApiAbstract
{
    /**
     * Fetches all chargebacks
     * 
     * @param array $params
     * @return array
     */
    public function all(array $params = []): array
    {
        $options = new ChargebackQueryParams($params);

        $response = $this->httpClient->get('chargebacks', [
            'query' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Accepts a chargeback
     * 
     * @param string $id
     * @return array
     */
    public function accept(string $id): array
    {
        $response = $this->httpClient->put("chargebacks/{$id}", [
            'json' => json_encode([
                'action' => 'accept',
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Declines a chargeback
     * 
     * @param string $id
     * @return array
     */
    public function decline(string $id): array
    {
        $response = $this->httpClient->put("chargebacks/{$id}", [
            'json' => json_encode([
                'action' => 'decline',
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetches a chargeback
     * 
     * @param string $flwRef
     * @return array
     */
    public function find(string $flwRef): array
    {
        $response = $this->httpClient->get("chargebacks", [
            'query' => json_encode([
                'flwRef' => $flwRef,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }
}