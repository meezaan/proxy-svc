<?php

namespace Api\Controllers\v1;

use Mamluk\Kipchak\Components\Controllers;
use Mamluk\Kipchak\Components\Http;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Illuminate\Http\Client\Factory;

/**
 * All Controllers extending Controllers\Slim Contain the Service / DI Container as a protected property called $container.
 * Access it using $this->container in your controller.
 * Default objects bundled into a container are:
 * logger - which returns an instance of \Monolog\Logger. This is also a protected property on your controller. Access it using $this->logger.
 */

class Test extends Controllers\Slim
{

    public function get(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        $this->logger->debug('Calling Proxy URL...');

        /**
         * @var $c Factory
         */
        $c = $this->container->get('http.client');

        // Call this if the database has not been created.
        $rx = $c->get(getenv('PROXY_URL'));

        $response->getBody()->write($rx->body());

        // $c->delete('123');
        return $response;

    }

}