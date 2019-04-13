<?php
/**
 * @copyright (c) 2006-2017 Stickee Technology Limited
 */

namespace Stickee\Sentry;

use Psr\Container\ContainerInterface;
use Stickee\Sentry\Listener\Listener;
use Zend\Stratigility\Middleware\ErrorHandler;

;

class ListenerDelegator
{
    /**
     * A factory that creates delegates of a given service
     *
     * @param  ContainerInterface $container
     * @param  string $name
     * @param  callable $callback
     * @param  null|array $options
     *
     * @return ErrorHandler
     */
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $listener = $container->get(Listener::class);

        /** @var ErrorHandler $errorHandler */
        $errorHandler = $callback();

        $errorHandler->attachListener($listener);

        return $errorHandler;
    }
}
