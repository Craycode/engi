<?php
namespace Engi\Components;

class ObjectCollection extends \ArrayObject
{

	public function __construct($array = null)
	{
		parent::__construct(array());

		if ($array && is_array($array))
		{
			foreach ($array as $obj)
			{
				if (!$obj instanceof Object)
				{
					throw new InvalidArgumentException('Object Collection only takes array of Object as parameter');
				}

				$this->offsetSet($obj->id, $obj);
			}
		}

		if ($array && $array instanceof Object)
		{
			$this->offsetSet($array->id, $array);
		}
	}

	public function add(Object $object, $index = null)
	{
		if ($index)
		{
			$this->offsetSet($index, $object);
		}
		else
		{
			$this->offsetSet($object->id, $object);
		}
	}

	public function remove($id)
	{
		if (!$this->offsetExists($id))
		{
			return false;
		}

		$removed = $this->offsetGet($id);
		$this->offsetUnset($id);

		return $removed;
	}

	public function get($id)
	{
		if (!$this->offsetExists($id))
		{
			return false;
		}

		return $this->offsetGet($id);
	}
}