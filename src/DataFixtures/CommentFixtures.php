<?php

namespace App\DataFixtures;


use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        for ($c = 1; $c < mt_rand(100, 150); $c++) {

            $trick = $this->getReference('trick'. mt_rand(1, 15));

            $comment = new Comment();
            $content =  "Commentaire n° $c";

            $comment->setCreatedAt(new \DateTime())
                ->setContent($content)
                ->setTrick($trick)
                ->setUserId($this->getReference('user'.mt_rand(1, 2)))
            ;

            $manager->persist($comment);

        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TrickFixtures::class,
        );
    }
}