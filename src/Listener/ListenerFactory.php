<?php
/**
 * @copyright (c) 2006-2017 Stickee Technology Limited
 */

namespace Stickee\Sentry\Listener;

use Psr\Container\ContainerInterface;

class ListenerFactory
{
    /**
     * Create an object
     *
     * @param ContainerInterface $container
     *
     * @return Listener
     *
     */
    public function __invoke(ContainerInterface $container)
    {
        /** @var \Raven_Client $raven */
        $raven = $container->get(\Raven_Client::class);

        return new Listener($raven);
    }
}
