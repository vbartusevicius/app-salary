<?php

namespace Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra\Normalizer;

use Doctrine\Common\Collections\ArrayCollection;
use Paysera\Component\Serializer\Normalizer\DenormalizerInterface;
use Vb\Bundle\SalaryProviderBundle\Entity\Sodra\SalaryEntry;

class SalaryEntryNormalizer implements DenormalizerInterface
{
    /**
     * @param array $data
     *
     * @return SalaryEntry
     */
    public function mapToEntity($data)
    {
        $entry = new SalaryEntry();
        $coll = new ArrayCollection($data);

        $entry
            ->setCompanyCode($coll->get('company_code'))
            ->setInsurerCode($coll->get('insurer_code'))
            ->setEmployedAverage($coll->get('employed_average'))
            ->setCopyrightAverage($coll->get('copyright_average'))
            ->setTotalSsi($coll->get('total_ssi'))
        ;

        if ($coll->get('period') !== null) {
            $entry->setPeriod(new \DateTime($coll->get('period')));
        }

        return $entry;
    }
}
