<?php

namespace Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra;

use Vb\Bundle\SalaryProviderBundle\Entity\Sodra\SalaryEntry;
use Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\SalaryProviderInterface;
use Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra\Transformer\CompanyTransformer;
use Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra\Transformer\SalaryTransformer;

class SodraSalaryUpdater implements SalaryProviderInterface
{
    private $sodraClient;
    private $salaryProcessor;
    private $companyTransformer;
    private $salaryTransformer;

    public function __construct(
        SodraClient $sodraClient,
        SalaryProcessor $salaryProcessor,
        CompanyTransformer $companyTransformer,
        SalaryTransformer $salaryTransformer
    ) {
        $this->sodraClient = $sodraClient;
        $this->salaryProcessor = $salaryProcessor;
        $this->companyTransformer = $companyTransformer;
        $this->salaryTransformer = $salaryTransformer;
    }

    public function updateSalaryInfo(\DateTime $period)
    {
        $resource = $this->sodraClient->getSalariesResource();
        foreach ($this->salaryProcessor->processCsvResource($resource, $period) as $salaryEntry) {
            $this->processSalaryEntry($salaryEntry);
        };
    }

    private function processSalaryEntry(SalaryEntry $salaryEntry)
    {
        $company = $this->companyTransformer->transform($salaryEntry);
        $salary = $this->salaryTransformer->transform($salaryEntry);

        $company->addSalary($salary);
    }
}
