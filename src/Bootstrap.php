<?php
    require_once __DIR__ . DS . '..' . DS . 'vendor' . DS . 'autoload.php';

    require_once __DIR__ . DS. 'Functions.php';
    class_alias('\\API\\Config\\Config', 'Config'); 

    use API\Connection\API; 

    $api = API::getInstance();

    $features = $api->getAPITree();
    
    include __DIR__ . DS . 'template' . DS .'index.php';
?>
