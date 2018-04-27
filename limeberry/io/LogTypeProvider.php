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

namespace limeberry\io
{
      
    
    
    /**
     * This class provides log types for logger class.
     */
    class LogTypeProvider
    {
        /**
         * Log Output Type: Error
         * @return string
         */
        public static function Error()
        {
            return 0;
        }
        
        /**
         * Log Output Type: Warning
         * @return string
         */
        public static function Warning()
        {
            return 1;
        }
        
        /**
         * Log Output Type: OutputMessage
         * @return string
         */
        public static function OutputMessage()
        {
            return 2;
        }
        

    }
}
?>