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
namespace limeberry\visual
{
	use limeberry\Url as purl;

	/**
	*   Limeberry pagination helper class
	**/
	class Pagination
	{
		var $data;
		var $viewNumber=1;
		var $current_page=1;
		var $willCreatePage;

		var $controller;
		var $action;
		var $linkStyles=null;

		
		/**
		*	Set current page number this value gets from controller and will be passed with variables to view.
		*	@param int $currentpage_param variable to navigate pagination 
		*	@return void
		*/
		function __construct($currentpage_param=1)
		{
			$this->viewNumber = $currentpage_param;
			$this->linkStyles=null;
		}

		/**
		*	Data pagination function
		*	@param array $data Data you want to paginate as array
		*	@param int $resperpage Records per page
		*	@return int
		*/
		public function Paginate($data, $resperpage=10)
		{
			$total_values = count($data);
			$numbers_arr=null;
			if(!isset($this->viewNumber))
			{
				$this->viewNumber = 1;
			}else{
				$this->current_page = $this->viewNumber;
			}

			$counts = ceil($total_values / $resperpage);
			$param1 = ($this->current_page - 1) * $resperpage;
			$this->data = array_slice($data, $param1, $resperpage);

			for ($i=1; $i <= $counts; $i++) { 
				$numbers_arr[] = $i;
			}
			$this->willCreatePage = $numbers_arr;
			return $numbers_arr;
		}

		/**
		*	Returns data array with paginated array slices
		*	@return array
		*/
		public function FetchResults()
		{
			$resultvalues = $this->data;
			return $resultvalues;
		}

		/**
		*	Set attributes for links
		*	@param array  $attrb attributes for link tag, array key as tag and value as set data.
		*	@return void
		*/
		public function setLinkStyle($attrb=null)
		{
			$this->linkStyles = ' ';
			foreach ($attrb as $key => $value) {
				$this->linkStyles .= ' '.$key.'="'.$value.'" ';
			}
		}

		/**
		*	Returns links for paginated data 
		*	@param string $controller Controller name which loads pagination
		*	@param string $action action name in controller which loads pagination
		*	@return string
		*/
		public function BuildLinks($controller, $action)
		{
			$linkBuilded='';
			$this->controller = $controller;
			$this->action = $action;


			if($this->linkStyles==null)
			{
				foreach ($this->willCreatePage as $pageNo) {
					$linkBuilded .= '<a href="'.purl::RedirectToAction($controller, $action, $pageNo).'" >'.$pageNo.'</a>';
				}
			}else{

					foreach ($this->willCreatePage as $pageNo) {
					$linkBuilded .= '<a href="'.purl::RedirectToAction($controller, $action, $pageNo).'" '.$this->linkStyles.' >'.$pageNo.'</a>';
				}
			}
			
			return $linkBuilded;
		}

		/**
		*	Returns back link if not first page of data data 
		*	@param string $controller Controller name which loads pagination
		*	@param string $action action name  which loads pagination
		*	@param string   $textText to show with link, default: Back
		*	@return string
		*/
		public function BackLink($controller, $action, $text='Back')
		{
			$linkBuilded='';
			$goTo = $this->current_page - 1;
			
			if(!($goTo < 1 ))
			{
				if($this->linkStyles==null)
				{
					$linkBuilded .= '<a href="'.purl::RedirectToAction($controller, $action, $goTo).'" >'.$text.'</a>';
				}
				else
				{

					$linkBuilded .= '<a href="'.purl::RedirectToAction($controller, $action, $goTo).'" '.$this->linkStyles.' >'.$text.'</a>';
				}			
			}
			return $linkBuilded;
		}

		/**
		*	Returns nect link if not last page of data data 
		*	@param string $controller Controller name which loads pagination
		*	@param string $action action name  which loads pagination
		*	@param string $text Text to show with link, default: Next
		*	@return string
		*/
		public function NextLink($controller, $action, $text='Next')
		{
			$linkBuilded='';
			$goTo = $this->current_page + 1;
			
			if(!($goTo > end($this->willCreatePage)))
			{
				if($this->linkStyles==null)
				{
					$linkBuilded .= '<a href="'. purl::RedirectToAction($controller, $action, $goTo).'" >'.$text.'</a>';
				}
				else
				{

					$linkBuilded .= '<a href="'.purl::RedirectToAction($controller, $action, $goTo).'" '.$this->linkStyles.' >'.$text.'</a>';
				}			
			}
			return $linkBuilded;
		}
      
	}
        
}


?>