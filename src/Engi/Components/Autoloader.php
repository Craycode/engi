<?php
namespace Engi\Components;

class Autoloader
{
	const PATH_COMPOSER_AUTOLOAD = 'vendor/autoload.php';
	
	public static function autoload()
	{
		require_once self::PATH_COMPOSER_AUTOLOAD;
	}
}