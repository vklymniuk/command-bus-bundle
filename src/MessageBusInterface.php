<?php

namespace VKCommandBusBundle;

/**
 * Interface MessageBusInterface
 */
interface MessageBusInterface
{
    /**
     * Dispatches the given message.
     *
     * @param object|Envelope $message The message or the message pre-wrapped in an envelope
     *
     * @return Envelope
     */
    public function dispatch($message): Envelope;
}
