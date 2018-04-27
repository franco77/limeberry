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
    #require_once('..\base.php');
    /**
     * @ignore 
     */
    define("ModeRequire", 0);

    /**
     * @ignore 
     */
    define("ModeRequireOnce", 1);
    /**
     * @ignore 
     */
    define("ModeInclude", 2);
    /**
     * @ignore 
     */
    define("ModeDefault", 2);
    /**
     * @ignore 
     */
    define("ModeIncludeOnce", 3);


    /**
    * A helper class to load thir party libraries to your code
    **/
    class Library
    {

        function __construct()
        {
        }

        private static function checkFile($filepath)
        {
                if(file_exists($filepath))
                {
                        return true;
                }else {return false;}
        }

        /**
        *	Loads a third party class. (Class must be in Library folder)
        *	@param string $filename File name.
        *	@param mixed $type Load type for class (Available Modes:ModeDefault,ModeRequire,ModeRequireOnce,ModeInclude,ModeIncludeOnce)
        *	@return void
        */
        public static function Load($filename='', $type=2)
        {

                global $application_folder;
                $filepath = ROOT.DS.$application_folder.DS.'library'.DS.$filename;
                if(self::checkFile($filepath))
                {
                                switch ($type) {
                                case 0:
                                        #mode:require
                                        require($filepath);
                                        break;
                                case 1:
                                        #mode:Require_Once
                                        require_once($filepath);
                                        break;
                                case 2:
                                        #mode:include
                                        include($filepath);
                                        break;

                                case 3:
                                        #mode:include_once
                                        include_once($filepath);
                                        break;

                                default:
                                        include_once($filepath);
                                        break;
                        }
                }

        }

        /**
        *	Loads a Limeberry configuration file (File must not be in Library folder.)
        *	@param string $filename File name.
        *	@param mixed $type Load type for class (Available Modes:ModeDefault,ModeRequire,ModeRequireOnce,ModeInclude,ModeIncludeOnce)
        *	@return void
        */
        public static function LoadConfig($filename='', $type=2)
        {
                global $application_folder;

                $filepath = ROOT.DS.$application_folder.DS.$filename;
                if(self::checkFile($filepath))
                {
                                switch ($type) {
                                case 0:
                                        #mode:require
                                        require($filepath);
                                        break;
                                case 1:
                                        #mode:Require_Once
                                        require_once($filepath);
                                        break;
                                case 2:
                                        #mode:include
                                        include($filepath);
                                        break;

                                case 3:
                                        #mode:include_once
                                        include_once($filepath);
                                        break;

                                default:
                                        include_once($filepath);
                                        break;
                        }
                }	
        }


        /**
        *	Checks if file is available
        *	@param string $filename File path and file name ex: "Library\test.php"
        *	@return bool
        */
        public static function isAvailable($filename=null)
        {
                global $application_folder;
                $filepath = ROOT.DS.$application_folder.DS.'library'.DS.$filename;
                if(file_exists($filepath))
                {
                        return true;
                }else {return false;}
        }
    }
}

?>