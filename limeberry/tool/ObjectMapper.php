<?php

/**
*	Limeberry Framework
*	
*	a php framework for fast web development.
*	
*	@package Limeberry Framework
*	@author Sinan SALIH
*	@copyright Copyright (C) 2018 Sinan SALIH
*	
**/
namespace limeberry\tool
{
	/**
	*		Object mapper tool for Limeberry
	*		Use it to map such a configuration to use globally in your code.
	*		Objects can be defined in Application Class / Register() Function
	**/
	class ObjectMapper
	{
            private static $objList = array();


            /**
            *	Map new variable for use it globally
            *	@param string $objName Name for configuration
            *	@param string  $objPath data you want to map
            *	@return void
            */
	    public static function MapNew($objName, $objPath)
            {
	        self::$objList[$objName] = $objPath;
	    }


            /**
            *	Get a value from map list
            *	@param string $objName Name of object
            *	@return mixed type
            */
	    public static function GetValue($objName)
            {
	       return self::$objList[$objName];
	    }
	}
}

?>