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

        /** @var Path $path */
        $path = $doctrine->getRepository(Path::class)->findOneBy(['externalId' => $id]);

        return new JsonResponse([
            'id' => $id,
            'position' => [
                'lat' => $path->getLat(),
                'lng' => $path->getLon(),
            ],
            'title' => $path->getTitle(),
            'options' => json_decode($path->getOptions(), true),
            'distance' => json_decode($path->getDistance(), true),
            'time' => json_decode($path->getTime(), true),
        ]);

        // or render a template
        // in the template, print things with {{ product.name }}
//         return $this->render('product/show.html.twig', ['product' => $product]);
    }
}