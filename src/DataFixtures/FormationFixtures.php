<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class FormationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $companyList = $this->retrieveCompanyList();

        for($i = 0; $i < 20; $i++) {
            $formation = new Formation();
            $randomCompanyKey = array_rand($companyList);
            $formation->setTitle($faker->jobTitle)
                 ->setDescription($faker->text)
                 ->setCompany($companyList[$randomCompanyKey])
                 ->setImage('https://via.placeholder.com/350x200');

             $manager->persist($formation);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CompanyFixtures::class
        ];
    }

    private function retrieveCompanyList() {
        $numberOfCompany = CompanyFixtures::NUMBERS_OF_COMPANY;
        $companyPrefix = CompanyFixtures::COMPANY_PREFIX;

        for($i = 1; $i <= $numberOfCompany; $i++) {
            $companyKey = $companyPrefix . '_' . $i;
            $companyList[] = $this->getReference($companyKey);
        }
        return $companyList;
    }
}
