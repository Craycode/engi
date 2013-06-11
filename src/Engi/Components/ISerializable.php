<?php
namespace Engi\Components;

interface ISerializable
{
	public function serialize();
	public static function unserialize($serialized);
}