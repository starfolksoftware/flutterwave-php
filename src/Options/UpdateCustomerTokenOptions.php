<?php

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class UpdateCustomerTokenOptions extends OptionsAbstract
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
            ->required()
            ->allowedTypes('string')
            ->info('The email address of the customer');

        $resolver->define('first_name')
            ->required()
            ->allowedTypes('string')
            ->info('The first name of the customer');

        $resolver->define('last_name')
            ->required()
            ->allowedTypes('string')
            ->info('The last name of the customer');

        $resolver->define('phone_number')
            ->required()
            ->allowedTypes('string')
            ->info('The phone number of the customer');
    }
}
