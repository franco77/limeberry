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
namespace limeberry\helpers
{
    use limeberry\io\SpecialDirectory as sd;
    
    /**
     * Language class is used to create applications with multiple language.
     */
    class Language
    {
        
        private $lang_file = "";
        private $var_name = "data";
        
        public function __construct() 
        {
            $this->lang_file = "";
            $this->var_name = "";
            
            return $this;
        }

        /**
         * 
         * @param string $langiage_file_name Language file name, example: default.en.php
         */
        public static function isAvailable($langiage_file_name = "Default.php")
        {
            if(file_exists(sd::LanguageFolder().DS.$langiage_file_name))
            {
                return true;
            }else
            {
                return false;
            }
        }
        
        /**
         * Set a language file.
         * @param string $langiage_file_name Language file name, example: default.en.php
         */
        public function setLanguage($langiage_file_name = "Default.php")
        {
            $this->lang_file = sd::LanguageFolder().DS.$langiage_file_name;
           
            return $this;
        }
        
        /**
         * This function is used to lookup for a array varriable name in 
         * your language file. by default $data
         * @param type $variable_name variable name ehich contains your keywords
         */
        public function setVariable($variable_name = "data")
        {
            $this->var_name = $variable_name;
            return $this;
        }
        
        /**
         * Get the value in your language file
         * @param type $array_key Label key in your array
         * @return strıng
         */
        public function bindLanguage()
        {
            if(file_exists($this->lang_file))
            {
                include $this->lang_file;
                
                $var = $this->var_name;
                $data = ${$var};
                return $data;
            }
        }
        
        /**
         * @ignore
         */
        private function clearVariables()
        {
            $this->var_name = "";
            $this->lang_file = "";
        }
    }
}

?>