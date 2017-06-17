<?php

namespace Vb\Bundle\CompanySalaryBundle\Service;

use Doctrine\ORM\EntityManager;
use Vb\Bundle\CompanySalaryBundle\Entity\Company;
use Vb\Bundle\CompanySalaryBundle\Repository\CompanyRepository;

class CompanyManager
{
    private $companyRepository;
    private $entityManager;

    public function __construct(
        CompanyRepository $companyRepository,
        EntityManager $entityManager
    ) {
        $this->companyRepository = $companyRepository;
        $this->entityManager = $entityManager;
    }

    public function getCompanyByCode(string $code)
    {
        return $this->companyRepository->findOneByCode($code);
    }

    public function createCompany(string $code)
    {
        $company = new Company();
        $company
            ->setCode($code)
        ;
        $this->entityManager->persist($company);

        return $company;
    }
}
