<?php

namespace Vb\Bundle\CompanySalaryBundle\Entity;

/**
 * EmployeeInfo
 */
class EmployeeInfo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $datePeriod;

    /**
     * @var int
     */
    private $count;

    /**
     * @var Company
     */
    private $company;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datePeriod
     *
     * @param \DateTime $datePeriod
     *
     * @return EmployeeInfo
     */
    public function setDatePeriod($datePeriod)
    {
        $this->datePeriod = $datePeriod;

        return $this;
    }

    /**
     * Get datePeriod
     *
     * @return \DateTime
     */
    public function getDatePeriod()
    {
        return $this->datePeriod;
    }

    /**
     * Set count
     *
     * @param integer $count
     *
     * @return EmployeeInfo
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     *
     * @return EmployeeInfo
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }
}

