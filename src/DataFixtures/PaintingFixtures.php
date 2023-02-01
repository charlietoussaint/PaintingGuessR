<?php

namespace App\DataFixtures;

use App\Entity\Painting;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PaintingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $paintings = [
            [
                'artMovmentName' => 'Impressionisme',
                'painting_name' => 'La nuit étoilée',
                'painting_URL' => 'starrynight.jpg',
                'painting_date' => '1889',
                'painter_name' => "Vincent Van Gogh",
                'painter_description' => "Le tableau représente ce que Van Gogh pouvait voir et extrapoler de la chambre qu'il occupait dans l'asile du monastère Saint-Paul-de-Mausole à Saint-Rémy-de-Provence en mai 1889.",
                'small_painting_url' => 'Bordeaux',
            ],
            [
                'artMovmentName' => 'Impressionisme',
                'painting_name' => 'Impression, soleil levant',
                'painting_URL' => 'impression.jpg',
                'painting_date' => '1872',
                'painter_name' => "Claude Monet",
                'painter_description' => "Impression, soleil levant est un tableau de Claude Monet conservé au musée Marmottan à Paris, dont le titre donné pour la première exposition impressionniste d'avril 1874 a donné son nom au courant de l'impressionnisme.",
                'small_painting_url' => 'Bordeaux',
            ],
            [
                'artMovmentName' => 'Impressionisme',
                'painting_name' => 'Bal du moulin de la Galette',
                'painting_URL' => 'bal.jpg',
                'painting_date' => '1876',
                'painter_name' => "Auguste Renoir",
                'painter_description' => "La scène, éclairée par une lumière qui passe à travers les feuilles, se déroule au moulin de la Galette, sur la butte Montmartre, à Paris.",
                'small_painting_url' => 'Bordeaux',
            ],
            [
                'artMovmentName' => 'Impressionisme',
                'painting_name' => "L'Incendie du Parlement",
                'painting_URL' => 'incendie.jpg',
                'painting_date' => '1876',
                'painter_name' => "William Turner",
                'painter_description' => "Dans la nuit du 16 octobre 1834, Turner assiste depuis un bateau sur la Tamise à l'incendie du Parlement qui détruit la Chambre des lords. Il y a quatre peintures exécutées sur ce sujet.",
                'small_painting_url' => 'Bordeaux',
            ],
            [
                'artMovmentName' => 'Romantisme',
                'painting_name' => "Saturne dévorant un de ses fils",
                'painting_URL' => 'saturne.jpg',
                'painting_date' => 'Entre 1819 et 1823',
                'painter_name' => "Francisco de Goya",
                'painter_description' => "Saturne dévorant un de ses fils est une des Peintures noires de Francisco de Goya.",
                'small_painting_url' => 'Bordeaux',
            ],
            [
                'artMovmentName' => 'Romantisme',
                'painting_name' => "Le Voyageur contemplant une mer de nuages",
                'painting_URL' => 'mer.jpg',
                'painting_date' => '1818',
                'painter_name' => "Caspar David Friedrich",
                'painter_description' => "Il a été composé à partir de 1818 et est, avec La Mer de glace, l'une des œuvres les plus célèbres du peintre. Il est conservé et exposé à la Kunsthalle de Hambourg1. Cette œuvre appartient au courant artistique du romantisme allemand.",
                'small_painting_url' => 'Bordeaux',
            ],
            [
                'artMovmentName' => 'Romantisme',
                'painting_name' => "Le Radeau de La Méduse",
                'painting_URL' => 'meduse.jpg',
                'painting_date' => '1818 - 1819',
                'painter_name' => "	Théodore Géricault",
                'painter_description' => "Le Radeau de La Méduse est une peinture à l'huile sur toile, réalisée entre 1818 et 1819 par le peintre et lithographe romantique français Théodore Géricault (1791-1824).",
                'small_painting_url' => 'Bordeaux',
            ],
            [
                'artMovmentName' => 'Romantisme',
                'painting_name' => "La liberté guidant le peuple",
                'painting_URL' => 'liberte.jpg',
                'painting_date' => '1830',
                'painter_name' => "Eugène Delacroix",
                'painter_description' => "Peinture historique romantique. Commémore les Trois Glorieuses (la Révolution de Juillet) le 28 juillet 1830.",
                'small_painting_url' => 'liberte.jpg',
            ],
        ];

        foreach ($paintings as $key => $painting) {
            $newPainting = new Painting();
            $newPainting->setPaintingName($painting['painting_name']);
            $newPainting->setPaintingURL($painting['painting_URL']);
            $newPainting->setPaintingDate($painting['painting_date']);
            $newPainting->setPainterDescription($painting['painter_description']);
            $newPainting->setPainterName($painting['painter_name']);
            $newPainting->setSmallPaintingUrl($painting['small_painting_url']);
            $newPainting->setMovmentKey($this->getReference($painting['artMovmentName']));

            $manager->persist($newPainting);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ArtMovmentFixtures::class,
        ];
    }
}
