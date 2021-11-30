<?php

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class AllowedChargeTypesOptions extends OptionsAbstract
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
        $resolver->define('type')
            ->required()
            ->allowedTypes('string')
            ->allowedValues(
                'card',
                'bank_transfer',
                'ach_payment',
                'debit_uk_account',
                'mobile_money_ghana',
                'mobile_money_rwanda',
                'mobile_money_uganda',
                'mobile_money_zambia',
                'ussd',
                'mpesa',
                'voucher_payment',
                'mobile_money_franco',
                'debit_ng_account',
            )->info('The type of the allowed charge type.');
    }
}
