<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SubscriptionQueryParams extends OptionsAbstract
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
        $resolver->define('email')
            ->default('')
            ->allowedTypes('string')
            ->info('Email address of the customer');
        
        $resolver->define('transaction_id')
            ->allowedTypes('int')
            ->info('Transaction ID of the customer');

        $resolver->define('plan')
            ->allowedTypes('int')
            ->info('Plan of the customer');

        $resolver->define('subscribed_from')
            ->allowedTypes('string')
            ->info('Subscribed from date');

        $resolver->define('subscribed_to')
            ->allowedTypes('string')
            ->info('Subscribed to date');

        $resolver->define('next_due_from')
            ->allowedTypes('string')
            ->info('Next due from date');

        $resolver->define('next_due_to')
            ->allowedTypes('string')
            ->info('Next due to date');

        $resolver->define('page')
            ->allowedTypes('int')
            ->info('Page number');

        $resolver->define('status')
            ->allowedTypes('string')
            ->allowedValues('active', 'cancelled')
            ->info('Status of the subscription');
    }
}
