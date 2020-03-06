<?php //declare(strict_types=1);

    ini_set('display_errors', 1); 
    ini_set('display_start_errors', 1);
    error_reporting(E_ALL);

    define('ENV', 'Src'); 

    define('DS', DIRECTORY_SEPARATOR); 

    require_once __DIR__ . DS . mb_strtolower(ENV) . DS . 'Bootstrap.php';

?>

