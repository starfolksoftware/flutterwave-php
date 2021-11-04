<?php

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ChargeWithTokenOptions extends OptionsAbstract
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
        $resolver->define('token')
            ->required()
            ->allowedTypes('string')
            ->info('The token to charge with');

        $resolver->define('email')
            ->required()
            ->allowedTypes('string')
            ->info('The email of the customer');
        
        $resolver->define('currency')
            ->required()
            ->allowedTypes('string')
            ->info('The currency of the transaction');

        $resolver->define('country')
            ->required()
            ->allowedTypes('string')
            ->info('The country of the transaction');
        
        $resolver->define('amount')
            ->required()
            ->allowedTypes('int')
            ->info('The amount to charge');

        $resolver->define('tx_ref')
            ->required()
            ->allowedTypes('string')
            ->info('The transaction reference');

        $resolver->define('first_name')
            ->allowedTypes('string')
            ->info('The first name of the customer');

        $resolver->define('last_name')
            ->allowedTypes('string')
            ->info('The last name of the customer');

        $resolver->define('ip')
            ->allowedTypes('float')
            ->info('The IP address of the customer');

        $resolver->define('naration')
            ->allowedTypes('string')
            ->info('The narration of the transaction');

        $resolver->define('device_fingerprint')
            ->allowedTypes('string')
            ->info('The device fingerprint of the customer');

        $resolver->define('payment_plan')
            ->allowedTypes('int')
            ->info('The payment plan to charge with');

        $resolver->define('subaccounts')
            ->allowedTypes('string[]')
            ->info('The subaccounts to split charge with');

        $resolver->define('preauthorize')
            ->allowedTypes('bool')
            ->info('Whether to preauthorize the transaction');
    }
}
