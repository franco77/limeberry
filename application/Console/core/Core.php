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


class Core
{
    
    /**
     * CLI limeerry logo header
     */
    public static function Header()
    {
        $header = "
\t\t                                                    .        
\t\t                                     ,'+         
\t\t                                  ,',;;          
\t\t                               .+:,,',`          
\t\t                             ,;,::::,'           
\t\t                            '::::',,,            
\t\t                           ;::::',:,+            
\t\t                    '     '::::'::::             
\t\t                    ::    ::::':::,.             
\t\t                    ,,.  ::::'::::'              
\t\t         .:;:.      ,:,  ;::;:::,+               
\t\t      .''''''';;`   :;:; ,:;:::;. :;;;;;;,       
\t\t     ''''''''';;;;  :::,  ::::; ;;;;;;;;;;;,     
\t\t    '''''':,:';;;;; ;:;:  ';,  ;;;;;;;;;;;;;;    
\t\t   '''':       :;;;; :::.+   `;;;;;     `;;;;;   
\t\t  ''''           ;;;;`:;    `;;;;         .;;;;  
\t\t `'''             ;;;;  ,` `;;;;           `;;;. 
\t\t ''':             `;;;;   `;;;;             ,;;; 
\t\t '''               .;;;; `;;;;               ;;; 
\t\t.'''                .;;;;';;;                :;;,
\t\t;'';                 ,;;;;';                 `;;;
\t\t''':                  :;;;;                   ;;;
\t\t:'';                 .';;;;:                  ;;;
\t\t`'''                .;'';;;;,                `;;:
\t\t '''               .;;;' ;;;;.               ;;;,
\t\t ''''             .;;;;   ;;;;.              ;;; 
\t\t '''.           .;;;;     ;;;;`            ;;;; 
\t\t  ''''.         ,;;;;       ;;;;           :;;;  
\t\t   '''''       ;;;;;         ;;;;,        ;;;;:  
\t\t    '''''''''';;;;;           ;;;;;:   `;;;;;;   
\t\t     ;'''''''';;;:             ;;;;;;;;;;;;;:    
\t\t       ;'''''';;                ,;;;;;;;;;;      
\t\t          ```                     `:;;;;,        
\t\t
\n\n\n\n

\t\t LIMEBERRY PHP FRAMEWORK \n
\t\t by: Sinan SALIH \n
\t\t Source: https://github.com/limeberry \n
\t\t Thanks for using Limeberry Framework
";
        
        
        return $header;
    }
    
    /**
     * This method is used to clear commands get from cli.
     * @param string $args Command line argument
     * @return string
     */
    public static function clearArg(&$args)
    {
        return strtolower($args);
    }
    
    
    /**
     * This method is used to check if arguement is set
     * @param string $args Command line argument
     * @return string
     */
    public static function checkArg(&$args, $disable_error_message = false)
    {
        if(isset($args))
        {
            return self::clearArg($args);
        }else{
            if((!$disable_error_message))
            {
                echo "\n [!] Please set a name for your component after create command.\n";
            }
        }
    }
    
}
