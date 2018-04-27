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
namespace limeberry\tool
{

	/**
	* This is a simple benchmarking class for Limeberry framework.
	**/
	class Benchmark
	{

            private $pointList;		//Array for saved benchmark.

            /**
             * Initialize
             */
            function __construct()
            {
                $this->pointList = array();
            }


            /**
            *	Start a benchmark point.
            *	@return float
            */
            public  function Start()
            {
                $s = explode( ' ', microtime() );
                $s = $s[1] + $s[0];
                return $s;
            }

            /**
            *	Finish a benchmark point.
            *	@param $started start point of your benchmark
            *	@return float
            */
            public function Finish($started)
            {
                $fnP = explode( ' ', microtime() );
                $fnP = $fnP[1] + $fnP[0];
                $fnP = round($fnP - $started,4);
                return $fnP;
            }

            /**
            *	Save the current benchmark to array
            *	@param $name_for string Name for your benchmark profile
            *	@param $started start point of your benchmark
            *	@return void
            */
            public function SavePoint($name_for, $started)
            {
                if(isset($started))
                {
                        $this->pointList[] = array($name_for=>$started);
                }
            }


            /**
            *	All saved benchmarks 
            *	@return array
            */
            public function Points()
            {
                    return $this->pointList;
            }

	}
}
?>