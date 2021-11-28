<?php

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ChargeWithTokenInBulkOptions extends OptionsAbstract
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
        $resolver->define('title')
            ->required()
            ->allowedTypes('string')
            ->info('The title of the transaction');

        $resolver->define('retry_strategy')
            ->required()
            ->allowedTypes('array')
            ->info('The retry strategy of the transaction');

        $resolver->define('bulk_data')
            ->required()
            ->allowedTypes('array')
            ->info('The bulk data of the transaction');
    }
}
