<?php
namespace Batman\Tests;

class EnumTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException ErrorException
	 */
	public function testCreateEnumObject()
	{
		$enum = new \UserStatus();
	}
	
	/**
	 * @expectedException BadMethodCallException
	 */
	public function testGetNamesFromEnumClass()
	{
		\Batman\Enum::getNames();
	}
	
	/**
	 * @expectedException BadMethodCallException
	 */
	public function testGetValuesFromEnumClass()
	{
		\Batman\Enum::getValues();
	}
	
	public function testGetNames()
	{
		$names = \UserStatus::getNames();
		$this->assertTrue(is_array($names));
	}
	
	public function testGetValues()
	{
		$values = \UserStatus::getValues();
		$this->assertTrue(is_array($values));
	}
	
	public function testNamesAmountsEqualsValuesAmount()
	{
		$names = \UserStatus::getNames();
		$values = \UserStatus::getValues();
		$this->assertTrue(count($names) == count($values));
	}
}