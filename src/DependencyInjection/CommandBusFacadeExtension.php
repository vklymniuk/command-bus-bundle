<?php

namespace VKCommandBus\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use VKCommandBus\Facade\AbstractFacade;

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
        $container->registerForAutoconfiguration(AbstractFacade::class)->addTag('command_bus.facade');
    }
}
