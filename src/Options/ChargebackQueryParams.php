<?php

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ChargebackQueryParams extends OptionsAbstract
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
        $resolver->define('page')
            ->allowedTypes('int')
            ->info('Page number to retrieve. Default is 1.');

        $resolver->define('status')
            ->allowedValues(['lost', 'won', 'initiated', 'accepted', 'declined'])
            ->info('The status of the chargeback. Default is pending.');

        $resolver->define('from')
            ->allowedTypes('string')
            ->info('The date from which to retrieve chargebacks. Default is the current date.');

        $resolver->define('to')
            ->allowedTypes('string')
            ->info('The date to which to retrieve chargebacks. Default is the current date.');

        $resolver->define('currency')
            ->allowedTypes('string')
            ->info('The currency to charge in');

        $resolver->define('flw_ref')
            ->allowedTypes('string')
            ->info('The flw reference to chargeback');

        $resolver->define('id')
            ->allowedTypes('string')
            ->info('The id of the chargeback');
    }
}
