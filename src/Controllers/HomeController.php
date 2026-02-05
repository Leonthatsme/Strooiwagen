<?php

declare(strict_types=1);

namespace App\Controllers;

use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Nyholm\Psr7\Response as NyholmResponse;
use Psr\Http\Message\ResponseInterface;
use Nyholm\Psr7\Stream;
use GuzzleHttp\Psr7\HttpFactory;
use Nyholm\Psr7\Factory\Psr17Factory;

class HomeController
{
    public function index(): ResponseInterface
    {
        $factory = new Psr17Factory();

        $stream = $factory->createStream("Homepage");

        $response = $factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;

    }
}