<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class UpdatePlanOptions extends OptionsAbstract
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
        $resolver->define('name')
            ->required()
            ->allowedTypes('string')
            ->info('The name of the plan');

        $resolver->define('status')
            ->required()
            ->allowedTypes('string')
            ->allowedValues('active', 'cancelled')
            ->info('The description of the plan');
    }
}
