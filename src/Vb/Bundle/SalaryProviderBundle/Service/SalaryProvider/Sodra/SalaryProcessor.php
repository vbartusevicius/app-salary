<?php

namespace Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra;

use Vb\Bundle\SalaryProviderBundle\Entity\Sodra\SalaryEntry;
use Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra\Normalizer\SalaryEntryNormalizer;

class SalaryProcessor
{
    const LINE_DATE = 3;
    const LINE_DATA = 12;

    private $salaryEntryNormalizer;

    public function __construct(
        SalaryEntryNormalizer $salaryEntryNormalizer
    ) {
        $this->salaryEntryNormalizer = $salaryEntryNormalizer;
    }

    /**
     * @param resource $resource
     * @param \DateTime $period
     * @return SalaryEntry[]|\Generator|null
     */
    public function processCsvResource($resource, \DateTime $period)
    {
        $line = 0;
        while (($data = fgetcsv($resource, null, ';')) !== false) {
            if ($line < self::LINE_DATE) {
                $line++;
                continue;
            }

            if ($line === self::LINE_DATE && !$this->isExpectedPeriod(trim($data[2]), $period)) {
                return null;
            }

            if ($line < self::LINE_DATA) {
                $line++;
                continue;
            }

            yield $this->processLine($data, $period);
        }

        fclose($resource);
    }

    private function processLine(array $data, \DateTime $period)
    {
        return $this->salaryEntryNormalizer->mapToEntity([
            'company_code' => trim($data[0]),
            'insurer_code' => trim($data[1]),
            'employed_average' => $this->convertPeriod(trim($data[2])),
            'copyright_average' => $this->convertPeriod(trim($data[3])),
            'total_ssi' => $this->convertPeriod(trim($data[4])),
            'period' => $period->format('Y-m-d'),
        ]);
    }

    private function convertPeriod(string $number)
    {
        return str_replace(',', '.', $number);
    }

    private function isExpectedPeriod(string $date, \DateTime $period)
    {
        $currentPeriod = iconv('CP1257', 'UTF8', $date);
        $givenPeriod = sprintf('už %s metus %s mėnesį', $period->format('Y'), $period->format('m'));

        return $currentPeriod === $givenPeriod;
    }
}
