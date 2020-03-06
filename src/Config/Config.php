<?php 

namespace API\Config; 

use API\Config\Repository;

class Config 
{
    /**
     * Item receiving
     *
     * @param $group
     * @param $key
     * @return void
     */
    public static function item($group, $key) 
    {
        if (!Repository::retrieve($group, $key)) 
        {
            self::file($group);
        }

        return Repository::retrieve($group, $key);
    }
    /**
     * Config receiving
     *
     * @param $group
     * @return void
     */
    public static function group($group) 
    {
        if (!Repository::retrieveByGroup($group)) 
        {
            self::file($group);
        }

        return Repository::retrieveByGroup($group);
    }
    /**
     * File for total recieving
     *
     * @param string $data
     * @return void
     */
    public static function file(string $data) 
    {
        $path = path() . DS . $data . '.php';
        
        if (file_exists($path)) 
        {
            $features = include $path; 

            if (is_array($features)) 
            {
                foreach ($features as $feature => $value)
                Repository::store($data, $feature, $value);
            } else 
             {
                throw new \ErrorException(sprintf('Is not array %s', $data));
             }

            return true;
        } 
            else {
        throw new \ErrorException(sprintf('File does not exist %s', $data));
    }
}
}

?>