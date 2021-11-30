<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CreateOtpOptions extends OptionsAbstract
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
        $resolver->define('length')
            ->required()
            ->allowedTypes('int')
            ->info('The length of the OTP to be generated');

        $resolver->define('customer')
            ->required()
            ->allowedTypes('array')
            ->info('The customer to be charged');

        $resolver->define('sender')
            ->required()
            ->allowedTypes('string')
            ->info('The sender of the OTP');

        $resolver->define('send')
            ->required()
            ->allowedTypes('bool')
            ->info('Whether to send the OTP to the customer');

        $resolver->define('medium')
            ->required()
            ->allowedTypes('array')
            ->info('The medium to send the OTP to');

        $resolver->define('expiry')
            ->required()
            ->allowedTypes('int')
            ->info('The time in minutes before the OTP expires');
    }
}
