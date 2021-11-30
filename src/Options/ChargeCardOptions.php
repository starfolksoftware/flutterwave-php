<?php

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ChargeCardOptions extends OptionsAbstract
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

        $resolver->define('card_number')
            ->required()
            ->allowedTypes('int')
            ->info('The card number');

        $resolver->define('cvv')
            ->required()
            ->allowedTypes('int')
            ->info('The cvv');

        $resolver->define('expiry_month')
            ->required()
            ->allowedTypes('int')
            ->info('The expiry month');

        $resolver->define('expiry_year')
            ->required()
            ->allowedTypes('int')
            ->info('The expiry year');

        $resolver->define('email')
            ->required()
            ->allowedTypes('string')
            ->info('The email address');

        $resolver->define('tx_ref')
            ->required()
            ->allowedTypes('string')
            ->info('The transaction reference');

        $resolver->define('phone_number')
            ->allowedTypes('string')
            ->info('The phone number');

        $resolver->define('fullname')
            ->allowedTypes('string')
            ->info('The full name');

        $resolver->define('preauthorize')
            ->allowedTypes('bool')
            ->info('Whether to preauthorize the card');

        $resolver->define('redirect_url')
            ->allowedTypes('string')
            ->info('The redirect url');

        $resolver->define('client_ip')
            ->allowedTypes('string')
            ->info('The client ip');

        $resolver->define('device_fingerprint')
            ->allowedTypes('string')
            ->info('The device fingerprint');

        $resolver->define('meta')
            ->allowedTypes('array')
            ->info('The meta data');

        $resolver->define('authorization')
            ->allowedTypes('array')
            ->info('The authorization data');

        $resolver->define('payment_plan')
            ->allowedTypes('array')
            ->info('The payment plan data');
    }
}
