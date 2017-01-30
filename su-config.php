<?php
/**
 * Configuration file
 * 
 * This file is important to all pages changes can be made to constants if  the 
 * need arises
 * @author Ibrahim Isa & Abokor Djama
 * @version 1.0
 */

/**
 * This function will turn output buffering on. While output buffering is active 
 * no output is sent from the script (other than headers), instead the output is 
 * stored in an internal buffer.
 */
ob_start();
/**
 * Sets the value of the given configuration option. The configuration option will 
 * keep this new value during the script's execution, and will be restored at the 
 * script's ending.
 * 
 * In this case it will not display warnings & error reporting exect for real 
 * sytax error 
 */
ini_set('display_errors', 1);

ini_set('error_reporting', E_ERROR);

/**
 * Define File Settings
 */
define('SU_SETTINGS','su-settings.php');

/**
 * The first example class, this is in the same package as the
 * procedural stuff in the start of the file
 * @package nw-config
 * @subpackage config
 */
class config
{   
    /**
     * The db username is assigned here
     * @access public
     * @var string|integer
     */
    protected $db_local_user  = '';
    /**
     * The db password is assigned here 
     * @access public
     * @var string|integer
     */
    protected $db_local_pswd  = '';
    /**
     * The db - Mysql database name
     * @access public
     * @var string|integer
     */
    protected $db_local_base  = '';
    /**
     * The return variable  
     * @access public
     * @var string|integer
     */
    public $return             = '' ;
    
    /**
     * @param none
     * @return string
     * Description : Returns the current parent page folder eg. http://localhost/page/
     */
    public function no_root()
    {
          $directory  = ($_SERVER['HTTP_HOST'] == "localhost") ? dirname($_SERVER["PHP_SELF"])."/" : "/";

          return $directory;
    }
    
    /**
     * @param none
     * @return string   
     * Description : Returns the page url 
     */
    public function get_base_url()
    {
          //Get the protocol the website is using 
          $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';

          // Returns localhost OR mysite.com 
          $host     = $_SERVER['HTTP_HOST'];

          /*
           * Returns:
           * http://localhost/mysite
           * OR
           * https://mysite.com
           */
          return $protocol.$host.config::no_root();
    }

    /**
     * @param  none
     * @return type string
     */
    public function pagDir() 
    {
         
         $this->return  = $_SERVER['DOCUMENT_ROOT'];
        
         $this->return .= config::no_root();
        
         return  $this->return;

    }
}

// Include Settings
include(SU_SETTINGS); 