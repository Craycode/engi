<?php
namespace Engi\Components;

class World extends Object
{
	const IDENTIFIER_PLAYER = 'player';
	const FILENAME = 'world';

	public function setPlayer(Player $player)
	{
		$this->addContained($player, self::IDENTIFIER_PLAYER);
	}

	public function getPlayer()
	{
		return $this->getContained(self::IDENTIFIER_PLAYER);
	}
}