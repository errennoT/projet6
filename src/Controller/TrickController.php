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

     /**
     * @Route("/trick/supprimer-trick/{trick}", name="trick_delete", methods="DELETE")
     * @param Trick $trick
     * @param Request $request
     */
    public function deleteTrick(Trick $trick, Request $request, FileUploader $fileUploader)
    {
        if ($this->isCsrfTokenValid('delete' . $trick->getId(), $request->get('_token'))) {

            $fileUploader->removeFile($trick->getNameDefaultPicture ());
            $pictures = $trick->getPictureTricks();
            foreach ($pictures as $picture) {
                $fileUploader->removeFile($picture->getName());
            }

            $this->entityManager->remove($trick);
            $this->entityManager->flush();
            $this->addFlash('success', 'Trick supprimé avec succès');
            return $this->redirectToRoute('home');
        }
    }

    /**
     * @Route("/{category}/{trick}", name="trick_show")
     * @param Trick $trick
     * @return Response
     */
    public function showTrick(Trick $trick): Response
    {
       
        return $this->render('trick/showTrick.html.twig', [
            'trick' => $trick,
            'pictures' => $trick->getPictureTricks(),
            'videos' => $trick->getVideoTricks(),
        ]);
    }

 
}

