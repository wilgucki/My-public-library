<?php
namespace Batman;

abstract class Enum
{
	private static $_consts = null;
	
	final public function __construct()
	{
		throw new \ErrorException('Can\'t create object from enum');
	}
	
	final static private function getConstants()
	{
		if(self::$_consts === null) {
			$class = get_called_class();
			if($class == __CLASS__) {
				throw new \BadMethodCallException('You can\'t access constants from Enum class');
			}
			$reflection = new \ReflectionClass($class);
			self::$_consts = $reflection->getConstants();
		}
		return self::$_consts;
	}
	
	final static public function getNames()
	{
		return array_keys(self::getConstants());
	}
	
	final static public function getValues()
	{
		return array_values(self::getConstants());
	}
}