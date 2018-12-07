<?php

namespace VKCommandBus;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use VKCommandBus\DependencyInjection\Compiler\AddFacadePass;
use VKCommandBus\Facade\AbstractFacade;
use Psr\Container\ContainerInterface;

/**
 * Class VKCommandBusBundle
 */
class VKCommandBusBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function boot(): void
    {
        parent::boot();

        /** @var ContainerInterface $container */
        $container = $this->container->get('vk.command_bus.facade.container');
        AbstractFacade::setFacadeContainer($container);
    }
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        $container->addCompilerPass(new AddFacadePass());
    }
}
