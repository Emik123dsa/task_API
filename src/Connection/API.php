<?php declare(strict_types = 1); 

namespace API\Connection;

use stdClass;

class API 
{
    use Singleton; 
    /**
     * Options for api connections
     *
     * @var array
     */
    protected $options = []; 
    /**
     * Requested url for api connection
     *
     * @var [type]
     */
    protected $url;
    /**
     * Requested urlTree according to the token
     *
     * @var [type]
     */
    protected $ch;
    /**
     * Connect to api via singleton
     *
     * @return array
     */
    public function getAPI() 
    {
        $this->setopt($this->ch, $this->options, $this->url); 
        
        $data = $this->execute();
        
        $this->close($this->ch); 
        
        $dataCamel = static::CamelConvertToStd($data); 

        return $dataCamel;
    }
    /**
     * Execution for curl
     *
     * @param boolean $mode
     * @return array
     */
    private function execute($mode = true) 
    {
        $response = curl_exec($this->ch);

        if ($mode = false) { 

        return $response; 

        } elseif ($mode = true) {

        return json_decode($response, true); 

        } else {
            return null;
        }
    }
    /**
     * Establish demand settings
     *
     * @param [type] $ch
     * @param array $options
     * @param array $url
     * @param [type] $modeUrl
     * @param [type] $modeTransfer
     * @return void
     */
    private function setopt($ch, $options = [], $url = [], $modeUrl = CURLOPT_URL, $modeTransfer = CURLOPT_RETURNTRANSFER) 
    {
        if(!is_array($options) || !is_array($url)) {

        curl_setopt($ch, $modeTransfer, 1); 

        curl_setopt($ch, $modeUrl, $url . '?' . http_build_query($options));
        
        }

    }
    /**
     * Standard close connection
     *
     * @param [type] $ch
     * @return void
     */
    private function close($ch) 
    {
        curl_close($ch);
    }
    /**
     * Static camel class to std Object convert
     *
     * @param array $params
     * @return void
     */
    public static function CamelConvertToStd(array $params = []) 
    {
        if (!empty($params)) 
        {
            $object = new stdClass(); 

            foreach($params as $key => $value) 
            {
                if(is_array($value)) {

                $value = static::CamelConvertToStd($value);
                
                }
                $object->$key = $value;
            }
            return $object;
        }
    }
    
}

?>