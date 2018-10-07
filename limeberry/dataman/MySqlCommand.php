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
     * This library is used to run MySql your queries.
     */

    class MySqlCommand
    {
        /**
        *
        * @var string This variable will store your sql query. 
        */
       private $_query;

       /**
        *
        * @var mixed This variable will store your connection 
        */
       private $_connection;

       /**
        *
        * @var string Prepared query statement. 
        */
       private $statement;

       /**
        * Create a command
        * @param String $query Write your query
        * @param mixed Variable $con get connection source from MySqlConnect class.
        */
       function __construct($query=null, $con=null)
       {
            $this->_connection= $con;
            $this->statement = $this->_connection->prepare($query);
       }


       /**
        * This function is used when you use parameterized queries.
        * @param String $param  Parameter name
        * @param String $value Parameter's value
        * @param type $type optional PDO::Parameter_TYPE
        */
       public function SetParameter($param, $value, $type = null)
       {
           if (is_null($type)) {
               switch (true) {
                   case is_int($value):
                       $type = PDO::PARAM_INT;
                       break;
                   case is_bool($value):
                       $type = PDO::PARAM_BOOL;
                       break;
                   case is_null($value):
                       $type = PDO::PARAM_NULL;
                       break;
                   default:
                       $type = PDO::PARAM_STR;
               }
           }
           $this->statement->bindValue($param, $value, $type);
       }


       /**
        * Fetch all records from returned query
        * @return bool
        */
       public function FetchAll()
       {
           $this->Execute();
           return $this->statement->fetchAll(PDO::FETCH_ASSOC);
       }
       /**
        * Fetch a single record from returned query
        * @return bool
        */
        public function Fetch()
       {		
           $this->Execute();
           return $this->statement->fetch(PDO::FETCH_ASSOC);
       }

       /**
        * Count affected rows by your query.
        * @return int
        */
       public function RowCount()
       {
           return $this->statement->rowCount();
       }

       /**
        * Return last inserted id
        * @return mixed
        */
       public function LastInsertedID()
       {
           return $this->statement->lastInsertId();
       }


       /**
        * Execute the command set in constructor.
        * @return bool
        */
       public function Execute()
       {
            return $this->statement->execute();
       }
    }
}

?>