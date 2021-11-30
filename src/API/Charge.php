<?php

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\Concerns\CanPerformTokenizedCharges;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\AllowedChargeTypesOptions;

final class Charge extends ApiAbstract
{
    use CanPerformTokenizedCharges;

    /**
     * Handle charges.
     * 
     * @param string $type
     * @param array $params
     * @return array
     */
    protected function handle(string $type, array $params): array
    {
        new AllowedChargeTypesOptions(['type' => $type]);

        $ccType = $this->snakeToCamelCase($type, true);
        $optionsClass = "\\StarfolkSoftware\\Flutterwave\\Options\\Charge{$ccType}Options";

        $options = new $optionsClass($params);

        $response = $this->httpClient->post('/charges', [
            'json' => json_encode($options->all()),
            'query' => json_encode([
                'type' => $type
            ])
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Validates a pending transaction
     * 
     * @param string $otp
     * @param string $flwRef
     * @param string $type
     * @return array
     */
    public function validate(string $otp, string $flwRef, string $type = 'card'): array
    {
        $response = $this->httpClient->post('validate-charge', [
            'json' => json_encode([
                'otp' => $otp,
                'flw_ref' => $flwRef,
                'type' => $type
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Snake to camel case
     * 
     * @param string $str
     * @param bool $capitaliseFirstChar
     * @return string
     */
    private function snakeToCamelCase($str, $capitaliseFirstChar = false): string
    {
        if ($capitaliseFirstChar) {
            $str[0] = strtoupper($str[0]);
        }

        $func = function($c) {
            return strtoupper($c[1]);
        };

		return preg_replace_callback('/_([a-z])/', $func, $str);
    }

    /**
     * Camel to snake case
     * 
     * @param string $str
     * @return string
     */
    private function camelToSnakeCase($str): string
    {
        $str[0] = strtolower($str[0]);

        $func = function ($c) {
            return "_" . strtolower($c[1]);
        };

		return preg_replace_callback('/([A-Z])/', $func, $str);
    }

    /**
     * Call inaccessible (protected or private) 
     * or non-existing methods.
     * 
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        $type = $this->camelToSnakeCase(str_replace("via", "", $name));

        return $this->handle($type, $arguments[0]);
    }
}
