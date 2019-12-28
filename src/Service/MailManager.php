<?php

namespace App\Service;


use App\Entity\Token;
use App\Entity\User;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MailManager extends AbstractController
{
    private $mailer;

    public function __construct(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function SendMail(User $user, Token $token)
    {
        $message = (new Swift_Message('SnowTricks - Réinitiliser votre mot de passe'))
            ->setFrom('snowtricks@ooclassrooms.com')
            ->setTo($user->getEmail())
            ->setBody(
                $this->render(
                    'mail/resetPassword.html.twig', [
                    'token' => $token->getValue(),
                    'username' => $user->getUsername()
                    ]
                ),
                'text/html'
            );
        $this->mailer->send($message);
    }
}
