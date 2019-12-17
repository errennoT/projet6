<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function encodePassword($user, $plainPassword)
    {
        return $this->passwordEncoder->encodePassword($user, $plainPassword);
    }

    public function load(ObjectManager $manager)
    {

        $user1 = new User;
        $plainPassword = 'administrateur';
        $newPassword = $this->encodePassword($user1, $plainPassword);

        $user1->setUsername('administrateur')
            ->setEmail('administrateur@gmail.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($newPassword)
            ->setPictureUser($this->getReference('profilPicture'. mt_rand(1, 2)))
        ;
        $this->addReference('user1', $user1);

        $manager->persist($user1);

        $user2 = new User;
        $plainPassword = 'utilisateur';
        $newPassword = $this->encodePassword($user2, $plainPassword);

        $user2->setUsername('utilisateur')
            ->setEmail('utilisateur@gmail.com')
            ->setRoles(['ROLE_USER'])
            ->setPassword($newPassword)
            ->setPictureUser($this->getReference('profilPicture'. mt_rand(1, 2)))
        ;
        $this->addReference('user2', $user2);

        $manager->persist($user2);
         	
        $manager->flush();

    }

    public function getDependencies()
    {
        return array(
            ProfilPictureFixtures::class,
        );
    }

}