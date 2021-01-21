<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Animal;
use App\Entity\Espece;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $e1 = new Espece();
        $e1->setLibelle('Panthera pardus')->setDescription('mange de la viande');
        $manager->persist($e1);

        $e2 = new Espece();
        $e2->setLibelle('Giraffa camelopardalis')->setDescription('mange des feuilles');
        $manager->persist($e2);

        $a1 = new Animal();
        $a1->setColor('black')->setNom("panthère")->setFamille("felinidae")->setPoids(80)->setEspece($e1);
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setColor('yellow')->setNom("girafe")->setFamille("girafidae")->setPoids(200)->setEspece($e2);
        $manager->persist($a2);


        $manager->flush();
    }
}
