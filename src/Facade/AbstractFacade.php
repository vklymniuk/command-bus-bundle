<?php

namespace VKCommandBusBundle\Facade;

use Psr\Container\ContainerInterface;

/**
 * Class AbstractFacade
 */
abstract class AbstractFacade
{
    /**
     * @var ContainerInterface
     */
    protected static $container;

    /**
     * Facade service container.
     *
     * @param ContainerInterface $container
     */
    public static function setFacadeContainer(ContainerInterface $container): void
    {
        static::$container = $container;
    }

    /**
     * Get the registered id of the service.
     *
     * @return string
     */
    abstract protected static function getFacadeAccessor(): string;

    /**
     * Handle dynamic calls to the service.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     *
     * @throws \RuntimeException
     */
    public static function __callStatic($method, $arguments)
    {
        $class = static::class;
        if (!static::$container->has($class)) {
            throw new \RuntimeException(sprintf('"%s" facade has not been register.', $class));
        }
        $service = static::$container->get($class);

        return $service->$method(...$arguments);
    }
}
