<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CreateSubaccountOptions extends OptionsAbstract
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
            ->info('The bank of the account to be created');

        $resolver->define('account_number')
            ->required()
            ->allowedTypes('string')
            ->info('The account number of the account to be created');

        $resolver->define('business_name')
            ->required()
            ->allowedTypes('string')
            ->info('The business name of the account to be created');

        $resolver->define('country')
            ->required()
            ->allowedTypes('string')
            ->info('The country of the account to be created');

        $resolver->define('split_value')
            ->required()
            ->allowedTypes('float')
            ->info('The split value of the account to be created');

        $resolver->define('business_mobile')
            ->required()
            ->allowedTypes('string')
            ->info('The business mobile of the account to be created');

        $resolver->define('business_email')
            ->allowedTypes('string')
            ->info('The business email of the account to be created');

        $resolver->define('business_contact')
            ->allowedTypes('string')
            ->info('The business contact of the account to be created');

        $resolver->define('business_contact_mobile')
            ->allowedTypes('string')
            ->info('The business contact mobile of the account to be created');

        $resolver->define('split_type')
            ->default('percentage')
            ->allowedTypes('string')
            ->allowedValues('percentage', 'flat')
            ->info('The split type of the account to be created');

        $resolver->define('meta')
            ->allowedTypes('array')
            ->info('The meta of the account to be created');
    }
}
