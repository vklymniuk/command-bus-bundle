<?php

namespace VKCommandBusBundle\Middleware;

use VKCommandBusBundle\Envelope;
use VKCommandBusBundle\Stack\StackInterface;

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
