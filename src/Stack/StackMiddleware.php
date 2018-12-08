<?php

namespace VKCommandBusBundle\Stack;

use VKCommandBusBundle\Envelope;
use VKCommandBusBundle\Middleware\MiddlewareInterface;

/**
 * Class StackMiddleware
 */
class StackMiddleware implements MiddlewareInterface, StackInterface
{
    /**
     * @var \Iterator
     */
    private $middlewareIterator;

    /**
     * StackMiddleware constructor.
     *
     * @param \Iterator|null $middlewareIterator
     */
    public function __construct(\Iterator $middlewareIterator = null)
    {
        $this->middlewareIterator = $middlewareIterator;
    }

    /**
     * @inheritdoc
     */
    public function next(): MiddlewareInterface
    {
        if (null === $iterator = $this->middlewareIterator) {
            return $this;
        }
        $iterator->next();

        if (!$iterator->valid()) {
            $this->middlewareIterator = null;

            return $this;
        }

        return $iterator->current();
    }

    /**
     * @inheritdoc
     */
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        return $envelope;
    }
}
