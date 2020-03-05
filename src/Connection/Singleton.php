<?php declare(strict_types = 1); 

namespace API\Connection;

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
    private function __construct() {}
    private function __wakeup() {}
    private function __clone() {}

    /**
     * getInstance for trait confronting
     *
     * @return void
     */
    public function getInstance() 
    {
        if (!isset(static::$_instance)) 
        {
            static::$_instance = new self; 
        }
        
        return static::$_instance; 
    }

}


?>