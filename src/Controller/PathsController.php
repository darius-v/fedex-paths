<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PathsController
{
    /**
     * @Route("/{id}")
     */
    public function show(string $id): Response
    {
//        $product = $doctrine->getRepository(Product::class)->find($id);

//        if (!$product) {
//            throw $this->createNotFoundException(
//                'No product found for id '.$id
//            );
//        }

        return new JsonResponse(['id' => $id]);

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}