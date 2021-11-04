<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class TransactionQueryParams extends OptionsAbstract
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
        $resolver->define('from')
            ->default('')
            ->allowedTypes('string')
            ->info('The start date of the date range to query transactions for. Format: YYYY-MM-DD');

        $resolver->define('to')
            ->allowedTypes('string')
            ->info('The end date of the date range to query transactions for. Format: YYYY-MM-DD');

        $resolver->define('page')
            ->allowedTypes('int')
            ->info('The page number to query transactions for. Default: 1');

        $resolver->define('customer_email')
            ->allowedTypes('string')
            ->info('The email address of the customer to query transactions for');

        $resolver->define('status')
            ->allowedTypes('string')
            ->allowedValues('active', 'cancelled')
            ->info('The status of the transaction to query transactions for');

        $resolver->define('tx_ref')
            ->allowedTypes('string')
            ->info('The transaction reference to query transactions for');

        $resolver->define('customer_fullname')
            ->allowedTypes('string')
            ->info('The full name of the customer to query transactions for');

        $resolver->define('currency')
            ->allowedTypes('string')
            ->info('The currency of the transaction to query transactions for');
    }
}
