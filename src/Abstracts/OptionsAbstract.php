<?php

namespace StarfolkSoftware\Flutterwave\Abstracts;

use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class OptionsAbstract
{
    /**
     * @var array $options
     */
    private array $options;

    /**
     * Options constructor
     * 
     * @param array $options
     * 
     * @return void
     */
    public function __construct(array $options = [])
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    /**
     * Set defaults, allowed types and values of the options.
     * 
     * @param OptionsResolver $resolver
     * 
     * @return void
     */
    abstract public function configureOptions(OptionsResolver $resolver): void;

    /**
     * Get the options.
     * 
     * @return array
     */
    public function all(): array
    {
        return $this->options;
    }
}