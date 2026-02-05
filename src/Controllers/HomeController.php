<?php

declare(strict_types=1);

namespace App\Controllers;

use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Nyholm\Psr7\Response as NyholmResponse;
use Psr\Http\Message\ResponseInterface;
use Nyholm\Psr7\Stream;
use Psr\Http\Message\ResponseFactoryInterface;

class HomeController
{
    public function __construct(private ResponseFactoryInterface $factory)
    {
    }

    public function index(): ResponseInterface
    {
        $stream = $this->factory->createStream("Homepage");

        $response = $this->factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;

    }
}