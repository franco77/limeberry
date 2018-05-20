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
    require_once 'limeberry/autoloader.php';
    require_once 'limeberry/base.php';
    use limeberry\Url as purl;
    
    /**
    * Core Module of Limeberry Framework
    * [Note]: Modification on this file is not recommended you may break the operation of you application. 
    */
    class Framework 
    {
        /*
         * @ignore
         */
        protected static $areas = "";
        
        /**
         * This method is used to load configuration file, must be called with a valid
         * configuration before Running framework.
         * @param string $configFile  app_config.php file
         */
        public static function LoadConfig($configFile='app_config.php')
        {
            $filename = $configFile;
            if(file_exists($filename))
            {
                require_once $filename;
                $class_name = "Application";
                if( (class_exists($class_name))  && (method_exists($class_name, "Register")))
                {
                    $appclass = new $class_name;
                    $appclass->Register();
                }
            }else 
            {
                echo "[ERROR 101] Could not find application configuration, please check configuration file and try again. See user manual for more information.";
            }
        }

    
        /**
         * This function is entry point of your application.
         * Makes configurations check for paths. 
         * Initialize the application
         */
	public static function Run()
	{
            //get global application path from app_config
            global $application_folder;
            
            //get if application is located in root dir. Will be used in dir lookup.
            global $application_is_root;
            
            
            global $application_query_data;
            
         
            //explode query data to array for using with security check.
            $url_spr_act = explode("?", rtrim($_SERVER['REQUEST_URI']));
            $tokens = explode('/', $url_spr_act[0]);
          
            
            
            //if query available in $url_spr_act check and clean parameters of url.
            if(!empty($url_spr_act[1]))
            {
                //2nd level security [must run]
                purl::_clear_url_parameters($url_spr_act[1]);
            }
            
            //Create token index
            $tk1 = 1;
            $tk2 = 2;
            $tk3 = 3;
            $tk4 = 4;
            
            //get configurations from app_config and look if app is in root or not.
            if(!($application_is_root))
            {
                $tk1 = 1+1;
                $tk2 = 2+1;
                $tk3 = 3+1;
                $tk4 = 4+1;
            }
            
                
            //Check for area before calling controller
            $url_areas = new purl();
            $area = $url_areas->getArea();
          
            //Look app_config.php if security enabled check for unwanted query or parameter in url.
            //1st level security.[optional: can be controlled via app_config.php]
            self::checkUrlProtection($tokens);
            
            
            
            //Look for controllers and run the app.
            $controllerName = $tokens[$tk1].'Controller';
            if(file_exists($application_folder.DS.'controller'.DS.$area.$controllerName.'.php'))
            {
                require_once($application_folder.DS.'controller'.DS.$area.$controllerName.'.php');
                
                $controller = new $controllerName;
                if (isset($tokens[$tk2]) && ($tokens[$tk2] != "")) 
                {
                    $actionName = $tokens[$tk2] . 'Action';
                    if(isset($tokens[$tk3])) 
                    {
                        $controller->{$actionName}($tokens[$tk3]);
                    }
                    else
                    { 
                        $controller->{$actionName}();
                    }
                }
                else
                {
                    //Default entry point (IndexAction), if action not specified
                    $controller->IndexAction();
                }	

            }
            else
            { 
                //Check if controller defined in url, if not look for Index.php controller and IndexAction by default.
                if($tokens[$tk1] == "")
                {
                    if(file_exists($application_folder.DS.'controller'.DS.'indexController.php'))
                    {
                        require_once($application_folder.DS.'controller'.DS.'indexController.php');
                        $controllerName = 'indexController';
                        $controller = new $controllerName;
                        $controller->indexAction();
                    }
                }
                else
                {
                    //if not found an entry point(also indexController.php & IndexAction ) load a 404 error.
                    require_once($application_folder.DS.'controller'.DS.'ErrorHandling.php');
                    $controllerName = 'ErrorHandling';
                    $controller = new $controllerName;
                    $controller->NotFound();
                }
            }

	}
        
      
        /**
         * @ignore
         */
        private static function checkUrlProtection($tokens_array)
        {
            #define globals
            global $application_is_urlsecure;
            global $application_unwanted_params;
            global $application_folder;
            
            #see the config file if secured url is enabled, if true
            if($application_is_urlsecure)
            {
                #look for each parameter in url
                foreach ($tokens_array as $value) 
                { 
                    foreach($application_unwanted_params as $unwanted)
                    {
                        #check each url token with each unwanted parameter if contains it.
                        if(strpos($value, $unwanted) !==false)
                        {
                            #force redirect to ErrorHandling Controller  
                            require_once($application_folder.DS.'controller'.DS.'ErrorHandling.php');
                            $controllerName = 'ErrorHandling';
                            $controller = new $controllerName;
                            $controller->ProtectedUrl($value, $unwanted);
                            exit();
                        }
                    }
                }
            }           
        }
        

        
        /**
         * Version Number of Framework.
         * @return string
         */
        public static function Version()
        {
            return "1.x";
        }
    }
}
?>
