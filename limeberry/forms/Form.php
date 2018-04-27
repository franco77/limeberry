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
namespace limeberry\forms
{
    use limeberry\forms\FormElements;
    use limeberry\io\SpecialDirectory as SpecialDirs;
    use limeberry\Model;
    
    /**
     * Limeberry Form Class
     * This class is used to help the developer while creating forms
     * and sending data to models.
     */
    Class Form
    {   
        const EOL = "\n"; 
        
        protected $baseForm;
        protected $formElements;
        protected $modelInstance;
        protected $formName;
             
        /**
         * Initialize a form class
         * @param type $formName A form name to provide security while Seding form.
         */
        function __construct($formName = "defaultForm") 
        {
            $this->baseForm = "";   
            $this->formElements = "";   
            $this->modelInstance = "";   
            $this->formName = $formName;
        }

        /**
         * This function creates a form.
         * @param type $attr Array of html attributes of form
         * @return string
         */
        public function DefineForm($attr=null)
        {
            
            $creator = "";
            $formName =  $this->formName;
            if(is_null($attr))
            {
               $creator .= '<form name="'.$formName.'" action="'. \limeberry\url::GetUrl().'" >'.self::EOL;
               
            }else{
                $creator = '<form name="'.$formName.'" action="'. \limeberry\url::GetUrl().'" ';
                foreach ($attr as $key => $value) {
                    $creator .= ' '.$key.'="'.$value.'"';
                }
                $creator .=">". self::EOL;
            }
            return $creator;
        }
        
        /**
         * This function is used to set model files for forms when sendng data
         * @param type $modelClass Model class name to use with form
         */
        public function setModel($modelClass)
        {
            if(!is_null($modelClass))
            {
                $this->modelInstance = $modelClass;
            }
        }
        
        /**
         * This function is used to created form elements
         * @param type $element FormElements class methods
         * @return string
         */
        public function setElement($element)
        {
            $creator = "";
            $creator.= $element.self::EOL;
            return $creator;
        }

        
        /**
         * Close form tags
         * @return string
         */
        public function FinishForm()
        {
            $creator = "</form>".self::EOL;       
             return $creator;
        }
        
        /**
         * This function is used to run a function/action model file after 
         * POSTing the form.
         * @param type $actionName Action in model file to run
         */
        public function Call($actionName)
        {
            if($this->__desidePostedForm($this->formName))
            {
                    Model::Load($this->modelInstance);
                    $modelClass = new $this->modelInstance;
                    if(method_exists($modelClass, $actionName))
                    {
                        $paramsPosted = $_POST;
                        foreach ($paramsPosted as $key => $value) {
                            if(property_exists($this->modelInstance, $key))
                            {
                                $modelClass->$key = $_POST[$key];
                            }
                        }
                        $modelClass->{$actionName}();
		    }
            }
            
        }
        
        /**
         * @ignore
         */
        private function __desidePostedForm($frmName="")
        {
            if(isset($_POST[$frmName]))
            {
                return true;
            }
        }
  
    }
}