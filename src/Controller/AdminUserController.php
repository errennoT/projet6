<?php

namespace App\Controller;

use App\Entity\PictureUser;
use App\Entity\User;
use App\Form\ResetUserPasswordType;
use App\Form\UserProfilePictureType;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\FileUploader;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin")
 */
class AdminUserController extends AbstractController
{

    private $repository;
    private $entityManager;

    public function __construct(UserRepository $repository, ObjectManager $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/utilisateurs", name="admin_users")
     * @param UserRepository $repository
     * @return Response
     */
    public function index(): Response
    {
        $users = $this->repository->findAll();
        return $this->render('admin/users.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/utilisateur/{id}", name="admin_user_edit", methods="GET|POST")
     * @param User $user
     * @param Request $request
     * @return Response
     */
    public function edit(User $user, Request $request): Response

    {
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->entityManager->flush();
            $this->addFlash('success', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('admin_users');
        }

        return $this->render('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/utilisateur/mdp/{id}", name="admin_password_edit", methods="GET|POST")
     * @param User $user
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function editPassword(User $user, Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createForm(ResetUserPasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $this->entityManager->flush();
            $this->addFlash('success', 'Mot de passe modifié avec succès');
            return $this->redirectToRoute('admin_users');
        }

        return $this->render('admin/user/editPassword.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/utilisateur/{id}", name="admin_user_delete", methods="DELETE")
     * @param User $user
     * @param Request $request
     */
    public function delete(User $user, Request $request, FileUploader $fileUploader)
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->get('_token'))) {
            if (!empty($user->getPictureUser())) {
                $fileUploader->removeFile($user->getPictureUser()->getName());
            }
            $this->entityManager->remove($user);
            $this->entityManager->flush();
            $this->addFlash('success', 'Utilisateur supprimé avec succès');
            return $this->redirectToRoute('admin_users');
        }
    }

    /**
     * @Route("/utilisateur/setadmin/{id}", name="admin_user_setadmin", methods="POST")
     * @param User $user
     * @param Request $request
     */
    public function setAdmin(User $user, Request $request)
    {
        if ($this->isCsrfTokenValid('setAdmin' . $user->getId(), $request->get('_token'))) {
            $user->setRoles(['ROLE_ADMIN']);
            $this->entityManager->flush();
            $this->addFlash('success', 'L\'utilisateur est devenu administrateur');
            return $this->redirectToRoute('admin_users');
        }
    }

    /**
     * @Route("/utilisateur/unsetadmin/{id}", name="admin_user_unsetadmin", methods="POST")
     * @param User $user
     * @param Request $request
     */
    public function unsetAdmin(User $user, Request $request)
    {
        if ($this->isCsrfTokenValid('unsetAdmin' . $user->getId(), $request->get('_token'))) {
            $user->setRoles(['ROLE_USER']);
            $this->entityManager->flush();
            $this->addFlash('success', 'L\'utilisateur n\'est plus administrateur');
            return $this->redirectToRoute('admin_users');
        }
    }

    /**
     * @Route("/utilisateur/photo-de-profil/{id}", name="admin_edit_picture")
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
            $this->addFlash(
                'success',
                'La photo de profil a bien été ajoutée !'
            );
            return $this->redirectToRoute('admin_users');
        }

            return $this->render('admin/user/editPicture.html.twig', [
                'user' => $user,
                'picture' => $user->getPictureUser(),
                'form' => $form->createView()
            ]);
    }
}
