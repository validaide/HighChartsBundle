<?php

namespace Tests\Validaide\HighChartsBundle\Integration;

use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;
use Validaide\HighChartsBundle\HighChartsBundle;

class AppKernel extends Kernel
{
    public function registerBundles(): array
    {
        $bundles = [
            new FrameworkBundle(),
            new HighChartsBundle(),
        ];

        if (in_array($this->getEnvironment(), ['test'])) {
            // noop
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(__DIR__ . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'config.yml');
    }

    public function getCacheDir(): string
    {
        return dirname(__DIR__).'/../../var/'.$this->environment.'/cache';
    }


    public function getLogDir(): string
    {
        return dirname(__DIR__).'/../../var/'.$this->environment.'/logs';
    }
}