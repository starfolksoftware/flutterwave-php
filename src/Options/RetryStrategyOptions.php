<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class RetryStrategyOptions extends OptionsAbstract
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
        $resolver->define("retry_interval")
            ->default(120)
            ->allowedTypes("int")
            ->info("The number of seconds to wait between retries. Default: 120");

        $resolver->define("retry_amount_variable")
            ->default(60)
            ->allowedTypes("int")
            ->info("The number of seconds to wait between retries. Default: 60");

        $resolver->define("retry_attempt_variable")
            ->default(2)
            ->allowedTypes("int")
            ->info("The number of seconds to wait between retries. Default: 2");
    }
}