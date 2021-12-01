<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CreateRemitaPaymentOrderOptions extends OptionsAbstract
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
        $resolver->define('customer')
            ->required()
            ->allowedTypes('array')
            ->info("The customer");

        $resolver->define('fields')
            ->required()
            ->allowedTypes('array')
            ->info('Fields');

        $resolver->define('country')
            ->allowedTypes('string')
            ->info('Country');

        $resolver->define('amount') 
            ->allowedTypes('string') 
            ->info('Amount');

        $resolver->define('reference')
            ->allowedTypes('string')
            ->info('Reference');
    }
}
