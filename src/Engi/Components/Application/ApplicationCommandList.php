<?php

namespace Engi\Components\Application;

use Symfony\Component\Console\Output\OutputInterface;

class ApplicationCommandList
{
	/**
	 * Command list.
	 * 
	 * @var array Array of Application_Command commands
	 */
	protected $_commands;

	/**
	 * Add command to the list.
	 * 
	 * @param \Engi\Components\Application\ApplicationCommand $command
	 * 
	 * @throws \InvalidArgumentException Command is of invalid type.
	 */
	public function addCommand(ApplicationCommand $command)
	{
		$this->_commands[$command->getName()] = $command;
	}

	/**
	 * Determines whether the list contains the command of given name.
	 * 
	 * @param string $command
	 */
	public function has($command)
	{
		return isset($this->_commands[$command]);
	}

	/**
	 * Get application commands array.
	 * 
	 * @return array
	 */
	public function getCommands()
	{
		return $this->_commands;
	}

	/**
	 * Run an application command by name.
	 * 
	 * @param type $command
	 */
	public function run(ApplicationCommandInput $input, OutputInterface $output)
	{
		$commandName = $input->getArgument('command_name');

		if ($this->has($commandName))
		{
			$this->_commands[$commandName]->run($input, $output);
		}
	}
}