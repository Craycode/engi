<?php

namespace Engi\Components;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Helper\ProgressHelper;
use Symfony\Component\Console\Helper\TableHelper;
use Symfony\Component\Console\Helper\DialogHelper;

class ApplicationRunner
{
	/**
	 * Container builder.
	 * 
	 * @var ContainerBuilder
	 */
	protected $_container;

	/**
	 * Helper set.
	 * 
	 * @var HelperSet 
	 */
	protected $_helperSet;

	/**
	 * Input interface.
	 * 
	 * @var InputInterface
	 */
	protected $_input;

	/**
	 * Output interface.
	 * 
	 * @var OutputInterface
	 */
	protected $_output;

	/**
	 * Application command list.
	 * 
	 * @var Application\ApplicationCommandList
	 */
	protected $_commandList;

	/**
	 * Progress helper.
	 * 
	 * @var ProgressHelper
	 */
	protected $_progressHelper;

	/**
	 * Table helper.
	 * 
	 * @var TableHelper
	 */
	protected $_tableHelper;

	/**
	 * Dialog helper.
	 * 
	 * @var DialogHelper
	 */
	protected $_dialogHelper;

	/**
	 * Application start time.
	 * 
	 * @var integer
	 */
	protected $_startTime;

	/**
	 * Constructor.
	 * 
	 * @param ContainerBuilder $container
	 */
	public function __construct(ContainerBuilder $container, Application\ApplicationCommandList $commandList)
	{
		$this->_container = $container;
		$this->_commandList = $commandList;
	}

	protected function _configure()
	{
		$this->_output->writeln('Initial loading...');
		$this->_progressHelper->setFormat(ProgressHelper::FORMAT_QUIET);
		$this->_progressHelper->setRedrawFrequency(5);
		$this->_progressHelper->start($this->_output, 50);

		$progress = 0;

		while ($progress < 50)
		{
			usleep(rand(0, 1000000));
			$change = rand(50, 50);
			$progress += $change;
			$this->_progressHelper->advance($change);
		}

		$this->_progressHelper->finish();
	}

	/**
	 * Run the application.
	 */
	public function run()
	{
		/**
		 * Pre-setup.
		 */
		$this->_configure();

		/**
		 * Set start time.
		 */
		$this->_startTime = time();

		/**
		 * Application loop.
		 */
		while (true)
		{
			$second = 1000000;
			usleep(intval($second / 10));
			$this->_run_loop();
		}
	}

	public function show_help()
	{
		$table = clone $this->_tableHelper;
		$table->setLayout(TableHelper::LAYOUT_BORDERLESS);
		$table->setHeaders(array('Available Commands'));
		$names = array_keys($this->_commandList->getCommands());
		$table->addRow(array(implode(', ', $names)));

		$table->render($this->_output);
	}

	public function get_input()
	{
		$command_list = array_keys($this->_commandList->getCommands());
		$input = $this->_dialogHelper->ask($this->_output, 'Command: ', '', $command_list);
		$inputDefinition = $this->_container->get('input_definition');

		$commandInput = new Application\ApplicationCommandInput($input, $inputDefinition);

		if ($input == 'help')
		{
			$this->show_help();
		}
		else
		{
			$this->_commandList->run($commandInput, $this->_output);
		}
	}

	protected function _run_loop()
	{
		$this->get_input();
	}

	/**
	 * Set helper set.
	 * 
	 * @param HelperSet $helperSet
	 */
	public function setHelperSet(HelperSet $helperSet)
	{
		$this->_helperSet = $helperSet;
		$this->_progressHelper = $this->_helperSet->get('progress');
		$this->_tableHelper = $this->_helperSet->get('table');
		$this->_dialogHelper = $this->_helperSet->get('dialog');
	}

	/**
	 * Set input interface.
	 * 
	 * @param InputInterface $input
	 */
	public function setInput(InputInterface $input)
	{
		$this->_input = $input;
	}

	/**
	 * Set output interface.
	 * 
	 * @param OutputInterface $output
	 */
	public function setOutput(OutputInterface $output)
	{
		$this->_output = $output;
	}
}
