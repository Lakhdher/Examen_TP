<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EtudiantFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i <50 ; $i++) { 
            $faker = Factory::create("fr_FR");
            $Etudiant = new Etudiant();
            $Etudiant->setNom($faker->name);
            $Etudiant->setPrenom($faker->firstName);
            $random = rand(1,100);
            $repo = $manager->getRepository(Section::class);
            $Section = $repo -> findOneBy(['id'=>$random],[]);
            $Etudiant->setSection($Section);
            $manager->persist($Etudiant);

        }
        $manager->flush();
    }
}
