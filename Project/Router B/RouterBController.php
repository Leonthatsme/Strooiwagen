<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Framework\Controller\AbstractController;
use PDO;
use App\Entities\Product;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function index(): ResponseInterface
    {
        $repo = $this->em->getRepository(Product::class);

        $products = $repo->findAll();

        return $this->render("Router B/index", [
            "products" => $products
        ]);
    }

    public function show(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $product = $this->em->find(Product::class, $args["id"]);

        return $this->render("Router B/show", [
            "product" => $product
        ]);
    }

    public function create(ServerRequestInterface $request): ResponseInterface
    {
        if ($request->getMethod() === "POST") {

            $parameters = $request->getParsedBody();

            $product = new Product;

            $product->setName($parameters["name"]);
            $product->setDescription($parameters["description"]);
            $product->setSize((int) $parameters["size"]);

            $this->em->persist($product);

            $this->em->flush();

            return $this->redirect("/Router B/{$product->getId()}");
        }

        return $this->render("Router B/new");
    }
}