<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Framework\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function __construct(private \DateTime $dt)
    {
    }

    public function index(): ResponseInterface
    {
        return $this->render("Router A/index", [
            "name" => $this->dt->format("l")
        ]);
    }
}