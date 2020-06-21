<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CompanyFixtures extends Fixture
{
    public const COMPANY_PREFIX = 'company';
    public const NUMBERS_OF_COMPANY = 10;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for($i = 1; $i <= self::NUMBERS_OF_COMPANY; $i++) {
            $company = new Company();
            $company->setName($faker->company);
            $companyKey = self::COMPANY_PREFIX . '_' . $i;
            $this->addReference($companyKey, $company);

            $manager->persist($company);
        }

        $manager->flush();
    }
}
