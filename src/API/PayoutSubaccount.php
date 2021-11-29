<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\CreatePayoutSubaccountOptions;
use StarfolkSoftware\Flutterwave\Options\UpdatePayoutSubaccountOptions;

final class PayoutSubaccount extends ApiAbstract
{
    /**
     * Create a subaccount
     * 
     * @param array $params
     * @return array
     */
    public function create(array $params): array
    {
        $options = new CreatePayoutSubaccountOptions($params);

        $response = $this->httpClient->post('payout-subaccounts', [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetch all subaccounts
     * 
     * @param array $params
     * @return array
     */
    public function all(array $params = []): array
    {
        $response = $this->httpClient->get('payout-subaccounts', [
            'query' => json_encode($params),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Find a subaccount
     * 
     * @param string $accountReference
     * @param int $includeLimits
     * @return array
     */
    public function find(string $accountReference, int $includeLimits = 1): array
    {
        $response = $this->httpClient->get("payout-subaccounts/{$accountReference}", [
            'query' => json_encode([
                'include_limits' => $includeLimits,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Udapte a subaccount
     * 
     * @param string $accountReference
     * @param array $params
     * @return array
     */
    public function update(string $accountReference, array $params): array
    {
        $options = new UpdatePayoutSubaccountOptions($params);

        $response = $this->httpClient->put("subaccounts/{$accountReference}", [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetch transactions
     * 
     * @param string $accountReference
     * @param string $from
     * @param string $to
     * @param string $currency
     * @return array
     */
    public function transactions(string $accountReference, string $from, string $to, string $currency): array
    {
        $response = $this->httpClient->get("payout-subaccounts/{$accountReference}/transactions", [
            'query' => json_encode([
                'from' => $from,
                'to' => $to,
                'currency' => $currency,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetch available balance
     * 
     * @param string $accountReference
     * @param string $currency
     * @return array
     */
    public function availableBalance(string $accountReference, string $currency): array
    {
        $response = $this->httpClient->get("payout-subaccounts/{$accountReference}/balances", [
            'query' => json_encode([
                'currency' => $currency,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetch virtual static accounts
     * 
     * @param string $accountReference
     * @param string $currency
     * @return array
     */
    public function staticAccounts(string $accountReference, string $currency): array
    {
        $response = $this->httpClient->get("payout-subaccounts/{$accountReference}/static-account", [
            'query' => json_encode([
                'currency' => $currency,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }
}