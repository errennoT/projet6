<?php

namespace App\Controller;

use App\Entity\PictureUser;
use App\Entity\User;
use App\Form\UpdatePasswordType;
use App\Form\UserProfilePictureType;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\FileUploader;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/compte")
 */
class AccountController extends AbstractController
{
    private $repository;
    private $entityManager;
    private $session;

    public function __construct(UserRepository $repository, ObjectManager $entityManager, SessionInterface $session)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->session = $session;
    }

    /**
     * @Route("/mon-profil/{id}", name="profile")
     * @param User $user
     * @return Response
     */
    public function index(User $user): Response
    {
        if ($this->accountAccessSecurity($user)) {
            return $this->render('profile/homeProfile.html.twig', [
                'user' => $user
            ]);
        }
    }

    /**
     * @Route("/modifier-profil/{id}", name="user_edit", methods="GET|POST")
     * @param User $user
     * @param Request $request
     * @return Response
     */
    public function edit(User $user, Request $request): Response
    {
        if ($this->accountAccessSecurity($user)) {

            $form = $this->createForm(UserType::class, $user);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $this->entityManager->flush();
                $this->addFlash('success', 'Profil modifié avec succès');
                return $this->redirectToRoute('profile', [
                    'id' => $user->getId()
                ]);
            }

            return $this->render('profile/editUser.html.twig', [
                'user' => $user,
                'picture' => $user->getPictureUser(),
                'form' => $form->createView()
            ]);
        }
    }

   

    /**
     * @param User $user
     */
    private function accountAccessSecurity(User $user)
    {
        $GetSession = $this->session->all();
        $GetSessionName = $GetSession["_security.last_username"];

        $username = $user->getUsername();
        if ($GetSessionName === $username) {
            return true;
        } else
            return false;
    }
}
