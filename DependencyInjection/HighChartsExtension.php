<?php
/**
 * File: HighChartsExtension.php
 * Date: 02/03/17
 *
 * @package  Validaide
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 * @link     http://www.marcel-tuinstra.com
 */

namespace Validaide\HighChartsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class: HighChartsExtension
 *
 * This is the class that loads and manages your bundle configuration.
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 *
 * @package  VendorName
 * @author   Marcel Tuinstra <marcel.tuinstra@validaide.com>
 */
class HighChartsExtension extends Extension
{
    /**
     * General information about method
     *
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
