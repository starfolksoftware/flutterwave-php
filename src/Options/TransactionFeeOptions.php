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
        $resolver->setDefaults([]);

        $resolver->setRequired(['amount', 'currency']);

        $resolver->setAllowedTypes('amount', 'int');
        $resolver->setAllowedTypes('currency', 'string');
        $resolver->setAllowedTypes('payment_type', 'string');
        $resolver->setAllowedValues('payment_type', [
            'card', 
            'debit_ng_account', 
            'mobilemoney', 
            'bank_transfer', 
            'ach_payment'
        ]);
        $resolver->setAllowedTypes('card_first6digits', 'int');
    }
}
