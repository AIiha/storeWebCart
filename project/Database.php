<?php

 

    function getDatabaseConnection(){
        $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "webStore";
        $username = getenv('C9_USER');
        $password = "";
        
        $GLOBALS['dbConn'] = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        $GLOBALS['dbConn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        return $GLOBALS['dbConn'];
    }


?>
    
