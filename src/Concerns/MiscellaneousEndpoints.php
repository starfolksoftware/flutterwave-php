<?php

namespace StarfolkSoftware\Flutterwave\Concerns;

use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;

trait MiscellaneousEndpoints
{
    /**
     * Retrieve balances
     * 
     * @param string $currency
     * @return array
     */
    public function balances(string $currency = ''): array
    {
        $url = $currency ? "balances/{$currency}" : "balances";

        $response = $this->getHttpClient()->get($url);

        return ResponseMediator::getContent($response);
    }

    /**
     * Resolves account details
     * 
     * @param string $accountNumber
     * @param string $accountBank
     * @return array
     */
    public function resolveAccount(string $accountNumber, string $accountBank): array
    {
        $response = $this->getHttpClient()->post("accounts/resolve", [
            'json' => json_encode([
                'account_number' => $accountNumber,
                'account_bank' => $accountBank,
            ])
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Resolves bvn details
     * 
     * @param string $bvn
     * @return array
     */
    public function resolveBvn(string $bvn): array
    {
        $response = $this->getHttpClient()->get("kyc/bvns/{$bvn}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Resolves card bins
     * 
     * @param int $bin
     * @return array
     */
    public function resolveCardBin(int $bin): array
    {
        $response = $this->getHttpClient()->get("card-bins/{$bin}");

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetch FX rates
     * 
     * @param string $from
     * @param string $to
     * @param int $amount
     * @return array
     */
    public function fxRates(string $from, string $to, int $amount): array
    {
        $response = $this->getHttpClient()->get("rates", [
            'query' => json_encode([
                'from' => $from,
                'to' => $to,
                'amount' => $amount
            ])
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Fetches wallet statement
     * 
     * @param string $from
     * @param string $to
     * @param string $currency
     * @param string $type
     * @param int $page
     * @return array
     */
    public function balanceHistory(string $from, string $to, string $currency, string $type = 'C', int $page = 1): array
    {
        $response = $this->getHttpClient()->get("wallet/statement", [
            'query' => json_encode([
                'from' => $from,
                'to' => $to,
                'currency' => $currency,
                'type' => $type,
                'page' => $page
            ])
        ]);

        return ResponseMediator::getContent($response);
    }
}
