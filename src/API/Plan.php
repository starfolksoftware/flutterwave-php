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
     * Subscription constructor.
     * 
     * @param Client $client
     * 
     * @return void
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    /**
     * Creates a new plan
     * 
     * @param CreatePlanOptions $options
     * 
     * @return array
     */
    public function create(CreatePlanOptions $options): array
    {
        $response = $this->httpClient->post('/payment-plans', [
            'json' => $options->all(),
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
     * @param UpdatePlanOptions $options
     * 
     * @return array
     */
    public function update(int $id, UpdatePlanOptions $options): array
    {
        $response = $this->httpClient->put("/payment-plans/{$id}", [
            'json' => $options->all(),
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
