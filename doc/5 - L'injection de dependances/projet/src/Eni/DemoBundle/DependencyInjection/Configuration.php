<?php

namespace Eni\DemoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('eni_demo');

        $rootNode
          ->children()
            ->scalarNode('driver')
              ->validate()
                ->ifNotInArray(array('mysql', 'sqlite'))
                ->thenInvalid('Seuls les pilotes MySQL et SQLite sont supportés.')
              ->end()
            ->end()
            ->scalarNode('host')->defaultValue('localhost')->end()
            ->scalarNode('user')->end()
            ->scalarNode('pass')->end()
            ->scalarNode('path')->end()
          ->end()
          ->validate()
            ->ifTrue(function($v) {
              if (!isset($v['driver'])) {
                  return false;
              }
              if ('mysql' == $v['driver'] && !isset($v['host'], $v['user'])) {
                return true;
              }
              if ('sqlite' == $v['driver'] && empty($v['path'])) {
                return true;
              }

              return false;
            })
            ->thenInvalid('La configuration de la connexion avec la base de données est invalide.')
          ->end()
        ;

        return $treeBuilder;
    }
}
