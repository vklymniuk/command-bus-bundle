<?php

namespace VKCommandBusBundle;

use VKCommandBusBundle\Middleware\MiddlewareInterface;
use VKCommandBusBundle\Stack\StackMiddleware;

/**
 * Class AbstractCommandBus
 */
abstract class AbstractCommandBus implements MessageBusInterface
{
    /**
     * @var Object
     */
    private $middlewareAggregate;

    /**
     * @param MiddlewareInterface[]|iterable $middlewareHandlers
     */
    public function __construct(iterable $middlewareHandlers = [])
    {
        $this->middlewareAggregate = new \ArrayObject($middlewareHandlers);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch($message): Envelope
    {
        if (!\is_object($message)) {
            throw new \TypeError(sprintf(
                'Invalid argument provided to "%s()": expected object, but got %s.',
                __METHOD__,
                \gettype($message)
            ));
        }

        $isSupportableMessage = false !== \get_class($message) ? $this->supports() === \get_class($message) : false;

        if (false === $isSupportableMessage) {
            throw new \TypeError('Bus does not support this message.');
        }

        $envelope = $message instanceof Envelope ? $message : new Envelope($message);
        $middlewareIterator = $this->middlewareAggregate->getIterator();

        while ($middlewareIterator instanceof \IteratorAggregate) {
            $middlewareIterator = $middlewareIterator->getIterator();
        }

        $middlewareIterator->rewind();

        if (!$middlewareIterator->valid()) {
            return $envelope;
        }

        $stack = new StackMiddleware($middlewareIterator);

        return $middlewareIterator->current()->handle($envelope, $stack);
    }

    /**
     * @param MiddlewareInterface $middleware
     */
    public function addMiddleWare(MiddlewareInterface $middleware): void
    {
        $this->middlewareAggregate->aggregate->append($middleware);
    }

    /**
     * @return string
     */
    abstract public function supports(): string;
}
