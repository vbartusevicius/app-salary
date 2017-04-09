<?php

namespace Vb\Bundle\CompanySalaryBundle\Entity;

/**
 * Salary
 */
class Salary
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
     * @var string
     */
    private $employedAverage;

    /**
     * @var string
     */
    private $copyrightAverage;

    /**
     * @var string
     */
    private $totalSsi;

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
     * @return Salary
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
     * Set employedAverage
     *
     * @param string $employedAverage
     *
     * @return Salary
     */
    public function setEmployedAverage($employedAverage)
    {
        $this->employedAverage = $employedAverage;

        return $this;
    }

    /**
     * Get employedAverage
     *
     * @return string
     */
    public function getEmployedAverage()
    {
        return $this->employedAverage;
    }

    /**
     * Set copyrightAverage
     *
     * @param string $copyrightAverage
     *
     * @return Salary
     */
    public function setCopyrightAverage($copyrightAverage)
    {
        $this->copyrightAverage = $copyrightAverage;

        return $this;
    }

    /**
     * Get copyrightAverage
     *
     * @return string
     */
    public function getCopyrightAverage()
    {
        return $this->copyrightAverage;
    }

    /**
     * Set totalSsi
     *
     * @param string $totalSsi
     *
     * @return Salary
     */
    public function setTotalSsi($totalSsi)
    {
        $this->totalSsi = $totalSsi;

        return $this;
    }

    /**
     * Get totalSsi
     *
     * @return string
     */
    public function getTotalSsi()
    {
        return $this->totalSsi;
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
     * @return Salary
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }
}

