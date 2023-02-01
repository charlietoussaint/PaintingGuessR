<?php

namespace App\DataFixtures;

use App\Entity\ArtMovment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Painting;

class ArtMovmentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movments = [
            [
                'artMovmentName' => 'Romantisme',
                'artMovmentDate' => '1800 à 1850',
                'artMovmentDescription' => "Le mouvement romantique en peinture se caractérise par l'utilisation de couleurs vives et de sujets passionnés, souvent inspirés de l'histoire, de la mythologie, de la nature et de l'imagination personnelle.",
            ],
            [
                'artMovmentName' => 'Impressionisme',
                'artMovmentDate' => '1880 à 1880',
                'artMovmentDescription' => "L'impressionnisme est un mouvement artistique en peinture qui a émergé en France au milieu du XIXe siècle.",
            ],
        ];

        foreach ($movments as $key => $movment) {
            $newMovment = new ArtMovment();
            $newMovment->setArtMovmentName($movment['artMovmentName']);
            $newMovment->setArtMovmentDate($movment['artMovmentDate']);
            $newMovment->setArtMovmentDescription($movment['artMovmentDescription']);
            $this->addReference($movment['artMovmentName'], $newMovment);
            $manager->persist($newMovment);
        }

        $manager->flush();
    }
}
