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
    
    /**
     * This class is used to simply manage routes of your application.
     * All functions of this class must be used in Application Register Function
     */
    class Route
    {
        /**
        * Map new route name
        * @param string $mapname
        * @param string $mapdestination
        */       
	public static function MapNew($mapname="index", $mapdestination="index/index/0")
	{
            global $application_static_routes;
            global $application_install_url;
            $application_static_routes[$mapname] = $application_install_url.'/'.$mapdestination;
        }

        /**
        * Returns a redirectable url from map name.
        * @param type $mapname
        * @return string
        */        
	public static function ResolveMap($mapname=null)
	{
            global $application_static_routes;
            if(!is_null($mapname))
            {
                return $application_static_routes[$mapname];
            }else{
                return $application_static_routes;
            }   
	}

        
        /**
        * This function is used to redirect your application with headers. 
        * @param type $mapname
        * @param type $setparameter 
        */
	public static function ForceRedirect($mapname="index", $setparameter=null)
	{
            global $application_static_routes;

            if(isset($application_static_routes[$mapname]))
            {
		if(!is_null($setparameter))
		{
                    $tagToReplace = "{@}";
                    $application_static_routes[$mapname] = str_replace($tagToReplace, $setparameter, $application_static_routes[$mapname]);
                    header('location: '.$application_static_routes[$mapname]);
                    exit();
		}else{
                    $tagToReplace = "{@}";
                    $application_static_routes[$mapname] = str_replace($tagToReplace, "", $application_static_routes[$mapname]);
                    header('location: '.$application_static_routes[$mapname]);
                    exit();
		}
            }
            
	}
                
        /**
        * Clear all mapped routes
        */
        public static function ClearMaps()
        {
            global $application_static_routes;
            $application_static_routes = array();
	}

        /**
        * This function is used to get url typed in an array. You can use this when you are creating queries in url.
        * @param type $requested Requested index from array
        * @return Mixed
        */
	public static function ExplodeUrlArray($requested=null)
	{
            if(!($requested==null))
            {
                $toks = explode('/', rtrim($_SERVER['REQUEST_URI']));
		return $toks[$requested];
            }else{
		return explode('/', rtrim($_SERVER['REQUEST_URI']));
            }
	}
                
    }
    
}

?>