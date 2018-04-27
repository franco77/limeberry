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



$application_folder = "application";
$application_is_root = false;

$application_is_urlsecure = false;
$application_unwanted_params = array();

$application_install_url = "localhost";
$application_static_routes = array();

$application_name = "Limeberry Application";
$application_version = "1.0.0";
$application_description = "Your description for the application";
   

$application_query_data = array();

/**
 * @ignore
 */
define('DS', DIRECTORY_SEPARATOR);
/**
 * @ignore
 */
define('ROOT', dirname(dirname(__FILE__)));




?>