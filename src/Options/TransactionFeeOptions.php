<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class TransactionFeeOptions extends OptionsAbstract
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
        $resolver->define('amount')
            ->required()
            ->allowedTypes('int')
            ->info('The amount of the transaction fee in kobo');

        $resolver->define('currency')
            ->required()
            ->allowedTypes('string')
            ->info('The currency of the transaction fee');

        $resolver->define('payment_type')
            ->default('card')
            ->allowedTypes('string')
            ->allowedValues('card', 'debit_ng_account', 'mobilemoney', 'bank_transfer', 'ach_payment')
            ->info('The payment type of the transaction fee');

        $resolver->define('card_first6digits')
            ->allowedTypes('string')
            ->info('The first 6 digits of the card used to pay the transaction fee');
    }
}
