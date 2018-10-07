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
    use limeberry\Configuration as conf;
    
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
            if($isUsual)
            {
                require(ROOT.DS.conf::getApplicationFolder().DS.'view'.DS.$viewScript);
            }else{
                require(ROOT.DS.conf::getApplicationFolder().DS.$viewScript);
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
            if($isUsual)
            {
                if(file_exists(ROOT.DS.conf::getApplicationFolder().DS.'view'.DS.$viewScript))
                {
                    return true;
                }else{
                    return false;
                }
            }else{
                if(file_exists(ROOT.DS.conf::getApplicationFolder().DS.$viewScript))
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