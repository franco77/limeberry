<?php

namespace limeberry
{
    /**
    * A configuration class to manage your Limeberry applications
    */
    Class Configuration
    {
        /**
        * This function is used to set development environment.
        * Accepted values: "development", "publish", "default"
        * @param string  $prm_env One of the accepted values.
        */
	public static function setEnvironment($prm_env)
	{
            global $application_is_published;
                    
            switch ($prm_env) {
                case 'development':
                    //Set environment for development;
                    error_reporting(E_ALL);
                    $application_is_published = false;
                    break;
				
                case 'publish':
                    //set environment for publish;
                    error_reporting(0);
                    $application_is_published = true;
                    break;

                case 'default':
                    //do not set;
                    break;
				

                default:
                    //Set environment for development;
                    break;
            }
	}

        /**
        * This function is used to set application folder for Limeberry frameworks current config.
        * @param string $prm_folder_name Application's folder name
        * @return void 
        */
	public static function setApplicationFolder($prm_folder_name="application")
        {
            global $application_folder;
            $application_folder = $prm_folder_name;	
	}

        /**
        * This function is used to determine if your application in server is in root directory or not. Set true if your app will run in root directory
        * @param bool $prm_isroot
        */
		
        public static function setRoot($prm_isroot=false)
	{
            global $application_is_root;
            $application_is_root = $prm_isroot;
	}
		
        /**
        * This function is very important, when you use response and route class your redirect url will be get from here.
        * @param string $prm_url Application url ex: http://localhost/myproject
        */
	public static function setApplicationUrl($prm_url="localhost")
	{
            global $application_install_url;
            $application_install_url=$prm_url;
	}
		
                
        /**
        * This function is used to prevent web site from unwanted url parameters.
        * @param $prm_urlsec True for enabled and False for disabled.
        */
        public static function setUrlProtected($prm_urlsec = false)
        {
            global $application_is_urlsecure;
            $application_is_urlsecure = $prm_urlsec;
        }
        
        /**
        * Set an array for unwanted characters or words
        * @returns void
        */
        public static function UnwantedParameters($chars = array())
        {
            global $application_unwanted_params;
            $application_unwanted_params = $chars;
        }
                
        /**
        * This function is used to set a title/name for your project.
        * @param $projectTitleName Title of your application ex: My Blog Application
        * @return void 
        */
        public static function setTitle($projectTitle="Default App")
        {
            global $application_name;
            $application_name = $projectTitle;
        }
                
        /**
        * This function is used to set version number of your application
        * @param $projectV Version Number of your application ex: 1.0.0
        * @return void 
        */
        public static function setVersion($projectV="1.0.0")
        {
            global $application_version;
            $application_version = $projectV;
        }
                
                  
        /**
        * This function is used to set a description for your application
        * @param $projectV Title of your application ex: My default Limeberry framework application.
        * @return void 
        */
        public static function setDescription($projectD="My default Limeberry framework application.")
        {
            global $application_description;
            $application_description = $projectD;
        }
                
                
        /**
        *  This function is used to enable the LimeberryHub project summary.
        * If you set the parameter to true, Application will create a json
        * file to contain a summary of your projects configuration. Please disable it if you 
        * do not use LimeberryHub. 
        * @param type $param 
        */
        public static function CreateConfigSummary($param=true)
        {
            global $application_enable_config_json;
            $application_enable_config_json = $param;
        }



        #-------------------------------------------- [GET METHOS] -----------------------------------

        /**
        * Returns application Folder
        * @return string
        */       
        public static function getApplicationFolder()
        {
            global $application_folder;
            return $application_folder;
        }
        
        /**
        * Returns application Folder
        * @return bool
        */       
	public static function isRoot()
	{
            global $application_is_root;
            return $application_is_root;
        }
        
        /**
        * Returns application url
        * @return string
        */
	public static function getApplicationUrl()
	{
            global $application_install_url;
            return $application_install_url;
        }
                
        /**
        * Returns True if Url unwanted parameter security is open
        * @return bool
        */
        public static function isUrlProtected()
        {
            global $application_is_urlsecure;
            return $application_is_urlsecure;
        }
                
        /**
        * Title of your application.
        * @return string
        */
        public  static function getTitle()
        {
            global $application_name;
            return $application_name;
        }
        
        
        /**
        * Version number of your application.
        * @return string
        */
        public  static function getVersion()
        {
            global $application_version;
            return $application_version;
        }
                
        /**
        * Description of your application.
        * @return string
        */         
        public  static function getDescription()
        {
            global $application_description;
            return $application_description;
        }	
    }
}

?>