<?php

namespace Vb\Bundle\SalaryProviderBundle\Entity\Sodra;

class SalaryEntry
{
    /**
     * @var string
     */
    private $companyCode;

    /**
     * @var string
     */
    private $insurerCode;

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
     * @var \DateTime
     */
    private $period;

    /**
     * @return string
     */
    public function getCompanyCode(): string
    {
        return $this->companyCode;
    }

    /**
     * @param string $companyCode
     *
     * @return SalaryEntry
     */
    public function setCompanyCode(string $companyCode): SalaryEntry
    {
        $this->companyCode = $companyCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getInsurerCode(): string
    {
        return $this->insurerCode;
    }

    /**
     * @param string $insurerCode
     *
     * @return SalaryEntry
     */
    public function setInsurerCode(string $insurerCode): SalaryEntry
    {
        $this->insurerCode = $insurerCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmployedAverage(): string
    {
        return $this->employedAverage;
    }

    /**
     * @param string $employedAverage
     *
     * @return SalaryEntry
     */
    public function setEmployedAverage(string $employedAverage): SalaryEntry
    {
        $this->employedAverage = $employedAverage;
        return $this;
    }

    /**
     * @return string
     */
    public function getCopyrightAverage(): string
    {
        return $this->copyrightAverage;
    }

    /**
     * @param string $copyrightAverage
     *
     * @return SalaryEntry
     */
    public function setCopyrightAverage(string $copyrightAverage): SalaryEntry
    {
        $this->copyrightAverage = $copyrightAverage;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotalSsi(): string
    {
        return $this->totalSsi;
    }

    /**
     * @param string $totalSsi
     *
     * @return SalaryEntry
     */
    public function setTotalSsi(string $totalSsi): SalaryEntry
    {
        $this->totalSsi = $totalSsi;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPeriod(): \DateTime
    {
        return $this->period;
    }

    /**
     * @param \DateTime $period
     *
     * @return SalaryEntry
     */
    public function setPeriod(\DateTime $period): SalaryEntry
    {
        $this->period = $period;
        return $this;
    }
}
