<?php declare(strict_types = 1); 

namespace API\Connection;

use API\Config\Config;

trait Singleton 
{
    /**
     * Static instance
     *
     * @var [type]
     */
    protected static $_instance; 

    /**
     * Private magic methods for singleton
     */
    private function __construct() 
    {

        $this->url = Config::item('main', 'baseUrlTree'); 

        if (empty($this->token)) {
          
        $this->token = $this->getApiToken();
        
    }
    
    }
    
    private function __wakeup() {}
    private function __clone() {}

    /**
     * getInstance for trait confronting
     *
     * @return void
     */
    public static function getInstance() 
    {
        if (!isset(static::$_instance)) 
        {
            static::$_instance = new self; 
        }
        /**
         * It's not required
         */
        //static::$_instance->connectToApi();

        return static::$_instance; 
    }

}


?>