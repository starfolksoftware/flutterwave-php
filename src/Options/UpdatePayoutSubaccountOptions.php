<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class UpdatePayoutSubaccountOptions extends OptionsAbstract
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
        $resolver->define('account_name')
            ->allowedTypes('string')
            ->info('This is the account name of the payout subaccount');

        $resolver->define('email')
            ->allowedTypes('string')
            ->info('This is the email address of the payout subaccount');

        $resolver->define('mobilenumber')
            ->allowedTypes('string')
            ->info('This is the mobile number of the payout subaccount');

        $resolver->define('country')
            ->allowedTypes('string')
            ->info('This is the country of the payout subaccount');
    }
}
