<?php 

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     * @param TrickRepository $trickRepository
     * @return Response
     */
    public function index(TrickRepository $trickRepository): Response
    {
        return $this->render('home/home.html.twig', [
            'tricks' => $trickRepository->findBy([], ['created_at' => 'DESC'], 12, 0)
        ]);
    }

    /**
     * @Route("/{trick<\d+>?12}", name="load_more_trick")
     */
    public function loadMoreTrick(TrickRepository $trickRepository, $trick = 12)
    {
        return $this->render('home/loadMoreTricks.html.twig', [
                'tricks' => $trickRepository->findBy([], ['created_at' => 'DESC'],12, $trick),
            ]
        );
    }

}