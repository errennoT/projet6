<?php

namespace App\DataFixtures;


use App\Entity\VideoTrick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VideoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($b = 1; $b <=10; $b++) {
            $video = new VideoTrick();

            $video->setUrl('<iframe width="560" height="315" src="https://www.youtube.com/embed/SQyTWk7OxSI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

            $this->addReference('video'.$b , $video);
        }

    }
}