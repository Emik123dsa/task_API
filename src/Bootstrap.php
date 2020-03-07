<?php
    require_once __DIR__ . DS . '..' . DS . 'vendor' . DS . 'autoload.php';

    require_once __DIR__ . DS. 'Functions.php';

    use API\Connection\API; 

    $api = API::getInstance();

    $features = $api->getAPITree();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API fetch</title>
</head>
<body>
    <?php 
    echo '<pre>';
    
    print_r($features); 
    foreach($features as $feature) 
    {
        //print_r($feature->{'0'});
    }
    ?>
</body>
</html>