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
    require_once 'base.php';
   
    /**
    * This class is used to create an instance of view files.
    */
    class View   
    {
		
	/**
	*	Return a view to user 
	*	@param string $viewScript view file path and file name ex: Index\Index.phtml
	*	@param bool  $isUsual If your file not in view folder.
	*	@return void
	*/
	public function Render($viewScript, $isUsual=true)
	{
            global $application_folder;
            if($isUsual)
            {
                require(ROOT.DS.$application_folder.DS.'view'.DS.$viewScript);
            }else{
                require(ROOT.DS.$application_folder.DS.$viewScript);
            }
        }


	/**
	*	Return true if view file available
	*	@param string $viewScript view file path and file name ex: Index\Index.phtml
	*	@param bool  $isUsual If your file not in view folder.
	*	@return bool
	*/	
	public function isAvailable($viewScript, $isUsual=true)
	{
            global $application_folder;
            if($isUsual)
            {
                if(file_exists(ROOT.DS.$application_folder.DS.'view'.DS.$viewScript))
                {
                    return true;
                }else{
                    return false;
                }
            }else{
                if(file_exists(ROOT.DS.$application_folder.DS.$viewScript))
                {
                    return true;
                }else{
                    return false;
                }
            }
	}   
    }
    
}
?>