<?php 

function path($data, $file = 'entrance') 
{
    $templatePath = __DIR__ . DS . '%s' . DS . $data . '%s'; 

    $php = '.php';
    
    switch(strtolower($file)) 
    {
        case 'entrance': 
            return sprintf($templatePath, ucfirst($file), (string) $php);
        break; 
        
        default: 
        
    break;
    }
}

function getGUID(int $salt = 0) 
    {
        if (function_exists("com_create_guid")) 
        {
            return com_create_guid();
        } else 
        {
            mt_srand((double)microtime()*10000);

            $charId = md5(uniqid(rand(), true));

            $hyphen = chr(45);

            $uuid =substr($charId, 0, 8).$hyphen

        .substr($charId, 8, 4).$hyphen
        .substr($charId,12, 4).$hyphen
        .substr($charId,16, 4).$hyphen
        .substr($charId,20,12);

        return $uuid;
        
        }


    }

?>