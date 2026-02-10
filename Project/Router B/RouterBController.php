<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Framework\Controller\AbstractController;

class RouterBController extends AbstractController
{
    public function index(): ResponseInterface
    {
        return $this->render("Router B/index");
    }

    public function show(ServerRequestInterface $request, array $args): ResponseInterface 
    {
    return $this->render("Router B/show", [
        "id" => $args["id"]
        ]);
    }
}