<?php

namespace App\DataFixtures;


use App\Entity\PictureTrick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PictureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($a = 1; $a <= 12; $a++) {

            $picture = new PictureTrick();

            $picture->setName($a . '.jpg');

            $this->addReference('picture' . $a, $picture);
        }
    }
}
