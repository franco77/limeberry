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
namespace limeberry\dataman
{
    use PDO;
     /**
     * This library is used to manage your mysql connections.
     */
        
    class MySqlConnect
    {
        /**
        *
        * @var mixed variable This will store your mysql connection 
        */
       private $connection;

       /**
        *
        * @var bool Is your database connection open 
        */
       private $is_connected;

       /**
        *
        * @var String last errors occured in your database. 
        */
       private $errors;

       /**
       *	Create a mysql connection
       *	@param string Database Host name
       *	@param string Database User name  
       *	@param string Database Password 
       *	@param string Database PDO options
       *	@return MySql Connection
       **/

       function __construct($host="localhost",$user="root",$pass="root",$db="",$options=null)
       {

           $my_db = 'mysql:host=' . $host . ';dbname=' . $db;
           if($options==null)
           {
             $options=array(
             PDO::ATTR_PERSISTENT    => true,
             PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
                           );
           }
           try{
             $this->connection = new PDO($my_db, $user, $pass, $options);
             $this->is_connected = true;
           }catch(PDOException $ex){
             $this->is_connected = false;
             $this->errors = $ex->getMessage();
           }
           return $this;
       }


       /**
       * This function is used to return an active database connection
       * @return database connection
       */
       public function Source()
       {
         return $this->connection;
       }

       /**
       *	Check if connection available
       *	@return bool
       */
       public function isConnected()
       {
         if($this->is_connected)
         {
             return true;
         }
         else{
             return false;
         }
       }

       /**
       *	Create a mysql connection
       *	@param string Database Host name
       *	@param string Database User name  
       *	@param string Database Password 
       *	@param string Database PDO options
       *	@return MySql Connection
       */
       
        public function Connection($host="localhost",$user="root",$pass="root",$db="",$options=null)
        {
            $my_db = 'mysql:host=' . $host . ';dbname=' . $db;
            if($options==null)
            {
                $options=array(
                PDO::ATTR_PERSISTENT    => true,
                PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
              );
            }
              try{
                    $this->connection = new PDO($my_db, $user, $pass, $options);
                    $this->is_connected = true;
              }catch(PDOException $ex){
                      $this->is_connected = false;
              $this->errors = $ex->getMessage();
            }
            return $this->connection;
        }


        /**
        *	Returns last error occured when tryong to connect to Mysql database
        *	@return bool
        */
        public function lastError()
        {
            return $this->error;
        }


        /**
        *	Close a connection
        *	@return bool
        */
        public function Close()
        {
            try
            {
                $this->connection=null;
                $this->is_connected=false;
                return true;
            }catch(Exception $ex)
            {
                return false;
            }
        }

    }
	 
}

?>