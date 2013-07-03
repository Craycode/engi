<?php

namespace Engi\Components\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RunCommand extends Command
{

	protected function configure()
	{
		$this->setName('run')
			->setDescription('Run the application')
			->addOption('mode', null, InputOption::VALUE_OPTIONAL);
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$mode = $input->getOption('mode');

		switch ($mode)
		{
			case 'test':
				$output->writeln('Running the application in '.$mode.' mode.');

				/* @var $container \Symfony\Component\DependencyInjection\ContainerBuilder */
				$container = $this->getApplication()->getContainer();

				/* @var $runner \Engi\Components\ApplicationRunner */
				$runner = $container->get('application_runner');

				$runner->setHelperSet($this->getHelperSet());
				$runner->setInput($input);
				$runner->setOutput($output);
				$runner->run();

				break;

			default:
				$output->writeln('Running the application in default mode.');
				break;
		}
	}
}