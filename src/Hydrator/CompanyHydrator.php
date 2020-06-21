<?php


namespace App\Hydrator;


use App\Entity\Formation;
use App\Repository\CompanyRepository;

class CompanyHydrator implements HydratorInterface
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * CompanyHydrator constructor.
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function hydrate(Formation $formation): void
    {
        $company = $this->companyRepository->find($formation->getCompany()->getId());
        $formation->setCompany($company);
    }

    public function hydrateCollection(array $formations): void
    {
        foreach ($formations as $formation) {
            $this->hydrate($formation);
        }
    }
}
