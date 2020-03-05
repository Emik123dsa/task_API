<?php

    ini_set('display_errors', 1); 
    ini_set('display_start_errors', 1);
    error_reporting(E_ALL);
    
    //declare(strict_types=1);
    define('DS', DIRECTORY_SEPARATOR); 

    require_once __DIR__ . DS . 'vendor' . DS . 'autoload.php';

$url = 'https://iiko.biz:9900/api/0/auth/access_token'; 

$options = [
    'user_id'     => 'demoDelivery',
    'user_secret'  => 'PI1yFaKFCGvvJKi'
];

    function init(string $url, array $options) {

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($options));

$response = curl_exec($ch);
$data = json_decode($response, true); 

curl_close($ch);

return $data;

}

$url_tree = 'https://iiko.biz:9900/api/0/nomenclature/';
$url_weather = 'https://samples.openweathermap.org/data/2.5/weather';
$ch = curl_init(); 

$features = 
[
    'organID' => '{1721531da-7ed5-4cf8-3ad1f-370031d2e6b1}'
];

$query = 
[
    'access_token' => init($url, $options)
];

$weather = array('q' => 'London,uk', 'appid' => 'b6907d289e10d714a6e88b30761fae22');

//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_URL, $url_tree . $features['organID'] .'?' . http_build_query($query)); 
//curl_setopt($ch, CURLOPT_POST, 1); 
//curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url_weather . '?' . http_build_query($weather)); 
$response = curl_exec($ch); 

$data = json_decode($response, true); 
curl_close($ch);
echo '<pre>';

function convertToObject(array $params) 
{
    $object =new \stdClass(); 

    foreach ($params as $key => $value) 
    {
        if (is_array($value)) 
        {
            $value = convertToObject($value);
        }

        $object->$key = $value;
    }
    return $object;
}

$data = convertToObject($data);

foreach ($data as $item => $key) 
{
    echo $data->{$key};
}
?>