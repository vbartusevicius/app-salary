<?php

namespace Vb\Bundle\SalaryProviderBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra\SodraSalaryUpdater;

class UpdateSodraSalariesCommand extends Command
{
    private $salaryUpdater;

    public function __construct(SodraSalaryUpdater $salaryUpdater)
    {
        parent::__construct();
        $this->salaryUpdater = $salaryUpdater;
    }

    protected function configure()
    {
        $this
            ->setName('vb:update-salaries:sodra')
            ->setDescription('Updates Companies salaries from SODRA')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->salaryUpdater->updateSalaries(new \DateTime());
    }
}
