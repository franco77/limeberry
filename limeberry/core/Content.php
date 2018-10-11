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
namespace limeberry\core
{
    /**
     * Content class
     * This class is used to create responses except Views
     */
    class Content {
        
        
        /**
         * Print values to screen.
         * @param String $format
         * @param type $args
         */
        public function Render($value="")
        {
            echo $value;
        }
    }
}
