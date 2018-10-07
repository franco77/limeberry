<?php

/**
 * Please do not remove or rename this class and methods. Some part of class are required for core framework module.
 * You can add your own error handlers and edit view files for custom error messages.
 */
use limeberry\Controller As mycontroller;
class ErrorHandling extends mycontroller{

    public function NotFound()
    {
        //This action is called when a controller not found, 404 Error.
        //echo 'Controller Not Found';
        $this->View->Render("app".DS."notfound.php");
    }

    public function ProtectedUrl($url="NOT DEFINED", $charset="NOT DEFINED")
    {
        $this->View->lblMsg =  "Sorry for this restriction but we found <b> {$charset} </b> a bit harmful for our application. Please check  <b>{$url} </b> and load this page again.";
        $this->View->Render("app".DS."urlprotection.php");
    }

    public function ActionNotFound($parameter = null)
    {
        // This Action will be called if a method called in url is not found. This feature needs to be enabled
        // in base class of framework. Please check framework.php::Run method.
        $this->View->lblMsg =  "The page you are looking for is not available.";
        $this->View->Render("app".DS."urlprotection.php");
    }
}
?>