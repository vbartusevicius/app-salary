<?php

namespace Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra\Transformer;

use Paysera\Component\Serializer\Transformer\TransformerInterface;
use Vb\Bundle\CompanySalaryBundle\Entity\Salary;
use Vb\Bundle\SalaryProviderBundle\Entity\Sodra\SalaryEntry;

class SalaryTransformer implements TransformerInterface
{
    /**
     * @param SalaryEntry $data
     *
     * @return Salary
     */
    public function transform($data)
    {
        $salary = new Salary();

        $salary
            ->setEmployedAverage($data->getEmployedAverage())
            ->setCopyrightAverage($data->getCopyrightAverage())
            ->setTotalSsi($data->getTotalSsi())
            ->setDatePeriod($data->getPeriod())
        ;

        return $salary;
    }
}
