<?php

namespace App\DataFixtures;

use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SectionFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i <50 ; $i++) { 
            $faker = Factory::create("fr_FR");
            $Section = new Section();
            $Section->setDesignation($faker->word);
            $manager->persist($Section);

        }
        $manager->flush();
    }
}
