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
    use limeberry\Configuration;
    
    /**
     * This library contains functions which provides you access to special application directories
     * like controller folder, view folder etc..
     */
    class SpecialDirectory
    {

        /**
        * Get where application is running from.
        * @return string
        */
        public static function ApplicationFolder()
        {
            return ROOT.DS.Configuration::getApplicationFolder();
        }

        /**
        * Special directory of Limeberry framework.
        * @return string
        */
        public static function FrameworkFolder()
        {
            return ROOT.DS.'limeberry';
        }



        /**
        * Controller directory of Limeberry framework.
        * @return string
        */
        public static function ControllerFolder()
        {
            return ROOT.DS.Configuration::getApplicationFolder().DS.'controller';
        }

        /**
        * Config directory of Limeberry framework.
        * @return string
        */
        public static function ConfigFolder()
        {
            return ROOT.DS.Configuration::getApplicationFolder().DS.'config';
        }

        /**
        * Library  directory of Limeberry framework.
        * @return string
        */
        public static function LibraryFolder()
        {
            return ROOT.DS.Configuration::getApplicationFolder().DS.'library';
        }

        /**
        * Language  directory of Limeberry framework.
        * @return string
        */
        public static function LanguageFolder()
        {
            return ROOT.DS.Configuration::getApplicationFolder().DS.'language';
        }


        /**
        * Model directory of Limeberry framework.
        * @return string
        */
        public static function ModelFolder()
        {
            return ROOT.DS.Configuration::getApplicationFolder().DS.'model';	
        }

        /**
        * Output directory of Limeberry framework.
        * @return string
        */
        public static function OutputFolder()
        {
            return ROOT.DS.Configuration::getApplicationFolder().DS.'output';	
        }

        /**
        * Template directory of Limeberry framework.
        * @return string
        */
        public static function TemplateFolder()
        {
            return ROOT.DS.Configuration::getApplicationFolder().DS.'template';
        }

        /**
        * View directory of Limeberry framework.
        * @return string
        */
        public static function ViewFolder()
        {
            return ROOT.DS.Configuration::getApplicationFolder().DS.'view';
        }

    }
}


?>