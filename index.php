<?php
namespace limeberry
{
    

    /**
     *  Limeberry | PHP MVC Framework
     *  a new php mvc framework for fast and secure web applications. 
     *
     * @package Limeberry Framework 
     * @author Sinan SALIH
     * @copyright Copyright (C) 2018 Sinan SALIH
     */

    require_once 'limeberry/Framework.php';
    use limeberry\Framework;
	
    //app_config.php is the configuration file for your project.
    Framework::LoadConfig("app_config.php");   
    
    //This line starts your application.
    Framework::Run();
}
?>