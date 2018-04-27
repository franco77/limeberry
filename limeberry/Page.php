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
    include_once('base.php');
        
    /**
    * @ignore
    */
    global  $application_folder;
        
    /**
    * @ignore
    */
    define("rPath",  preg_replace('/[\\\\\\/]+/', '/', '/' . substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])) .DS.'..'.DS.$application_folder.DS.'template'.DS));
        
    /**
    * This library is used in templates and views.
    */
        
    class Page
    {
        /**
        *@ignore
        */
        private $title;
                
        /**
        *@ignore
        */
        private $contents;
                
        /**
        *@ignore
        */
        private $layoutPath;
                
        /**
        *@ignore
        */
	private $output;
                
        /**
        *@ignore
        */
	protected $values = array();

        /**
        *@ignore
        */
	private $MASTER;

        
        /**
        * Install Page class
        */
	function __construct()
	{
            global $application_folder;
            
            #SET LAYOUT PATHS
            $this->MASTER = ROOT.DS.$application_folder.DS.'template'.DS;		
        }

	/**
	* @var $layoutPathParam Name of your template file [example: setLayout("mytemplate.phtml"); ]
	*/
	public function setLayout($layoutPathParam="master.php")
	{
            if(file_exists($this->MASTER.$this->layoutPath.$layoutPathParam))
            {
                $this->layoutPath = $this->MASTER.$this->layoutPath.$layoutPathParam;
            }else{
		echo "Error loading template file (".$this->MASTER.$this->layoutPath.$layoutPathParam."). Please check template folder.";
            }
        }
		
        
	/**
	* Set content for parameter defined in template page.
	* @var $paramName Name of your parameter in template ex: {@Title};
	* @var $paramName Content for your parameter.
	*/
	public function setParameter($paramName, $paramValue) 
	{
            $this->values[$paramName] = $paramValue;
	}
                
                
        /**
        * Set null value to unused parameter in template files
        * @param type $paramName
        */
        public function setParameterNull($paramName) 
	{
            $this->values[$paramName] = "";
	}

        /**
        * @ignore
        */
	private function __applyParameters()
	{
            foreach ($this->values as $key => $value) 
            {
		$tagToReplace = "{@$key}";
		$this->output = str_replace($tagToReplace, $value, $this->output);
            }
        }

	/**
	* if you do not use parameters for setting title you can use this function.
        */
        public function setTitle($paramTitle='')
        {
            $this->title = $paramTitle;
	}
                
                
        /**
        * Include a css or js file in your template file. This function returns a relative
        * path for template folder.
        * @param type $fileName File name; ex: css/application.css
        * @return type
        */
        public static function includeFile($fileName='')
        {
            return rPath.$fileName;
	}

        
        /**
        * Start content definition in your view files when using templates.
        */
        public function BeginContent()
        {
            ob_start();
        }
          
        
        /**
        * Finish content definition in your view files when using templates.
        */
	public function EndContent()
        {
            $this->contents = ob_get_clean();
            $this->CreateView();
	}


        /*
        * Returns the page to screen.
	*/
	private function CreateView()
        {
            ob_start();
            include_once($this->layoutPath);
            $this->output = ob_get_clean();
            $this->__applyParameters();
            echo $this->output;
	}
    
    }
}
?>