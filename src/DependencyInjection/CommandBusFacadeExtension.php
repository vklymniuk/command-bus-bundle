<?php

namespace VKCommandBusBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use VKCommandBusBundle\Facade\AbstractFacade;

/**
 * Class CommandBusFacadeExtension
 */
final class CommandBusFacadeExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $container->registerForAutoconfiguration(AbstractFacade::class)->addTag('vk.command_bus.facade');
    }
}
