<?php
namespace Engi\Components;

class Object implements IContainer, ISerializable
{
	const SAVE_PATH = 'objects/';
	const COMPRESSION_LEVEL = 1;

	public $id;
	protected $_container;
	protected $_class;

	/**
	 * @var ObjectCollection
	 */
	protected $_objects;

	public function __construct()
	{
		$this->id = uniqid("", true);
		$this->_class = get_class($this);
		$this->initialiseContained();
	}

	public function getContainer()
	{
		if (!$this->_container)
		{
			return null;
		}

		return $this->_container;
	}

	public function containIn(IContainer $container, $index = null)
	{
		$container->addContained($this, $index);
		$this->_container = $container->id;
	}

	public function initialiseContained()
	{
		$this->_objects = new ObjectCollection;
	}

	public function addContained(Object $object, $index = null)
	{
		$this->_objects->add($object, $index);
	}

	public function getContained($index = null)
	{
		if (!$index)
		{
			return $this->_objects;
		}

		return $this->_objects->get($index);
	}

	public function removeContained($id)
	{
		$this->_objects->remove($id);
	}

	public function serialize()
	{
		return serialize($this);
	}

	public static function unserialize($serialized)
	{
		return unserialize($serialized);
	}

	public function saveToFile($filename = '')
	{
		$path = $filename ? self::SAVE_PATH.$filename : self::SAVE_PATH.$this->id;
		$handle = fopen($path, "w");
		$written = fwrite($handle, gzcompress($this->serialize(), self::COMPRESSION_LEVEL));
		fclose($handle);

		if (!$written)
		{
			return false;
		}

		return $path;
	}

	public static function loadFromFile($filename)
	{
		try
		{
			if (!file_exists($filename))
			{
				throw new InvalidArgumentException('Invalid filename to load object from');
			}

			$serialized = gzuncompress(file_get_contents($filename));
		}
		catch (Exception $e)
		{
			return null;
		}

		return self::unserialize($serialized);
	}
}