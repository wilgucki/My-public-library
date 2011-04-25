<?php
/**
 * My public library
 *
 * @author Maciej Wilgucki
 * @copyright (c) 2011 Maciej Wilgucki <http://blog.wilgucki.pl>
 * @license http://blog.wilgucki.pl/license/new-bsd New BSD License
 * @version 0.1
 */
namespace Batman;

/**
 * Base Enum class
 */
abstract class Enum
{
	/**
	 * Defined class constants
	 * @var array
	 */
	private static $_consts = array();
	
	/**
	 * Prevents from creating Enum object
	 * @throws \ErrorException
	 */
	final public function __construct()
	{
		throw new \ErrorException('Can\'t create object from enum');
	}
	
	/**
	 * Returns defined class constansts as an associative array
	 * @throws \BadMethodCallException
	 * @return array
	 */
	final static private function getConstants()
	{
        $class = get_called_class();
		if(!isset(self::$_consts[$class])) {
			if($class == __CLASS__) {
				throw new \BadMethodCallException('You can\'t access constants from Enum class');
			}
			$reflection = new \ReflectionClass($class);
			self::$_consts[$class] = $reflection->getConstants();
		}
		return self::$_consts[$class];
	}
	
	/**
	 * Returns defined names
	 * @return array
	 */
	final static public function getNames()
	{
		return array_keys(self::getConstants());
	}
	
	/**
	 * Returns defined values
	 * @return array
	 */
	final static public function getValues()
	{
		return array_values(self::getConstants());
	}

    /**
     * Returns defined constants as array
     * @return array
     */
    final static public function toArray()
    {
        return self::getConstants();
    }
}