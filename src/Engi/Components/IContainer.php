<?php
namespace Engi\Components;

interface IContainer
{
	/**
	 * @return void
	 */
	public function initialiseContained();
	
	/**
	 * @return ObjectCollection
	 */
	public function getContained();
	
	/**
	 * @param Object $object
	 * 
	 * @return Object
	 */
	public function addContained(Object $object);
	
	/**
	 * @param Object $object
	 * 
	 * @return Object
	 */
	public function removeContained($id);
}