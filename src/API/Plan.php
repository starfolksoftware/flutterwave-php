<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\Client;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\CreatePlanOptions;
use StarfolkSoftware\Flutterwave\Options\UpdatePlanOptions;

final class Plan extends ApiAbstract
{
    /**
     * Creates a new plan
     * 
     * @param array $params
     * 
     * @return array
     */
    public function create(array $params): array
    {
        $options = new CreatePlanOptions($params);

        $response = $this->httpClient->post('/payment-plans', [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Retrieves all plans
     * 
     * @return array
     */
    public function all(): array
    {
        $response = $this->httpClient->get('/payment-plans');

        return ResponseMediator::getContent($response);
    }

    /**
     * Retrieves a plan
     * 
     * @param int $id
     * 
     * @return array
     */
    public function find(int $id): array
    {
        $response = $this->httpClient->get("/payment-plans/{$id}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Updates a plan
     * 
     * @param int $id
     * @param array $params
     * 
     * @return array
     */
    public function update(int $id, array $params): array
    {
        $options = new UpdatePlanOptions($params);

        $response = $this->httpClient->put("/payment-plans/{$id}", [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Cancel a plan
     * 
     * @param int $id
     * 
     * @return array
     */
    public function cancel(int $id): array
    {
        $response = $this->httpClient->post("/payment-plans/{$id}/cancel");

        return ResponseMediator::getContent($response);
    }
}
