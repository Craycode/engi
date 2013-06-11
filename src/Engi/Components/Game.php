<?php
namespace Engi\Components;

class Game
{
	protected $_world;
	protected $_commandManager;

	public function __construct(CommandManager $commandManager)
	{
		$this->_commandManager = $commandManager;
	}

	public function setWorld(World $world)
	{
		$this->_world = $world;
	}

	public function setCommandManager(CommandManager $commandManager)
	{
		$this->_commandManager = $commandManager;
	}
}