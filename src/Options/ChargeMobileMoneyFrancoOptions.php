<?php

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ChargeMobileMoneyFrancoOptions extends OptionsAbstract
{
    /**
     * Set defaults, allowed types and values of the options.
     * 
     * @param OptionsResolver $resolver
     * 
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->define('amount')
            ->required()
            ->allowedTypes('int')
            ->info('The amount to charge');

        $resolver->define('currency')
            ->required()
            ->allowedTypes('string')
            ->info('The currency to charge in');

        $resolver->define('phone_number')
            ->required()
            ->allowedTypes('string')
            ->info('The phone number');

        $resolver->define('email')
            ->required()
            ->allowedTypes('string')
            ->info('The email address');

        $resolver->define('tx_ref')
            ->required()
            ->allowedTypes('string')
            ->info('The transaction reference');

        $resolver->define('fullname')
            ->allowedTypes('string')
            ->info('The full name');

        $resolver->define('client_ip')
            ->allowedTypes('string')
            ->info('The client ip');

        $resolver->define('device_fingerprint')
            ->allowedTypes('string')
            ->info('The device fingerprint');

        $resolver->define('meta')
            ->allowedTypes('array')
            ->info('The meta data');

        $resolver->define('country')
            ->allowedTypes('string')
            ->info('The country');
    }
}
