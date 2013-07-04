<?php

namespace Engi\Components\Application\Commands;

use Engi\Application;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Engi\Components\Application\ApplicationCommand;

class HelloCommand extends ApplicationCommand
{

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$name = $input->getArgument('name');

		/* @var $app Application */
		$app = $this->_container->get('application');
		$cname = $app->getLongVersion();

		$output->writeln(sprintf("Hello %s! How are you? My version is %s.", $name ? : 'buddy', $cname));
	}
}
