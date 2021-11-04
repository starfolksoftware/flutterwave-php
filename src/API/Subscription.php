<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\SubscriptionQueryParams;

final class Subscription extends ApiAbstract
{
    /**
     * Retrieves all plans
     * 
     * @param SubscriptionQueryParams $queryParams
     * 
     * @return array
     */
    public function all(SubscriptionQueryParams $queryParams): array
    {
        $response = $this->httpClient->get('/subscriptions', [
            'query' => $queryParams->all()
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Cancel a subscription
     * 
     * @param int $id
     * 
     * @return array
     */
    public function cancel(int $id): array
    {
        $response = $this->httpClient->post("/subscriptions/{$id}/cancel");

        return ResponseMediator::getContent($response);
    }

    /**
     * Activate a subscription
     * 
     * @param int $id
     * 
     * @return array
     */
    public function activate(int $id): array
    {
        $response = $this->httpClient->post("/subscriptions/{$id}/activate");

        return ResponseMediator::getContent($response);
    }
}
