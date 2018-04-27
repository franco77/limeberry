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
namespace limeberry
{
    /**
     * This class is used to operate with models
     */
    class Model
    {
        /**
        * This function is used to load a model to other code files
        * @param string $class model file name in 'model' directory
        */
        public static function Load($class="")
        {
            global $application_folder;
            $fileName = $application_folder.DS.'model'.DS.$class.'.php';
            if(file_exists($fileName))
            {
                require_once $fileName;
            }
        }
    }
    
}