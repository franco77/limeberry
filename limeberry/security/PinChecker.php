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
namespace limeberry\security
{
    /**
    * A pin chechker class for taking control and managing operations. 
    * This class is a derivative of Object Mapper class
    **/
    class PinChecker
    {

        private static $pinlist = array();


        /**
        * Map new pins
        * @var string $pinName set name for pin
        * @var string $pincode set pin
        * @return void
        **/
        public static function MapPin($pinName, $pincode)
        {
            self::$pinlist[$pinName] = $pincode;
        }

        /**
        * Check if pin is true and continue to process.
        * @var string $pinfor Pin for
        * @var string $pincode Pin code
        **/
        public static function CheckPin($pinfor, $pincode)
        {
            if(self::$pinlist[$pinfor] == $pincode)
            {
                return true;
            }else{
                return false;
            }

        }

        /**
         * Clear all mapped pins.
         */
        public static function Clear()
        {
            self::$pinlist = null;
        }


    }

}

?>