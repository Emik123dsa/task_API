<?php 

namespace API\Config; 

class Repository 
{
    /**
     * Static stored data for determination
     *
     * @var array
     */
    protected static $stored = []; 
    /**
     * Store for config fetch
     *
     * @param [type] $data
     * @param [type] $group
     * @param [type] $key
     * @return void
     */
    public static function store($group, $key, $data) 
    {
        if(!isset(static::$stored) || !is_array(static::$stored)) 
        {
            static::$stored[$group] = [];
            
        }
        
        static::$stored[$group][$key] = $data;
    }
    /**
     * Static function for data retrieving
     * Identified by group and key 
     *
     * @param [type] $group
     * @param [type] $key
     * @return void
     */
    public static function retrieve($group, $key) 
    {
        return isset(static::$stored[$group][$key]) ? static::$stored[$group][$key] : [];
    }
    /**
     * Static function for data retrieving
     * Identified by group exceptionally
     *
     * @param [type] $group
     * @return void
     */
    public static function retrieveByGroup($group) 
    {
        return isset(static::$stored[$group]) ? static::$stored[$group] : [];
    }
}
?>