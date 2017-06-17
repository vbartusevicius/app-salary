<?php

namespace Vb\Bundle\CompanySalaryBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Vb\Bundle\CompanySalaryBundle\Entity\Company;

class CompanyRepository extends EntityRepository
{
    /**
     * @param string $code
     * @return null|Company
     */
    public function findOneByCode($code)
    {
        return $this->findOneBy(['code' => $code]);
    }
}
