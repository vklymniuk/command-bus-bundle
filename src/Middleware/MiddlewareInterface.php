<?php

namespace VKCommonBusBundle\Middleware;

use VKCommonBusBundle\Envelope;
use VKCommonBusBundle\Stack\StackInterface;

/**
 * Interface MiddlewareInterface
 */
interface MiddlewareInterface
{
    /**
     * @param Envelope       $envelope
     * @param StackInterface $stack
     *
     * @return Envelope
     */
    public function handle(Envelope $envelope, StackInterface $stack): Envelope;
}
