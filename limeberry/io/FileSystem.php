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

namespace limeberry\io
{
        /**
         * This class is used to run commands related File System.
         */
	class FileSystem
	{


		/**
		* Checks if a file exists in a path
		* @var String $path File Path
		* @return bool 
		**/
		public static function isAvailable($path="")
		{
			if(!file_exists($path))
			{
				return false;
			}else{
				return true;
			}
		}

		/**
		* Read all contents of file
		* @var String $path File Path
		* @return string 
		**/
		public static function ReadFile($path="")
		{
			$file = fopen($path, "r");
			$data="";
			while (!feof($file)) {
			   $data .= fgets($file);
			}
			fclose($file);
			return $data;
		}

		/**
		* Write contents to a file
		* @var String $path File Path
		* @var String $contents to write
		* @return bool 
		**/
		public static function WriteFile($path="", $contents="")
		{
			try
			{
				$file = fopen($path,"w");
				fwrite($file,$contents);
				fclose($file);
				return true;
			}catch(Exception $ex)
			{
				return false;
			}

		}

		/**
		* Append content to a file
		* @var String $path File Path
		* @var String $contents Contents to append
		* @return bool 
		**/
		public static function Append($path=null, $contents="")
		{
			try
			{
				file_put_contents($path, $contents.PHP_EOL , FILE_APPEND | LOCK_EX);
				return true;
			}catch(Exception $ex)
			{
				return false;
			}
		}

		/**
		* Delete a file/files
		* @var String/Array File Path
		* @return bool 
		**/
		public static function Delete($path=null)
		{
			try
			{
				unlink($path);
				return true;

			}catch(Exception $ex)
			{
				return false;
			}
		}

		/**
		* Copy a file from given path
		* @var String $from source path for file
		* @var String $to  destination path for file
		* @return bool 
		**/
		public static function Copy($from=null, $to=null)
		{
			echo copy($from, $to);
		}


		/**
		* List all files in a directory
		* @var String $path File Path
		* @return Array 
		**/
		public static function getItemList($path=null, $opt=SCANDIR_SORT_NONE)
		{
			return scandir($path,$opt);
		}
		
		/**
		* Size of file
		* @var String $path File Path
		* @return int 
		**/
		public static function getSize($path=null)
		{
			return filesize($path);
		}

		/**
		* get permissions of file
		* @var String $path File Path
		* @return int 
		**/
		public static function getPermissions($path=null)
		{
			return fileperms($path);
		}

		/**
		* get owner of file
		* @var String $path File Path
		* @return int 
		**/
		public static function getOwner($path=null)
		{
			return fileowner($path);
		}
		

		/**
		* get type of file
		* @var String $path File Path
		* @return string 
		**/
		public static function getType($path=null)
		{
			return filetype($path);
		}



		/**
		* get total space 
		* @var String $path File Path
		* @return int 
		**/
		public static function getTotalSpace($path="")
		{
			return disk_total_space($path);
		}
                
	}
}


?>