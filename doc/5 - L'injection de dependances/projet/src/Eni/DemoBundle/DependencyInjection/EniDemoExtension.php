<?php

namespace Eni\DemoBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Definition;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class EniDemoExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (isset($config['driver'])) {
            $pdoDefinition = new Definition('PDO');
            
            if ('mysql' == $config['driver']) {
                $dsn = 'mysql:host='.$config['host'];
                $pdoDefinition->setArguments(array(
                    $dsn,
                    $config['user'],
                    isset($config['pass']) ? $config['pass'] : null
                ));
            } elseif ('sqlite' == $config['driver']) {
                $dsn = 'sqlite:'.$config['path'];
                $pdoDefinition->addArgument($dsn);
            }
            
            $container->setDefinition('my_pdo', $pdoDefinition);
        }
    }
}
