<?php

namespace Vb\Bundle\CompanySalaryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Company
 */
class Company
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $code;

    /**
     * @var Salary[]|ArrayCollection
     */
    private $salaries;

    /**
     * @var EmployeeInfo[]|ArrayCollection
     */
    private $employeeInfo;

    public function __construct()
    {
        $this->salaries = new ArrayCollection();
        $this->employeeInfo = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Company
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return ArrayCollection|Salary[]
     */
    public function getSalaries()
    {
        return $this->salaries;
    }

    /**
     * @param ArrayCollection|Salary[] $salaries
     *
     * @return Company
     */
    public function setSalaries($salaries)
    {
        $this->salaries->clear();
        foreach ($salaries as $salary) {
            $this->addSalary($salary);
        }

        return $this;
    }

    /**
     * @param Salary $salary
     * @return $this
     */
    public function addSalary($salary)
    {
        if (!$this->salaries->contains($salary)) {
            $this->salaries->add($salary);
            $salary->setCompany($this);
        }

        return $this;
    }

    /**
     * @return ArrayCollection|EmployeeInfo[]
     */
    public function getEmployeeInfo()
    {
        return $this->employeeInfo;
    }

    /**
     * @param ArrayCollection|EmployeeInfo[] $employeeInfo
     *
     * @return Company
     */
    public function setEmployeeInfo($employeeInfo)
    {
        $this->employeeInfo->clear();
        foreach ($employeeInfo as $item) {
            $this->addEmployeeInfo($item);
        }

        return $this;
    }

    /**
     * @param EmployeeInfo $employeeInfo
     * @return $this
     */
    public function addEmployeeInfo($employeeInfo)
    {
        if (!$this->employeeInfo->contains($employeeInfo)) {
            $this->employeeInfo->add($employeeInfo);
            $employeeInfo->setCompany($this);
        }

        return $this;
    }
}

