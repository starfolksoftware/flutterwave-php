<?php declare(strict_types=1);

namespace StarfolkSoftware\Flutterwave\Options;

use StarfolkSoftware\Flutterwave\Abstracts\OptionsAbstract;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class RefundQueryParams extends OptionsAbstract
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
        $resolver->define('from')
            ->default('')
            ->allowedTypes('string')
            ->info('The start date of the date range to query refunds for. Format: YYYY-MM-DD');

        $resolver->define('to')
            ->allowedTypes('string')
            ->info('The end date of the date range to query refunds for. Format: YYYY-MM-DD');

        $resolver->define('status')
            ->default('completed-mpgs')
            ->allowedTypes('string')
            ->allowedValues('completed-mpgs')
            ->info('The status refunds');

        $resolver->define('flw_ref')
            ->allowedTypes('string')
            ->info('The flw reference to query refunds for');

        $resolver->define('currency')
            ->allowedTypes('string')
            ->info('The currency of the refunds');

        $resolver->define('id')
            ->allowedTypes('string')
            ->info('The id of the refunds');
    }
}
