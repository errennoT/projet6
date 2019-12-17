<?php

namespace App\Controller;

use App\Entity\PictureUser;
use App\Entity\User;
use App\Form\UpdatePasswordType;
use App\Form\UserProfilePictureType;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/compte")
 */
class AccountController extends AbstractController
{
    private $repository;
    private $entityManager;
    private $session;

    public function __construct(UserRepository $repository, EntityManagerInterface $entityManager, SessionInterface $session)
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
     * @Route("/modifier-mdp/{id}", name="password_edit", methods="GET|POST")
     * @param User $user
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function editPassword(User $user, Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        if ($this->accountAccessSecurity($user)) {
            $form = $this->createForm(UpdatePasswordType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                if ($passwordEncoder->isPasswordValid($user, $user->getOldPassword())) {
                    $newEncodedPassword = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                    $user->setPassword($newEncodedPassword);

                    $this->entityManager->flush();
                    $this->addFlash('success', 'Mot de passe modifié avec succès');

                    return $this->redirectToRoute('profile', [
                        'id' => $user->getId()
                    ]);
                } else {
                    $form->addError(new FormError('Ancien mot de passe incorrect'));
                }
            }

            return $this->render('profile/editPassword.html.twig', [
                'user' => $user,
                'form' => $form->createView()
            ]);
        }
    }

    /**
     * @Route("/photo-de-profil/{id}", name="picture_edit")
     * @param User $user
     * @param Request $request
     * @return Response
     */
    public function editPicture(User $user, Request $request, FileUploader $fileUploader): Response
    {
        $profilePicture = new PictureUser;

        $form = $this->createForm(UserProfilePictureType::class, $profilePicture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if (!empty($user->getPictureUser())) {
                $fileUploader->removeFile($user->getPictureUser()->getName());
                $this->entityManager->remove($user->getPictureUser());
                $this->entityManager->flush();
            }
            $profilePicture = $form->getData();

            $file = $profilePicture->getFile();
            $fileName = $fileUploader->upload($file);

            $profilePicture->setName($fileName);
            $user->setPictureUser($profilePicture);
            $this->entityManager->flush();
            $this->addFlash('success', 'Votre photo de profil a bien été ajoutée !'
            );
            return $this->redirectToRoute('profile', [
                'id' => $user->getId()
            ]);
        }

        if ($this->accountAccessSecurity($user)) {
            return $this->render('profile/editPicture.html.twig', [
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
