<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CreateBeneficiaryOptions extends OptionsAbstract
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
        $resolver->define('account_number')
            ->required()
            ->allowedTypes('string')
            ->info('The account number of the beneficiary');

        $resolver->define('account_bank')
            ->required()
            ->allowedTypes('string')
            ->info('The bank of the beneficiary');

        $resolver->define('beneficiary_name')
            ->required()
            ->allowedTypes('string')
            ->info('The name of the beneficiary');

        $resolver->define('currency')
            ->allowedTypes('string')
            ->info('The currency of the beneficiary');

        $resolver->define('bank_name')
            ->allowedTypes('string')
            ->info('The name of the beneficiary bank');
    }
}
