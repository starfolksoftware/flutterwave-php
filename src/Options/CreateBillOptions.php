<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CreateBillOptions extends OptionsAbstract
{
    /**
     * Set defaults, allowed types and values of the options.
     * 
     * @param OptionsResolver $resolver
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->define('country')
            ->required()
            ->allowedTypes('string')
            ->info('Country');

        $resolver->define('customer')
            ->required()
            ->allowedTypes('string')
            ->info('Customer');

        $resolver->define('amount')
            ->required()
            ->allowedTypes('int')
            ->info('Amount');

        $resolver->define('recurrence')
            ->allowedTypes('string')
            ->allowedValues('ONCE', 'HOURLY', 'DAILY', 'WEEKLY', 'MONTHLY')
            ->info('Recurrence');

        $resolver->define('type')
            ->required()
            ->allowedTypes('string')
            ->info("Type");

        $resolver->define('reference')
            ->allowedTypes('string')
            ->info('Reference');

        $resolver->define('biller_name')
            ->allowedTypes('string')
            ->info('Biller Name');
    }
}
