<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class UpdateVirtualCardOptions extends OptionsAbstract
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
        $resolver->define('currency')
            ->required()
            ->allowedTypes('string')
            ->info('The currency of the virtual card');

        $resolver->define('amount')
            ->required()
            ->allowedTypes('int')
            ->info('The amount of the virtual card');

        $resolver->define('debit_currency')
            ->allowedTypes('string')
            ->info('The currency of the debit');

        $resolver->define('billing_name')
            ->required()
            ->allowedTypes('string')
            ->info('The name of the customer');

        $resolver->define('billing_address')
            ->allowedTypes('string')
            ->info('The address of the customer');

        $resolver->define('billing_city')
            ->allowedTypes('string')
            ->info('The city of the customer');

        $resolver->define('billing_state')
            ->allowedTypes('string')
            ->info('The state of the customer');
        
        $resolver->define('billing_post_code')
            ->allowedTypes('string')
            ->info('The post code of the customer');
        
        $resolver->define('billing_country')
            ->allowedTypes('string')
            ->info('The country of the customer');

        $resolver->define('callback_url')
            ->allowedTypes('string')
            ->info('The callback url');
    }
}
