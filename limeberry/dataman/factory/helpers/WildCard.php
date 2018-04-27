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
namespace limeberry\dataman\factory\helpers
{
    /**
     * Helpers for QueryBuilder
     */
    class WildCard
    {
        private $wildcard_operator = "%";
        
        /**
         * Set a char for wildcard to use in like query 
         * @param string $chard
         */
        public function setWildCard($chard= "%")
        {
           $this->wildcard_operator = $chard;
        }
        
        /**
         * Returns the char set as wildcard
         * @return string
         */
        public function getWildCard()
        {
            return $this->wildcard_operator;
        }
        
        /**
         * used in QueryBuilder like method to deside where to add wildcard
         * @return strıng
         */
        public function Front()
        {
            return "front";
        }
        
         /**
         * used in QueryBuilder like method to deside where to add wildcard
         * @return strıng
         */
        public function End()
        {
            return "end";
        }
        
         /**
         * used in QueryBuilder like method to deside where to add wildcard
         * @return strıng
         */
        public function Both()
        {
            return "both";
        }
 
    }
}
?>