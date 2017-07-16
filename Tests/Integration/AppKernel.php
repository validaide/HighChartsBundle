<?php

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Class AppKernel
 *
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        $bundles = [

            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Validaide\HighChartsBundle\HighChartsBundle(),
        ];

        if (in_array($this->getEnvironment(), ['test'])) {

        }

        return $bundles;
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'config.yml');
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheDir()
    {
        return dirname(__DIR__).'/../../var/'.$this->environment.'/cache';
    }

    /**
     * {@inheritdoc}
     */
    public function getLogDir()
    {
        return dirname(__DIR__).'/../../var/'.$this->environment.'/logs';
    }
}