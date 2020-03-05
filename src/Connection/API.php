<?php declare(strict_types = 1); 

namespace API\Connection;

use stdClass;

class API 
{
    use Singleton; 

    public function connectToApi() 
    {

    }

    public static function CamelConvertToStd(array $params = []) 
    {
        if (!empty($params)) 
        {
            $object = new stdClass(); 

            foreach($params as $key => $value) 
            {
                $value = self::CamelConvertToStd($value);
            }

            $object->{$key} = $value;
        }

        return $object;
    }
}

?>