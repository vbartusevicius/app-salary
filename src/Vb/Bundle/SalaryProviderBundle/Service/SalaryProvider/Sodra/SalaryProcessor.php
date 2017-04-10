<?php

namespace Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra;

use Vb\Bundle\CompanySalaryBundle\Entity\Company;

class SalaryProcessor
{
    const LINE_DATE = 3;
    const LINE_DATA = 11;

    /**
     * @param resource $resource
     * @param \DateTime $period
     * @return Company|\Generator|null
     */
    public function processCsvResource($resource, \DateTime $period)
    {
        $line = 0;
        while (($data = fgetcsv($resource, null, ';')) !== false) {
            if ($line < self::LINE_DATE) {
                $line++;
                continue;
            }

            if ($line === self::LINE_DATE && !$this->isExpectedPeriod($data[0], $period)) {
                return null;
            }

            if ($line < self::LINE_DATA) {
                $line++;
                continue;
            }
        }

        fclose($resource);
    }

    private function isExpectedPeriod(string $date, \DateTime $period)
    {
        $currentPeriod = \DateTime::createFromFormat('Y-m-d', $date);
        return $currentPeriod->format('Y-m') === $period->format('Y-m');
    }
}
