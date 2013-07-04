<?php

namespace Engi\Components\Application;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Container;

class ApplicationCommand extends Command
{
	/**
	 * Service container.
	 * 
	 * @var Container
	 */
	protected $_container;

	public function __construct(Container $container, $name = null)
	{
		$this->_container = $container;

		parent::__construct($name);
	}
}