<?php

namespace VKCommandBus\Stack;

use VKCommandBus\Middleware\MiddlewareInterface;

/**
 * Interface StackInterface
 */
interface StackInterface
{
    /**
     * Returns the next middleware to process a message.
     *
     * @return MiddlewareInterface
     */
    public function next(): MiddlewareInterface;
}
