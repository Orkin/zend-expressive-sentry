<?php
/**
 * @copyright (c) 2006-2017 Stickee Technology Limited
 */

namespace Stickee\Sentry\Raven;

use Psr\Container\ContainerInterface;
use Raven_Client;

class RavenFactory
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     *
     * @return Raven_Client
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');

        $options = isset($config['sentry']) ? $config['sentry'] : [];

        return new Raven_Client($options);
    }
}
