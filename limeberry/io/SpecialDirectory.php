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
         * This library contains functions which provides you access to special application directories
         * like controller folder, view folder etc..
         */
	class SpecialDirectory
	{

		/**
		* Get where application is running from.
		* @return string
		*/
		public static function ApplicationFolder()
		{
			global $application_folder;
			return ROOT.DS.$application_folder;
		}

		/**
		* Special directory of Limeberry framework.
		* @return string
		*/
		public static function FrameworkFolder()
		{
			global $application_folder;
			return ROOT.DS.'limeberry';
		}



		/**
		* Controller directory of Limeberry framework.
		* @return string
		*/
		public static function ControllerFolder()
		{
			global $application_folder;
			return ROOT.DS.$application_folder.DS.'controller';
		}

		/**
		* Config directory of Limeberry framework.
		* @return string
		*/
		public static function ConfigFolder()
		{
			global $application_folder;
			return ROOT.DS.$application_folder.DS.'config';
		}

		/**
		* Library  directory of Limeberry framework.
		* @return string
		*/
		public static function LibraryFolder()
		{
			global $application_folder;
			return ROOT.DS.$application_folder.DS.'library';
		}

                /**
		* Language  directory of Limeberry framework.
		* @return string
		*/
		public static function LanguageFolder()
		{
			global $application_folder;
			return ROOT.DS.$application_folder.DS.'language';
		}

                
		/**
		* Model directory of Limeberry framework.
		* @return string
		*/
		public static function ModelFolder()
		{
			global $application_folder;
			return ROOT.DS.$application_folder.DS.'model';	
		}
                
                /**
		* Output directory of Limeberry framework.
		* @return string
		*/
		public static function OutputFolder()
		{
			global $application_folder;
			return ROOT.DS.$application_folder.DS.'output';	
		}

		/**
		* Template directory of Limeberry framework.
		* @return string
		*/
		public static function TemplateFolder()
		{
			global $application_folder;
			return ROOT.DS.$application_folder.DS.'template';
		}

		/**
		* View directory of Limeberry framework.
		* @return string
		*/
		public static function ViewFolder()
		{
			global $application_folder;
			return ROOT.DS.$application_folder.DS.'view';
		}
         
	}
}


?>