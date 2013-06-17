<?php

namespace Engi\Components;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Configuration definition.
 *
 * @package   Engi
 * @category  Classes
 * @author    Piotr Suwik
 * @copyright 2013 Piotr Suwik 
 * @license   Proprietary
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $configTreeBuilder = new TreeBuilder;
        $appTreeBuilder = new TreeBuilder;
        $dbTreeBuilder = new TreeBuilder;

        $rootNode = $configTreeBuilder->root('config');

        $appNode = $appTreeBuilder->root('app')
            ->children()
            ->scalarNode('name')->end()
            ->end();

        $dbNode = $dbTreeBuilder->root('db')
            ->children()
            ->scalarNode('name')->end()
            ->end();

        $rootNode
            ->append($appNode)
            ->append($dbNode)
            ->end();

        return $configTreeBuilder;
    }
}