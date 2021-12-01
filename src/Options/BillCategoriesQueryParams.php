<?php

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class BillCategoriesQueryParams extends OptionsAbstract
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
        $resolver->define('airtime')
            ->allowedTypes('int')
            ->info('Airtime categories');

        $resolver->define('data_bundle')
            ->allowedTypes('int')
            ->info('Data bundle categories');

        $resolver->define('power')
            ->allowedTypes('int')
            ->info('Power categories');

        $resolver->define('internet')
            ->allowedTypes('int')
            ->info('Internet categories');

        $resolver->define('toll')
            ->allowedTypes('int')
            ->info('Toll categories');

        $resolver->define('biller_code')
            ->allowedTypes('string')
            ->info('Bill code categories');

        $resolver->define('cables')
            ->allowedTypes('int')
            ->info('Cable categories');
    }
}
