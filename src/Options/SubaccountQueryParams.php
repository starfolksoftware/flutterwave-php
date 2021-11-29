<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SubaccountQueryParams extends OptionsAbstract
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
        $resolver->define('account_bank')
            ->allowedTypes('string')
            ->info('The bank of the account to be queried.');

        $resolver->define('account_number')
            ->allowedTypes('string')
            ->info('The account number of the account to be queried.');

        $resolver->define('bank_name')
            ->allowedTypes('string')
            ->info('The name of the bank to be queried.');

        $resolver->define('page')
            ->allowedTypes('string')
            ->info('The page number of the results to be returned.');
    }
}
