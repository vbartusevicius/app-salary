<?php

namespace Vb\Bundle\SalaryProviderBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\SalaryProviderInterface;
use Vb\Bundle\SalaryProviderBundle\Service\SalaryProvider\Sodra\SodraSalaryUpdater;

class UpdateSodraSalariesCommand extends Command
{
    private $salaryUpdater;

    public function __construct(SalaryProviderInterface $salaryUpdater)
    {
        parent::__construct();
        $this->salaryUpdater = $salaryUpdater;
    }

    protected function configure()
    {
        $this
            ->setName('vb:salary-provider:update-salaries')
            ->setDescription('Updates Companies salaries')
            ->addArgument(
                'period',
                InputArgument::OPTIONAL,
                '',
                (new \DateTime())->format('Y-m')
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $periodSpec = $input->getArgument('period');
        $period = new \DateTime(sprintf('%s-%s', $periodSpec, '01'));

        $this->salaryUpdater->updateSalaryInfo($period);
    }
}
