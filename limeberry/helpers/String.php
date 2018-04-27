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
    
    /**
     * This is a helper class for strings. It's adds various features to srings
     */
    class String
    {
        private $sting_data = "";
        
        
        /**
         * Create a string data variable
         * @param String $sdata String data 
         */
        public function __construct($sdata) 
        {
            $this->sting_data = $sdata;
        }
        
        
        /**
         * Return the string stored
         */
        public function get()
        {
            return $this->sting_data;
        }
        
        
        /**
         * Store a string data
         * @param String $sdata String data 
         */
        public function set($sdata)
        {
            $this->sting_data = $sdata;
            return $this;
        }
        
        /**
         * Convert text to uppercase
         */
        public function toUpper()
        {
            $this->sting_data = strtoupper($this->sting_data);
            return $this;
        }
        
        
        /**
         * Convert  first char to uppercase
         */
        public function toUpperFirst()
        {
            $this->sting_data = ucfirst($this->sting_data);
            return $this;
        }
        
        
        
        /**
         * Convert  first char to lowercase
         */
        public function toLowerFirst()
        {
            $this->sting_data = lcfirst($this->sting_data);
            return $this;
        }
        
         /**
         * Convert text to lowercase
         */
        public function toLower()
        {
            $this->sting_data = strtolower($this->sting_data);
            return $this;
        }
        
        
        /**
         * Add a prefix for each word in string.
         * Returns string each word seperated by string.
         * @param type $prefix char or string
         * @param type $exlode_from delimiter
         */
        public function addPrefix($prefix, $exlode_from = " ")
        {
            $temp = explode($exlode_from, $this->sting_data);
            $data = "";
            foreach ($temp as $value) 
            {
                $data .= $prefix.$value." ";
            }
            return $data;
        }
        
        
        /**
         * Add a suffix for each word in string.
         * Returns string each word seperated by string.
         * @param type $prefix char or string
         * @param type $exlode_from delimiter
         */
        public function addSuffix($suffix, $exlode_from = " ")
        {
            $temp = explode($exlode_from, $this->sting_data);
            $data = "";
            foreach ($temp as $value) 
            {
                $data .= $value.$suffix." ";
            }
            return $data;
        }
        
        
        
        /**
         * Add a suffix and prefix for each word in string.
         * Returns string each word seperated by string.
         * @param type $suffix char or string
         * @param type $prefix char or string
         * @param type $exlode_from delimiter
         */
        public function addSfxPrx($suffix, $prefix, $exlode_from = " ")
        {
            $temp = explode($exlode_from, $this->sting_data);
            $data = "";
            foreach ($temp as $value) 
            {
                $data .= $prefix.$value.$suffix." ";
            }
            return $data;
        }
        
    }
    
}

?>