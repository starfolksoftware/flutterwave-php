<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\BillCategoriesQueryParams;
use StarfolkSoftware\Flutterwave\Options\CreateBillOptions;

final class Bill extends ApiAbstract
{
    /**
     * Fetches bill categories
     * 
     * @param array $params
     * @return array
     */
    public function categories(array $params = []): array
    {
        $options = new BillCategoriesQueryParams($params);

        $response = $this->httpClient->get('bill-categories', [
            'query' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Validates service
     * 
     * @param string $itemCode
     * @param string $code
     * @param string $customer
     * @return array
     */
    public function validate(string $itemCode, string $code, string $customer): array
    {
        $response = $this->httpClient->get("bill-items/{$itemCode}/validate", [
            'query' => json_encode([
                'code' => $code,
                'customer' => $customer,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Creates a bill payment
     * 
     * @param array $params
     * @return array
     */
    public function create(array $params): array
    {
        $options = new CreateBillOptions($params);

        $response = $this->httpClient->post("bills", [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Create a bulk bill payment
     * 
     * @param string $bulkReference
     * @param string $callbackUrl
     * @param array $bulkData
     */
    public function bulkCreate(string $bulkReference, string $callbackUrl, array $bulkData): array
    {
        foreach ($bulkData as $params) {
            new CreateBillOptions($params);
        }

        $response = $this->httpClient->post("bulk-bills", [
            'json' => json_encode([
                'bulk_reference' => $bulkReference,
                'callback_url' => $callbackUrl,
                'bulk_data' => $bulkData,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Gets status of a bill payment
     * 
     * @param string $reference
     * @param int $verbose
     * @return array
     */
    public function status(string $reference, int $verbose = 1): array
    {
        $response = $this->httpClient->get("bills/{$reference}", [
            'query' => json_encode([
                'verbose' => $verbose,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Gets all payments
     * 
     * @param string $from
     * @param string $to
     * @param int $page
     * @param string $reference
     * @return array
     */
    public function payments(string $from, string $to, int $page = 20, string $reference = ''): array
    {
        $response = $this->httpClient->get("bills", [
            'query' => json_encode([
                'from' => $from,
                'to' => $to,
                'page' => $page,
                'reference' => $reference
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }
}
