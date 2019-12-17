<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TrickFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        for ($d = 1; $d <= 15; $d++) {

            $trick = new Trick();

            $description ="Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.
            
            Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.
            
            Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas aestimati quidam noxii damnabantur. quorum pars necati, alii puniti bonorum multatione actique laribus suis extorres nullo sibi relicto praeter querelas et lacrimas, stipe conlaticia victitabant, et civili iustoque imperio ad voluntatem converso cruentam, claudebantur opulentae domus et clarae.";
            

            $trick->setName("Trick n°$d")
                ->setDescription($description)
                ->setCategory("Grabs")
                ->setCreatedAt(new \DateTime())
                ->setNameDefaultPicture($d . '.jpg')
                ->addPictureTrick($this->getReference('picture'. mt_rand(1, 11)))
                ->addVideoTrick($this->getReference('video'. mt_rand(1, 5)))
                ->addPictureTrick($this->getReference('picture'. mt_rand(1, 11)))
                ->addVideoTrick($this->getReference('video'. mt_rand(1, 5)))
            ;

            $this->addReference('trick'.$d , $trick);

            $manager->persist($trick);

            $manager->flush();

        }
    }

    public function getDependencies()
    {
        return array(
            PictureFixtures::class,
            VideoFixtures::class
        );
    }
}