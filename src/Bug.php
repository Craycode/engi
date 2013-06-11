<?php

/**
 * @Entity @Table(name="bugs")
 * */
class Bug
{
	/** @Id @Column(type="integer") @GeneratedValue * */
	protected $id;

	/** @Column(type="string") * */
	protected $name;
	
	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getId()
	{
		return $this->id;
	}

	public function speak()
	{
		echo "Hello";
	}
}