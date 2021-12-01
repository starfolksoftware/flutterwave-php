<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\CreateRemitaPaymentOrderOptions;

final class RemitaPayment extends ApiAbstract
{
    /**
     * Retrieves agencies.
     * 
     * @return array
     */
    public function agencies(): array
    {
        $response = $this->httpClient->get('/billers');

        return ResponseMediator::getContent($response);
    }

    /**
     * Retrieves products under an agency.
     * 
     * @param string $billerCode
     * @return array
     */
    public function products(string $billerCode): array
    {
        $response = $this->httpClient->get("billers/{$billerCode}/products");

        return ResponseMediator::getContent($response);
    }

    /**
     * Retrieves amount to be paid for a product.
     * 
     * @param string $billerCode
     * @param string $productCode
     * @return array
     */
    public function productFee(string $billerCode, string $productCode): array
    {
        $response = $this->httpClient->get("billers/{$billerCode}/products/{$productCode}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Creates an order.
     * 
     * @param string $billerCode
     * @param string $productCode
     * @param array $params
     * @return array
     */
    public function createOrder(string $billerCode, string $productCode, array $params): array
    {
        $options = new CreateRemitaPaymentOrderOptions($params);

        $response = $this->httpClient->post("billers/{$billerCode}/products/{$productCode}/orders", [
            'json' => json_encode($options->all())
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Updates an order.
     * 
     * @param string $orderId
     * @param int $amount
     * @param string $reference
     * @return array
     */
    public function updateOrder(string $orderId, int $amount, string $reference): array
    {
        $response = $this->httpClient->put("product-orders/{$amount}", [
            'json' => json_encode([
                'order_id' => $orderId,
                'amount' => $amount,
                'reference' => $reference,
            ])
        ]);

        return ResponseMediator::getContent($response);
    }
}