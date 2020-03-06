<?php 

function path($file = 'entrance') 
{
    $templatePath = __DIR__ . DS . '%s'; 
    
    switch(strtolower($file)) 
    {
        case 'entrance': 
            return sprintf($templatePath, ucfirst($file));
        break; 
        
        default: 
        
    break;
    }
}


?>