<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'iktam_db'); //Este cambia depende de que base se use
 
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>