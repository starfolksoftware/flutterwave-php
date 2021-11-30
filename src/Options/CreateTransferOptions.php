<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CreateTransferOptions extends OptionsAbstract
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
            ->required()
            ->allowedTypes('string')
            ->info('The bank account number of the beneficiary');

        $resolver->define('account_number')
            ->required()
            ->allowedTypes('string')
            ->info('The account number of the beneficiary');

        $resolver->define('amount')
            ->required()
            ->allowedTypes('int')
            ->info('The amount to transfer');

        $resolver->define('narration')
            ->allowedTypes('string')
            ->info('A description of the transfer');

        $resolver->define('currency')
            ->required()
            ->allowedTypes('string')
            ->info('The currency of the transfer');

        $resolver->define('beneficiary_name')
            ->allowedTypes('string')
            ->info('The name of the beneficiary');

        $resolver->define('destination_branch_code')
            ->allowedTypes('string')
            ->info('The branch code of the beneficiary');

        $resolver->define('beneficiary')
            ->allowedTypes('int')
            ->info('The id of the beneficiary');

        $resolver->define('reference')
            ->allowedTypes('string')
            ->info('The reference of the transfer');

        $resolver->define('callback_url')
            ->allowedTypes('string')
            ->info('The callback url');

        $resolver->define('debit_currency')
            ->allowedTypes('string')
            ->info('The currency of the debit');

        $resolver->define('meta')
            ->allowedTypes('array')
            ->info('The meta data of the transfer');

        $resolver->define('debit_subaccount')
            ->allowedTypes('string')
            ->info('The subaccount of the debit');
    }
}
