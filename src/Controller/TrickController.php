<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\PictureTrick;
use App\Entity\Trick;
use App\Entity\VideoTrick;
use App\Form\CommentType;
use App\Form\TrickEditionDataType;
use App\Form\TrickEditionPictureType;
use App\Form\TrickPictureType;
use App\Form\TrickType;
use App\Form\VideoType;
use App\Repository\CommentRepository;
use App\Repository\TrickRepository;
use App\Repository\UserRepository;
use App\Service\FileUploader;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class TrickController extends AbstractController
{

    private $repository;
    private $entityManager;
    private $session;

    public function __construct(TrickRepository $repository, ObjectManager $entityManager, SessionInterface $session)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->session = $session;
    }

    /**
     * @Route("/trick/ajouter-trick", name="add_trick")
     * @param Request $request
     * @param FileUploader $fileUploader
     * @return Response
     */
    public function addTrick(Request $request, FileUploader $fileUploader): Response
    {
        $trick = new Trick();
        $trickPicture = new PictureTrick();
        $trickVideo = new VideoTrick();

        $trick->getPictureTricks()->add($trickPicture);
        $trick->getVideoTricks()->add($trickVideo);

        $form = $this->createForm(TrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick = $form->getData();
            $files = $trick->getPictureTricks();
            $videos = $trick->getVideoTricks();

            $defaultPicture = $trick->getDefaultPicture();
            $fileName = $fileUploader->upload($defaultPicture);
            $trick->setNameDefaultPicture($fileName);

            foreach ($files as $file) {
                $fileName = $fileUploader->upload($file->getFile());
                $file->setName($fileName);
                $file->setRelation($trick);
                $trick->addPictureTrick($trickPicture);
            }

            foreach ($videos as $video) {
                $video->setRelation($trick);
            }

            $this->entityManager->persist($trick);
            $this->entityManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('trick/addTrick.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
