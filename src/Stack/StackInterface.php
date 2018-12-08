<?php

namespace VKCommandBusBundle\Stack;

use VKCommandBusBundle\Middleware\MiddlewareInterface;

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
