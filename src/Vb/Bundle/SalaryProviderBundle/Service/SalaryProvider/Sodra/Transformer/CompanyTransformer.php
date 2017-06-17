<?php

namespace Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra\Transformer;

use Paysera\Component\Serializer\Transformer\TransformerInterface;
use Vb\Bundle\CompanySalaryBundle\Entity\Company;
use Vb\Bundle\CompanySalaryBundle\Service\CompanyManager;
use Vb\Bundle\SalaryProviderBundle\Entity\Sodra\SalaryEntry;

class CompanyTransformer implements TransformerInterface
{
    private $companyManager;

    public function __construct(CompanyManager $companyManager)
    {
        $this->companyManager = $companyManager;
    }

    /**
     * @param SalaryEntry $data
     *
     * @return Company
     */
    public function transform($data)
    {
        $company = $this->companyManager->getCompanyByCode($data->getCompanyCode());
        if ($company === null) {
            $company = $this->companyManager->createCompany($data->getCompanyCode());
        }

        return $company;
    }
}
