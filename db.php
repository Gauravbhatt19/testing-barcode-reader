<?php

/** The name of the database */
$db_name='barcode';


/** MySQL database username */
$db_user='root';


/** MySQL database password */
$db_password='';


/** MySQL hostname */
$db_host='localhost';

include_once __DIR__.'/config.php';

$connection=mysqli_connect($db_host,$db_user,$db_password,$db_name);

if (mysqli_connect_error()) {
    die("Database connection failed: " . 
    mysqli_connect_error());
    }
    $create_table = 'CREATE TABLE IF NOT EXISTS `item` (
        `id` int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        `barcode` text DEFAULT NULL,
        `datereg` text DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4';
    
    $create_tbl =$connection->query($create_table);
    if (!$create_tbl)
    {
        echo "something went wrong with database!!";  
    }
    

?>