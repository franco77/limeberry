<?php

namespace limeberry
{
    /**
    * A configuration class to manage your Limeberry applications
    */
    Class Configuration
    {
        /** @ignore */
        private static $application_folder; 
        /** @ignore */
        private static $application_is_root; 
        /** @ignore */
        private static $application_is_urlsecure; 
        /** @ignore */
        private static $application_unwanted_params; 
        /** @ignore */
        private static $application_install_url;
        /** @ignore */
        private static $application_static_routes;
        /** @ignore */
        private static $application_name;
        /** @ignore */
        private static $application_version;
        /** @ignore */
        private static $application_description;
        /** @ignore */
        private static $application_query_data; 
        /** @ignore */
        private static $errors_enabled;
        
        /**
         * Initialize  default application configuration.
         */
        public function __construct()
        {
            self::$application_folder = "application";
            self::$application_is_root = false;
            self::$application_is_urlsecure = false;
            self::$application_unwanted_params = array();
            self::$application_install_url = "localhost";
            self::$application_static_routes = array();
            self::$application_name = "Limeberry Application";
            self::$application_version = "1.0.0";
            self::$application_description = "Your description for the application";
            self::$application_query_data = array();       
        }
        
        
        /**
        * This function is used to set development environment.
        * Accepted values: "development", "publish", "default"
        * @param string  $prm_env One of the accepted values.
        */
	public static function setEnvironment($prm_env)
	{
            switch ($prm_env) {
                case 'development':
                    //Set environment for development;
                    error_reporting(E_ALL);
                    self::$errors_enabled = true;
                    break;
				
                case 'publish':
                    //set environment for publish;
                    error_reporting(0);
                    self::$errors_enabled = false;
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
         * Returns true if
         * @return Boolean
         */
        public function isErrorsEnabled()
        {
            return self::$application_is_published;
        }
        
        
        /**
        * This function is used to set application folder for Limeberry frameworks current config.
        * @param string $prm_folder_name Application's folder name
        * @return void 
        */
	public static function setApplicationFolder($prm_folder_name="application")
        {
            self::$application_folder = $prm_folder_name;	
	}
                
        /**
        * Returns application Folder
        * @return string
        */       
        public static function getApplicationFolder()
        {
            return self::$application_folder;
        }
        

        /**
        * This function is used to determine if your application in server is in root directory or not. Set true if your app will run in root directory
        * @param bool $prm_isroot
        */
		
        public static function setRoot($prm_isroot=false)
	{
            self::$application_is_root = $prm_isroot;
	}
		
        /**
        * Returns application Folder
        * @return bool
        */       
	public static function isRoot()
	{
            return self::$application_is_root;
        }
        
        
        /**
        * This function is very important, when you use response and route class your redirect url will be get from here.
        * @param string $prm_url Application url ex: http://localhost/myproject
        */
	public static function setApplicationUrl($prm_url="localhost")
	{
            self::$application_install_url=$prm_url;
	}
        
        /**
        * Returns application url
        * @return string
        */
	public static function getApplicationUrl()
	{
            return self::$application_install_url;
        }
                
		
                
        /**
        * This function is used to prevent web site from unwanted url parameters.
        * @param $prm_urlsec True for enabled and False for disabled.
        */
        public static function setUrlProtected($prm_urlsec = false)
        {
            self::$application_is_urlsecure = $prm_urlsec;
        }
            
        
        /**
        * Returns True if Url unwanted parameter security is open
        * @return bool
        */
        public static function isUrlProtected()
        {
            return self::$application_is_urlsecure;
        }
        
        
        /**
        * Set an array for unwanted characters or words
        * @returns void
        */
        public static function UnwantedParameters($chars = array())
        {
            self::$application_unwanted_params = $chars;
        }
           
        /**
        * Get  array of unwanted characters or words
        * @returns string
        */
        public static function getUnwantedParameters()
        {
            return self::$application_unwanted_params;
        }
        
        /**
         * Store Url Query in an array
         * @param type $query Array
         */
        public static function setQuery($query = array())
        {
            self::$application_query_data = $query;
        }
        
        /**
         * Returns stored queries.
         * @return Array
         */
        public static function getQuery()
        {
            return self::$application_query_data;
        }
        
        /**
        * This function is used to set a title/name for your project.
        * @param $projectTitleName Title of your application ex: My Blog Application
        * @return void 
        */
        public static function setTitle($projectTitle="Default App")
        {
            self::$application_name = $projectTitle;
        }
        
        /**
        * Title of your application.
        * @return string
        */
        public  static function getTitle()
        {
            return self::$application_name;
        }
        
        
        /**
        * This function is used to set version number of your application
        * @param $projectV Version Number of your application ex: 1.0.0
        * @return void 
        */
        public static function setVersion($projectV="1.0.0")
        {
            self::$application_version = $projectV;
        }
        
        /**
        * Version number of your application.
        * @return string
        */
        public  static function getVersion()
        {
            return self::$application_version;
        }
                
                  
        /**
        * This function is used to set a description for your application
        * @param $projectV Title of your application ex: My default Limeberry framework application.
        * @return void 
        */
        public static function setDescription($projectD="My default Limeberry framework application.")
        {
            self::$application_description = $projectD;
        }
        
        /**
        * Description of your application.
        * @return string
        */         
        public  static function getDescription()
        {
            return self::$application_description;
        }	
        
        /**
         * Set Static Routes
         * @param Array $ssr 
         */
        protected static function setStaticRoute($ssr = array())
        {
            self::$application_static_routes = $ssr;
        }
        
        /**
         * Get Static Routes
         */
        protected static function getStaticRoute()
        {
            return self::$application_static_routes;
        }
    
    }
}

?>