<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Animal;
use App\Entity\Espece;
use App\Entity\Continent;

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

        $e3 = new Espece();
        $e3->setLibelle('Felis silvestris')->setDescription('mange des souris et des oiseaux');
        $manager->persist($e3);

        $continent1=new Continent() ;
        $continent1->setLibelle("Europe");
        $manager->persist($continent1);


        $continent2=new Continent() ;
        $continent2->setLibelle("Afrique");
        $manager->persist($continent2);

        $a1 = new Animal();
        $a1->setColor('black')->setNom("panthère")->setFamille("Felidae")->setPoids(80)->setEspece($e1)->addContinent($continent2);
        $manager->persist($a1);

        $a2 = new Animal();
        $a2->setColor('yellow')->setNom("girafe")->setFamille("girafidae")->setPoids(200)->setEspece($e2)->addContinent($continent2);
        $manager->persist($a2);

        $a3 = new Animal();
        $a3->setColor('black')->setNom("chat")->setFamille("Felidae")->setPoids(10)->setEspece($e3)->addContinent($continent2)->addContinent($continent1);
        $manager->persist($a3);


        $manager->flush();
    }
}
