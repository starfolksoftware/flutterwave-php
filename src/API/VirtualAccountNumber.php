<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\CreateBulkVirtualAccountNumberOptions;
use StarfolkSoftware\Flutterwave\Options\CreateVirtualAccountNumberOptions;

final class VirtualAccountNumber extends ApiAbstract
{
    /**
     * Creates a new virtual account number
     * 
     * @param array $params
     * @return array
     */
    public function create(array $params): array
    {
        $options = new CreateVirtualAccountNumberOptions($params);

        $response = $this->httpClient->post('/virtual-account-numbers', [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Creates virtual account numbers in bulk
     * 
     * @param array $params
     * @return array
     */
    public function createBulk(array $params): array
    {
        $options = new CreateBulkVirtualAccountNumberOptions($params);

        $response = $this->httpClient->post('/bulk-virtual-account-numbers', [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetches bulk virtual account numbers using batch id
     * 
     * @param string $batchId
     * @param int $includeTxRef
     * @return array
     */
    public function fetchBulk(string $batchId, int $includeTxRef = 1): array
    {
        $response = $this->httpClient->get("/bulk-virtual-account-numbers/{$batchId}", [
            'query' => json_encode([
                'include_tx_ref' => $includeTxRef,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Retrieves a virtual account number
     * 
     * @param string $orderRef
     * @param int $includeTxRef
     * @return array
     */
    public function find(string $orderRef, int $includeTxRef = 1): array
    {
        $response = $this->httpClient->get("/virtual-account-numbers/{$orderRef}", [
            'query' => json_encode([
                'include_tx_ref' => $includeTxRef,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Updates bvn of a virtual account number
     * 
     * @param string $orderRef
     * @param string $bvn
     * @return array
     */
    public function updateBvn(string $orderRef, string $bvn): array
    {
        $response = $this->httpClient->put("/virtual-account-numbers/{$orderRef}", [
            'json' => json_encode([
                'bvn' => $bvn,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Deletes a virtual account number
     * 
     * @param string $orderRef
     * @return array
     */
    public function delete(string $orderRef): array
    {
        $response = $this->httpClient->delete("/virtual-account-numbers/{$orderRef}");

        return ResponseMediator::getContent($response);
    }
}
