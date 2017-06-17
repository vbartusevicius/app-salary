<?php

namespace Vb\Bundle\CompanySalaryBundle\Normalizer;

use Paysera\Component\Serializer\Normalizer\DenormalizerInterface;
use Vb\Bundle\CompanySalaryBundle\Entity\Salary;

class SalaryNormalizer implements DenormalizerInterface
{
    /**
     * @param array $data
     * @return Salary
     */
    public function mapToEntity($data)
    {
        $salary = new Salary();

        if (isset($data['employed_average'])) {
            $salary->setEmployedAverage($data['employed_average']);
        }
        if (isset($data['copyright_average'])) {
            $salary->setCopyrightAverage($data['copyright_average']);
        }
        if (isset($data['total_ssi'])) {
            $salary->setTotalSsi($data['total_ssi']);
        }
        if (isset($data['date_period'])) {
            $salary->setDatePeriod($data['date_period']);
        }

        return $salary;
    }
}
