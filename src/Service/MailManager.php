<?php

namespace App\Service;


use App\Entity\Token;
use App\Entity\User;
use Swift_Mailer;
use Swift_Message;
use Twig_Environment;

class MailManager
{
    private $mailer;
    private $twig;

    public function __construct(Swift_Mailer $mailer, Twig_Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function SendMail(User $user, Token $token)
    {
        $message = (new Swift_Message('SnowTricks - Réinitiliser votre mot de passe'))
            ->setFrom('snowtricks@ooclassrooms.com')
            ->setTo($user->getEmail())
            ->setBody(
                $this->twig->render(
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
