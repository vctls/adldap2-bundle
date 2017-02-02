<?php

namespace Vctls\Adldap2Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('adldap2');

        $rootNode
            ->children()
                ->arrayNode('connection_settings')
                    ->children()
                        ->arrayNode('domain_controllers')
                            ->prototype('scalar')->end()
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->integerNode('port')
                        ->end()
                        ->scalarNode('account_suffix')
                        ->end()
                        ->scalarNode('account_prefix')
                        ->end()
                        ->scalarNode('base_dn')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('admin_account_suffix')
                        ->end()
                        ->scalarNode('admin_username')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('admin_password')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->booleanNode('follow_referrals')
                            ->defaultFalse()
                        ->end()
                        ->booleanNode('use_ssl')
                            ->defaultFalse()
                        ->end()
                        ->booleanNode('use_tls')
                            ->defaultFalse()
                        ->end()
                        ->integerNode('timeout')
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

