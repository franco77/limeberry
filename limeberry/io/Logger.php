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
    use limeberry\io\SpecialDirectory as SpecialDirectories;
    use limeberry\io\FileSystem as fs;
    /**
     * This class is used to generate logs. You can use the functions of class for creating
     * Error files, warning files or output messages.
     * Created txt files will be located in 'output' folder of your application.
     */
    class Logger
    {
       
        
        /**
         *  Create an output log file.
         * @param type $logType LogProvider log type
         * @param type $logTitle title for your log
         * @param type $logMessage log message
         */
        public static function Output($logType=2, $logTitle="LOG", $logMessage="NULL")
        {
            switch ($logType) {
                case 0:
                    #ERROR
                    fs::Append(SpecialDirectories::OutputFolder().DS.'Errors.txt',"[{$logTitle}] : {$logMessage}");
                    break;
                case 1:
                    #WARNING
                    fs::Append(SpecialDirectories::OutputFolder().DS.'Warnings.txt',"[{$logTitle}] : {$logMessage}");
                    break;
                case 2:
                    #OUTPUTMESSAGE
                    fs::Append(SpecialDirectories::OutputFolder().DS.'Outputs.txt',"[{$logTitle}] : {$logMessage}");
                    break;
                
                default:
                    #OUTPUTS
                    fs::Append(SpecialDirectories::OutputFolder().DS.'Outputs.txt',"[{$logTitle}] : {$logMessage}");
                    break;
            }
        }
        
        
    }
  
}

?>