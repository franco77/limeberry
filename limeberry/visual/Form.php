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
namespace limeberry\visual
{
    use limeberry\Configuration;
    
    /**
    * Limeberry form helper class
    **/
    class Form
    {
            private $isValid;
            private $validMessages = array();
            private $model;



        /**
        *	Initialize form class
        *	@return void
        */
        function __construct()
        {
            $this->isValid=true;
            $this->validMessages = array();
            $this->model = null;
        }	


        /**
        *	Define a new form for post action where called
        *	@param array $attributes form attributes key as tag and value as data
        *	@return string
        */
        public function DefineForm($attributes=null)
        {
            if($attributes == null)
            {
                echo '<form method="POST"> ';
            }else{
                $generatedForm = '<form ';
                foreach ($attributes as $attr => $value) {
                    $generatedForm .=' '.$attr.'="'.$value.'"';
                }
                $generatedForm.=' >';
                echo $generatedForm;
            }
        }


        /**
        *	Attach a model class to fill variables from post action.
        *	This model class will be passed to controller for other actions like saving to database.
        *	@param Mixed $attachedModel Model class as new variable.
        *	@return void
        */
        public function AttachModel(&$attachedModel)
        {
            $this->model = $attachedModel;
        }

        private function __escapeData($param)
        {
            $param = trim($param);
            $param = strip_tags($param);
            $param = htmlspecialchars($param);
           return  $param;    
        }


        /**
        *	Set which html input will be for which variable of model class where called
        *	@param mixed $property Variable of model class: ex: $user->Name
        *	@param string $name name attribute for input
        *	@param array $attributes attributes for input tag, array key as tag and value as set data
        *	@return string
        */
        public function BindProperty(&$property, $name, $attributes=null)
        {
            if($attributes==null){ echo  '<input type="text" name="'.$name.'">'; }
            else{
                 $generatedElement = '<input  name="'.$name.'" ';
                foreach ($attributes as $attr => $value) {
                    $generatedElement .=' '.$attr.'="'.$value.'"';
                }
                $generatedElement.=' />';
                echo $generatedElement;
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $property = self::__escapeData($_POST[$name]);
            }
        }

        /**
            *	Returns model class and binded values as an array
            *	@return Array 
            */
        public function Model()
        {
            return $this->model;
        }

        /**
        *	Submit html form to controller 
        *
        *	@param string $controllerName Controller name
        *	@param string $actionName action name of controller
        *	@param array $attributes attributes for submit tag, array key as tag and value as set data
        *	@return void
        */
        public function SubmitForm($controllerName, $actionName, $attributes=null)
        {
            if($attributes==null){ echo '<input type="submit" name="Submit" value="Submit">'; }
            else
            {
                 $generatedElement = '<input type="submit"  ';
                foreach ($attributes as $attr => $value) 
                {
                    $generatedElement .=' '.$attr.'="'.$value.'"';
                }
                $generatedElement.=' /> </form>';
                echo $generatedElement;
             }
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(file_exists(Configuration::getApplicationFolder().DS.'controller'.DS.$controllerName.'.php'))
                {
                    require_once(Configuration::getApplicationFolder().DS.'controller'.DS.$controllerName.'.php');
                    $controller = new $controllerName;
                    $action = $actionName;
                    $controller->{$action}($this);
                }else
                {
                    echo '[ERROR 201] Controller: '.$controllerName.' or post action: '.$action.' not found, please check and try again. You can see user manual for more information.';
                }
            }	            
        }

        /**
            *	Checks if user input is valid
            *	@return bool
            */
        public function isValid()
        {
            if(empty($this->validMessages))
            {
                return true;
            }
            else {return false;}
        }


        /**
        *	a simple replace for print/ echo function
        *	@param string $printed tag for printing
        *	@return string
        **/
        public function SpecialTag($printed)
        {
            return $printed;
        }

        /**
        *	Add a validation error
        *	@param string $errName Error name to show if not validated
        *	@param string $errMessage Error message to show if not valid
        *	@return void
        */
        public function AddValidationError($errName=null, $errMessage=null)
        {
            $this->validMessages[] = array($errName=>$errMessage);
        }

        /**
        *	Prints all validation errors to view where called
        *	@param variable Variable of model class: ex: $user->Name
        *	@return void
        */
        public function ShowValidationError()
        {
            foreach ($this->validMessages as $index => $errMessage  ) {
                    foreach ($errMessage as $key => $value) {
                            echo '<b>'.$key.'</b>:  '.$value."<br/>";
                    }
            }
        }

    }
}

?>