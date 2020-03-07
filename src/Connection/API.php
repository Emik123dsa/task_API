<?php declare(strict_types = 1); 

namespace API\Connection;

use API\Config\Config;
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
     * Token for auth
     *
     * @var [type]
     */
    protected $token;
    protected $list;
    public function getAPITree() 
    {
        $this->ch = curl_init(); 
        if (isset($this->url)) {

         $organId = $this->list->{'0'}->id;
         
         $query = 
         [
             'access_token' => $this->token
         ];

         $this->setOptGET($this->ch, $query, $this->url, $organId);

         $data = $this->execute($this->ch);  
        
         $this->close($this->ch);

         return $this->fetchData($data);

    } else 
    {
        $this->close($this->ch);
    }
    }
    /**
     * Connect to api via singleton
     *
     * @return array
     */
    private function getApi($mode) 
    {
        $ch = curl_init(); 
        
        if ($mode !== null) {
        $mode = mb_strtolower($mode); 

        switch ($mode) 
        {
            case 'token': 
                $url = Config::item('main', 'baseUrlToken'); 
                $options = Config::group('auth');
                if (is_array($this->options) || is_string($url)) {

                $this->setOptGET($ch, $options, $url); 
                
                $data = $this->execute($ch);
                
                $this->close($ch); 
                
                return $this->fetchData($data);
            }
            break;

            case 'list': 

                $url = Config::item('main', 'baseUrlList');
                $query = 
                [
                    'access_token' => $this->token
                ];

                if (is_string($url)) {

                $this->setOptGET($ch, $query, $url); 
                
                $data = $this->execute($ch);
                
                $this->close($ch); 
                
                return $this->fetchData($data);
            }
            break;
            default: 
                throw new \InvalidArgumentException(sprintf('This entity does not exist', $mode));
            break; 
        }

    } else 
    {
        $this->close($ch);
    }

    }
    /**
     * Execution for curl
     *
     * @param boolean $mode
     * @return array
     */
    private function execute($ch, $mode = true) 
    {
        $response = curl_exec($ch);

        if(!$response = curl_exec($ch)) 
        {
            trigger_error(curl_error($ch));
        }

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
    private function setOptGET($ch, $options = [], $url = [], $features = '',  $modeHOST = CURLOPT_SSL_VERIFYHOST, $modePeer = CURLOPT_SSL_VERIFYPEER) 
    {
        if(!is_array($options) || !is_array($url)) {

            $default = [

            CURLOPT_URL => $url . $features . '?' . http_build_query($options),
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_DNS_USE_GLOBAL_CACHE => false,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0

            ];

        curl_setopt_array($ch, $default);

        curl_setopt($ch, $modeHOST, 0); 

        curl_setopt($ch, $modePeer, 0);
        
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
     * Fetch Total data
     *
     * @return void
     */ 
    private function fetchData($data) 
    {
        if (is_array($data) && isset($data)) {

            $dataCamel = static::CamelConvertToStd($data); 

        return $dataCamel;

        } else {
          
            return $data;

        }
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

    public static function GUID()
    {
        $data = (string) getGUID(); 
        
        if (isset($data)) 
        {
            return str_replace('\r', '', $data); 
        }
    }
    
}

?>