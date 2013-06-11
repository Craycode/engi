<?php
namespace Engi\Components;

class Person extends Object
{
	protected $_name = '';
	
	public function __construct($name = null)
	{
		parent::__construct();
		
		if($name)
		{
			$this->_name = $name;
		}
		else
		{
			$this->_name = 'Adam'.strval(rand(1000, 9999));
		}
	}

	public function speak()
	{
		echo "Hello, my name is " . $this->_name . ".";
	}
}