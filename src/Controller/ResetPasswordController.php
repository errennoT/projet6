<?php

namespace App\Controller;

use App\Entity\Token;
use App\Form\ForgotPasswordType;
use App\Form\ResetUserPasswordType;
use App\Repository\TokenRepository;
use App\Repository\UserRepository;
use App\Service\MailManager;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ResetPasswordController extends AbstractController
{
    private $entityManager;

    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/mot-de-passe-oublie", name="forgot_password")
     * @param UserRepository $userRepository
     * @param MailManager $mailManager
     * @return Response
     */
    public function forgotPassword(UserRepository $userRepository, MailManager $mailManager, Request $request): Response
    {

        $form = $this->createForm(ForgotPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $user = $userRepository->findOneByUsername($data["username"]);

            if ($user !== null) {

                $token = new Token($user);
                $user->addToken($token);
                $this->entityManager->persist($user);
                $this->entityManager->flush();

                $mailManager->SendMail($user, $token);

                $this->addFlash('success', 'Un email vous a été envoyé');
            } else {
                $this->addFlash('error', 'Le pseudo est inconnu');
            }
        }

        return $this->render('profile/forgotPassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }

   
}
