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
    use limeberry\Configuration as Conf;
    /**
     * Limeberry PHP Cookie Class
     * A simple cookie management class for Limeberry PHP Framework with cookie encryption.
     */
    class Cookie
    {
        private $cookie_name;
        private $cookie_value;
        private $cookie_time;
        private $cookie_is_encrypted;
        private $cookie_encryption_key;
        private $cookie_domain;
        private $cookie_httpOnly;
        private $cookie_secure;
        private $cookie_path;
        
        
        /**
         * Initialize cookie class
         * @param String $name Cookie name
         * @param String $value Cookie value
         * @param Integer $expire Cookie expire seconds
         * @param String $path Set active path for cookie
         * @param String $domain Set active domain for path
         * @param Boolean $secure True for Allow Only HTTPS
         * @param Boolean $httpOnly When TRUE the cookie will be made accessible only through the HTTP protocol. This means that the cookie won't be accessible by scripting languages, such as JavaScript
         */
        function __construct($name = "test_cookie", $value = "test cookie value", $expire = 3600, $path = "", $domain = "", $secure = FALSE, $httpOnly = FALSE)
        {
            $this->cookie_name = $name;
            $this->cookie_value = $value;
            $this->cookie_time = $expire;
            $this->cookie_secure = $secure;
            $this->cookie_path = $path;
            $this->cookie_domain = $domain;
            $this->cookie_httpOnly = $httpOnly;
            $this->cookie_is_encrypted = FALSE;
        }
        
        
        /**
         * Get's the cookie value. Returns false if cookie is not available
         * @return mixed Cookie Value
         */
        public function __toString()
        {
            if(isset($_COOKIE[$this->cookie_name])){
                if($this->cookie_is_encrypted){
                   return $this->CookieCryption('d',$_COOKIE[$this->cookie_name]);
                }else{
                    return $_COOKIE[$this->cookie_name];
                }
            }else{
                return FALSE;
            }
        }

        
        /**
         * If cookie is set removes it.
         */
        public function Destroy()
        {
            if(isset($_COOKIE[$this->cookie_name]) && !empty($_COOKIE[$this->cookie_name])){
                setcookie($this->cookie_name, NULL);
                unset($_COOKIE[$this->cookie_name]);
                return true;
            }else{
                return false;
            }
            
        }
        
        /**
         * Get's the cookie value. Returns false if cookie is not available
         * @return mixed Cookie Value
         */
        public function Revert()
        {
            if(isset($_COOKIE[$this->cookie_name])){
                if($this->cookie_is_encrypted){
                   return $this->CookieCryption('d',$_COOKIE[$this->cookie_name]);
                }else{
                    return $_COOKIE[$this->cookie_name];
                }
            }else{
                return FALSE;
            }
        }
        
        /**
         * This function is used to store set cookie.
         */
        public function Store()
        {
            setcookie($this->_getName(), $this->_getValue(), $this->_getExpire(), $this->_getPath(), $this->_getDomain(), $this->_getSecure(), $this->_getHttponly());
        }
        
       
        
        /**
         * Cookie name
         * @param String $name
         */
        public function setName($name)
        {
            $this->cookie_name = $name;
            return $this;
        }
        
        /**
         * Cookie data to be stored
         * @param String $value
         */
        public function setValue($value)
        {
            $this->cookie_value = $value;
            return $this;
        }
        
        /**
         * 
         * @param Integer $time
         */
        public function setExpire($time)
        {
            $this->cookie_time = $time;
            return $this;
        }
        
        /**
         * Set active path for cookie
         * @param String $path
         */
        public function setPath($path)
        {
            $this->cookie_path = $path;
            return $this;
        }
        
        /**
         * Set active domain for path
         * @param String $domain
         */
        public function setDomain($domain)
        {
            $this->cookie_domain = $domain;
            return $this;
        }
        
        /**
         * True for Allow Only HTTPS
         * @param Boolean $secure
         */
        public function setHttpsOnly($secure)
        {
            $this->cookie_secure = $secure;
            return $this;
        }
        
        /**
         * When TRUE the cookie will be made accessible only through the HTTP protocol. This means that the cookie won't be accessible by scripting languages, such as JavaScript
         * @param Boolean $httpOnly
         */
        public function setHttpOnly($httpOnly)
        {
            $this->cookie_httpOnly = $httpOnly;
            return $this;
        }
        
        /**
         * 
         * @param Boolean $isSet True for enabling encryption
         * @param String $key A secret encryption key if first parameter is set to true.
         * @return $this
         */
        public function setEncryption($isSet, $key)
        {
           $this->cookie_is_encrypted = $isSet;
           $this->cookie_encryption_key = $key;
           return $this;
       }


        
        /**
         * This function is used to determine if cookies are enabled or disabled.
         * Returns TRUE if cookies are enabled, false for disabled.
         */
        public static function isEnabled()
        {
            if(count($_COOKIE) > 0){
                //Cookies are enabled.
                return TRUE;
            }else{
                //Cookies are disabled
                return FALSE;
            }
            
        }
        
        /**
         * This function tries to removes all available cookies
         * @return boolean
         */
        public static function DestroyAll()
        {
            try{
                foreach ($_COOKIE as $key=>$data){
                    setcookie($key, NULL);
                    unset($_COOKIE[$key]);

                }
                return TRUE;
            } catch (Exception $ex) {
                return FALSE;
            }
        }
        
        
        
        //[== CLASS PRIVATE FUNCTIONS ==] //
        //*******************************************************************
        
        /**
         * @ignore
         */
        private function _getName()
        {
             if (preg_match("/[=,; \t\r\n\013\014]/", $this->cookie_name))
             {
                 printf("The name %s provided for your cookie is invalid. Please try a new new", $this->cookie_name);
                 return "cookie_with_invalid_name";
             }else{
                 return $this->cookie_name;
             }
        }
        /**
         * @ignore
         */
        private function _getValue()
        {
            if($this->cookie_is_encrypted){
                return $this->CookieCryption('e',$this->cookie_value);
            }else{
                return $this->cookie_value;
            }
            
        }
        /**
         * @ignore
         */
        private function _getExpire()
        {
            return time() + $this->cookie_time;
        }
        /**
         * @ignore
         */
        private function _getPath()
        {
            return $this->cookie_path;
        }
        /**
         * @ignore
         */
        private function _getDomain()
        {
            if(empty($this->cookie_domain) || !is_string($this->cookie_domain))
            {
                $domain = parse_url(Conf::getApplicationUrl());
                return $domain['host']; 
            }else{
                return $this->cookie_domain;
            }
        }
        /**
         * @ignore
         */
        private function _getSecure()
        {
            return $this->cookie_secure;
        }
        /**
         * @ignore
         */
        private function _getHttponly()
        {
            return $this->cookie_httpOnly;
        }
        /**
         * @ignore
         */
        private function CookieCryption($action, $string) {
            $password = substr(hash('sha256', $this->cookie_encryption_key, true), 0, 32);
            if($action == 'e')
            {
                return  base64_encode(openssl_encrypt($string, 'aes-256-cbc', $password, OPENSSL_RAW_DATA, substr(hash('sha256', Conf::getApplicationUrl(), true), 0, 16)));
            }
            if($action == 'd')
            {
                return openssl_decrypt(base64_decode($string), 'aes-256-cbc', $password, OPENSSL_RAW_DATA, substr(hash('sha256', Conf::getApplicationUrl(), true), 0, 16));
            }
        }
    }
}