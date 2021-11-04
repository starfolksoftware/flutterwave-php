<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CreatePlanOptions extends OptionsAbstract
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
        $resolver->define('amount')
            ->required()
            ->allowedTypes('int')
            ->info('The amount of the plan');

        $resolver->define('name')
            ->required()
            ->allowedTypes('string')
            ->info('The name of the plan');

        $resolver->define('interval')
            ->required()
            ->allowedTypes('string')
            ->allowedValues('daily', 'weekly', 'monthly', 'quarterly', 'yearly')
            ->info('The description of the plan');
        
        $resolver->define('duration')
            ->allowedTypes('int')
            ->info('The duration of the plan');
    }
}
