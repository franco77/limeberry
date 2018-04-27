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
    
    use limeberry\View;
        
    /**
    * Controller class of Limeberry framework
    */
    class Controller
    {
        private $current_version="";
	private $controller_author = "";
        
        /**
         * Initialize
         */
	public function __construct()
        {
            $this->View = new View();
        }

        /**
        * Set version for your controller
        * @param mixed $version
        * @return $this
        */
        public function setVersion($version)
	{
            $this->current_version = $version;
            return $this;
        }
                
        /**
        * Set author to the controller
        * @param String $fullname
        * @return $this
        */
        public function setAuthor($fullname)
	{
            $this->controller_author = $fullname;
            return $this;
	}

	/**
        * Get controller's version number
        * @return string
        */
	public function getVersion()
	{
            return $this->current_version;
	}
        
        /**
        * Get controller's author
        * @return string
        **/
	public function getAuthor()
	{
            return $this->controller_author;
	}

        
        /**
        * This function is used to return an array of defined functions of your controller
        */
        protected function getFunctions()
        {
            return get_class_methods($this);
        }
         
        /**
        * This function is used to return an array of defined variables of your controller
        */
        protected function getVariables()
        {
            return get_defined_vars();
        }
    }
}

?>