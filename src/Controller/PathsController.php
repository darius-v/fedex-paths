<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Path;
use App\Entity\Review;
use App\ListData;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PathsController extends AbstractController

{
    /**
     * @Route("/")
     */
    public function list(ListData $listData): Response
    {
        return new Response($listData->data2());
    }

    /**
     * @Route("/{id}")
     */
    public function show(ManagerRegistry $doctrine, string $id): Response
    {


//        $path = $doctrine->getRepository(Path::class)->find($id);
//
//        dump($path);
//        dump($path->getReviews());

        $reviews = $path = $doctrine->getRepository(Review::class)->findBy(['path' => $id]);
//        dump($reviews);

//        $product = $doctrine->getRepository(Product::class)->find($id);

//        if (!$product) {
//            throw $this->createNotFoundException(
//                'No product found for id '.$id
//            );
//        }

        $reviewsToReturn = [];
        /** @var Review $review */
        foreach ($reviews as $review) {
            $reviewsToReturn[] = $review->getVote();
        }



        return new JsonResponse(['id' => $id, 'reviews' => $reviewsToReturn]);

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}