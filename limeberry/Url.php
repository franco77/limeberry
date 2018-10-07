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
    require_once('base.php');
    use limeberry\Configuration as conf;
    
    /**
     * An url Helper class to manage your application's routing and navigating actions. 
     */
    class Url
    {
       

        /**
         * This function returns a redirectable url from your controllers's actions.
         * For example you can use this with html's <a> tags href attribute  
         * Route redirect
         * @param string $controllerName controller
         * @param string $action action
         * @param var $parameter parameter null by default
         * @return string
         **/
	public static function RedirectToAction($controllerName, $action, $parameter=null)
	{ 
	    if(isset($parameter))
	    {
	        return conf::getApplicationUrl().'/'.$controllerName.'/'.$action.'/'.$parameter;
	    }else{
                return  conf::getApplicationUrl().'/'.$controllerName.'/'.$action;
	    }
	}
        
        
        /**
         * This function returns a redirectable url from your controllers's actions in an Area.
         * For example you can use this with html's <a> tags href attribute  
         * Route redirect
         * @param string $Area Area name
         * @param string $controllerName controller
         * @param string $action action
         * @param var $parameter parameter null by default
         * @return string
         **/
	public static function AreaRedirection($Area = "", $controllerName="", $action="", $parameter=null)
	{ 
            
            $addArea = "?p=".$Area;
	    if(isset($parameter))
	    {
	        return conf::getApplicationUrl().'/'.$controllerName.'/'.$action.'/'.$parameter.$addArea;
	    }else{
                return  conf::getApplicationUrl().'/'.$controllerName.'/'.$action.$addArea;
	    }
	}
        
        
        /**
         * @ignore
         */
        public function getArea($willWork = true)
        {
           $application_query_data = conf::getQuery();
            if(!empty($application_query_data["p"]))
            {
                return $application_query_data["p"]."Area".DS;
            }else{
                return "";
            }
        }

        
        /**
         *	Simple redirect url
         *      For example you can use this with html's < a > tags href attribute  
         *	@param $url string  url
         *      @param $secs string  Time to wait before redirect
         *	@return string
         **/
	public static function Redirect($url='', $secs = "0")
	{ 
             if (!headers_sent()){ 
                header('Location: '.$url); exit;
            }else{
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.$url.'";';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="'.$secs.'";url='.$url.'" />';
                echo '</noscript>'; exit;
            }
	}

         
        /**
         * Returns current page url
         * @return String
         **/
        public static function getUrl()
        {
           return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        }
        
        /**
         * Returns posted values in your url with 'get' method.
         * @param String $paramid name of your entry
         * @return string
         */
        public static function getData($paramid = null)
        {
            $application_query_data = conf::getQuery();
            if(is_null($paramid))
            {
                return $application_query_data;
            }else{
                if(empty($application_query_data[$paramid]))
                {
                    return "-1";
                }else{
                    return $application_query_data[$paramid];
                }
            }
        }


        /**
         * @ignore
         */
        public static function _clear_url_parameters($query_params = null)
        {
            $application_query_data = conf::getQuery();
            $temp_data = array();
            $qprm_a = explode("&", $query_params);
            
            foreach ($qprm_a as $url_data) {
               if(!empty($url_data))
               {
                   $qprm_b = explode("=",$url_data);
                   $temp_data[$qprm_b[0]] = $qprm_b[1];
               }
            } 
            $application_query_data = $temp_data;
        }
    
    }
}