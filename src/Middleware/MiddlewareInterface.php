<?php

namespace VKCommandBus\Middleware;

use VKCommandBus\Envelope;
use VKCommandBus\Stack\StackInterface;

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
