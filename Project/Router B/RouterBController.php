<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Framework\Template\RendererInterface;

class RouterBController
{
    public function __construct(private ResponseFactoryInterface $factory,
                                private RendererInterface $renderer)
    {
    }

    public function index(): ResponseInterface
    {
        $contents = $this->renderer->render("Router B");

        $stream = $this->factory->createStream($contents);

        $response = $this->factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;

    }

    public function show(ServerRequestInterface $request, array $args): ResponseInterface 
    {
    $contents = $this->renderer->render("Router B/show", [
        "id" => $args["id"]
    ]);

    $stream = $this->factory->createStream($contents);

    $response = $this->factory->createResponse(200);

    $response = $response->withBody($stream);

    return $response;
    }
}