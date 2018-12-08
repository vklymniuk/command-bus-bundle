<?php

namespace VKCommonBusBundle\Stack;

use VKCommonBusBundle\Middleware\MiddlewareInterface;

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
