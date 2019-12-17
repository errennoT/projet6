<?php

namespace App\DataFixtures;


use App\Entity\PictureUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProfilPictureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($a = 1; $a < 3; $a++) {

            $profilPicture = new PictureUser();

            $profilPicture->setName('profil' .$a.  '.jpg');

            $this->addReference('profilPicture'.$a, $profilPicture);
        }
    }
}
