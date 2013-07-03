<?php

namespace Engi\Components\Application\Commands;

use Engi\Components\Application;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Engi\Components\Application\ApplicationCommand;

class HelloCommand extends ApplicationCommand
{
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$name = $input->getArgument('name');

		$output->writeln(sprintf("Hello %s! How are you?", $name ?: 'buddy'));
	}
}
