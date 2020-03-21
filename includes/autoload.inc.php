<?php

spl_autoload_register('classAutoLoader');

function classAutoLoader($className){

    $error_name = $className;

    $path = 'classes/';
    $className = strtolower($className); 
    $extension = '.class.php';
    
    if (substr($className, -5) == "model" || $className == 'dbh'){

        $path .= 'model/';

    } elseif (substr($className, -4) == "view"){

        $path .= 'view/';
    
    } else if (substr($className, -10) == "controller"){

        $path .= 'controller/';

    }

    $fileName = $path . $className . $extension;
    if(!file_exists($fileName)){
        throw new Exception("Class Name:'".$error_name." NOT EXIST ".$fileName);
        return false;
    }

    include_once $fileName;

}

?>