<?php

namespace Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra;

class SodraSalaryUpdater
{
    private $sodraClient;
    private $salaryProcessor;

    public function __construct(
        SodraClient $sodraClient,
        SalaryProcessor $salaryProcessor
    ) {
        $this->sodraClient = $sodraClient;
        $this->salaryProcessor = $salaryProcessor;
    }

    public function updateSalaries(\DateTime $period)
    {
        $resource = $this->sodraClient->getSalariesResource();
        $this->salaryProcessor->processCsvResource($resource,  $period);
    }
}
