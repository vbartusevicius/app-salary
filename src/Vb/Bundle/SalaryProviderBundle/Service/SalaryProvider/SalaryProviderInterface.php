<?php

namespace Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider;

interface SalaryProviderInterface
{
    public function updateSalaryInfo(\DateTime $period);
}
