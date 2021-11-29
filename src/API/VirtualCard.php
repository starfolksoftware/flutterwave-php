<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\CreateVirtualCardOptions;
use StarfolkSoftware\Flutterwave\Options\UpdateVirtualCardOptions;

final class VirtualCard extends ApiAbstract
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
        $options = new CreateVirtualCardOptions($params);

        $response = $this->httpClient->post('/virtual-cards', [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Retrieves all plans
     * 
     * @param int $page
     * @return array
     */
    public function all($page = 1): array
    {
        $response = $this->httpClient->get('/virtual-cards', [
            'query' => json_encode([
                'page' => $page,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Retrieves a plan
     * 
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $response = $this->httpClient->get("/virtual-cards/{$id}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Fund a virtual card
     * 
     * @param int $id
     * @param int $amount
     * @param string $debitCurrency
     * @return array
     */
    public function fund(int $id, int $amount, string $debitCurrency = null): array
    {
        $response = $this->httpClient->post("/virtual-cards/{$id}/fund", [
            'json' => json_encode([
                'amount' => $amount,
                'debit_currency' => $debitCurrency,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Terminate a virtual card
     * 
     * @param int $id
     * @return array
     */
    public function terminate(int $id): array
    {
        $response = $this->httpClient->put("/virtual-cards/{$id}/terminate");

        return ResponseMediator::getContent($response);
    }

    /**
     * Get virtual card transactions
     * 
     * @param int $id
     * @param string $from
     * @param string $to
     * @param int $index
     * @param int $size
     * @return array
     */
    public function transactions(int $id, string $from, string $to, int $index, int $size): array
    {
        $response = $this->httpClient->post("/virtual-cards/{$id}/cancel", [
            'json' => json_encode([
                'from' => $from,
                'to' => $to,
                'index' => $index,
                'size' => $size,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Withdraw funds from a virtual card
     * 
     * @param int $id
     * @param int $amount
     * @return array
     */
    public function withdraw(int $id, int $amount): array
    {
        $response = $this->httpClient->post("/virtual-cards/{$id}/withdraw", [
            'json' => json_encode([
                'amount' => $amount,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Block a virtual card
     * 
     * @param int $id
     * @return array
     */
    public function block(int $id): array
    {
        $response = $this->httpClient->put("/virtual-cards/{$id}/status/block");

        return ResponseMediator::getContent($response);
    }

    /**
     * Unblock a virtual card
     * 
     * @param int $id
     * @return array
     */
    public function unblock(int $id): array
    {
        $response = $this->httpClient->put("/virtual-cards/{$id}/status/unblock");

        return ResponseMediator::getContent($response);
    }
}
