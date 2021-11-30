<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\HttpClient\Message\ResponseMediator;
use StarfolkSoftware\Flutterwave\Options\CreateOtpOptions;

final class Otp extends ApiAbstract
{
    /**
     * Creates otp for a charge.
     * 
     * @param array $params
     * @return array
     */
    public function create(array $params): array
    {
        $options = new CreateOtpOptions($params);

        $response = $this->httpClient->post('otps', [
            'json' => json_encode($options->all()),
        ]);

        return ResponseMediator::getContent($response);
    }

    /**
     * Validates an otp
     * 
     * @param string $reference
     * @param string $otp
     * @return array
     */
    public function validate(string $reference, string $otp): array
    {
        $response = $this->httpClient->post("otps/{$reference}/validate", [
            'json' => json_encode([
                'otp' => $otp,
            ]),
        ]);

        return ResponseMediator::getContent($response);
    }
}