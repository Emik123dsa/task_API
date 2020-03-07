<?php
    require_once __DIR__ . DS . '..' . DS . 'vendor' . DS . 'autoload.php';

    require_once __DIR__ . DS. 'Functions.php';

    use API\Connection\API; 

    $api = API::getInstance();

    $features = $api->getAPITree();

    foreach($features as $feature) 
    {
        echo $feature;
    }

?>