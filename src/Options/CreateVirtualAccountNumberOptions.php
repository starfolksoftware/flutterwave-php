<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CreateVirtualAccountNumberOptions extends OptionsAbstract
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

        $resolver->define('amount')
            ->allowedTypes('int')
            ->info('The amount to fund the virtual account with');

        $resolver->define('tx_ref')
            ->allowedTypes('string')
            ->info('The transaction reference');

        $resolver->define('is_permanent')
            ->default(false)
            ->allowedTypes('bool')
            ->info('Whether the virtual account is permanent or not');

        $resolver->define('narration')
            ->allowedTypes('string')
            ->info('The narration for the transaction');

        $resolver->define('bvn')
            ->allowedTypes('string')
            ->info('The bvn of the customer');
    }
}
