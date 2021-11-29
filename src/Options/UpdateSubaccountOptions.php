<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class UpdateSubaccountOptions extends OptionsAbstract
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
            ->allowedTypes('string')
            ->info('The account number of the account to be created');

        $resolver->define('account_bank')
            ->allowedTypes('string')
            ->info('The bank code of the account to be created');

        $resolver->define('business_name')
            ->allowedTypes('string')
            ->info('The business name of the account to be created');

        $resolver->define('split_value')
            ->allowedTypes('float')
            ->info('The split value of the account to be created');

        $resolver->define('business_email')
            ->allowedTypes('string')
            ->info('The business email of the account to be created');

        $resolver->define('split_type')
            ->default('percentage')
            ->allowedTypes('string')
            ->allowedValues('percentage', 'flat')
            ->info('The split type of the account to be created');
    }
}
