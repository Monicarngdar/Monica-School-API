<?php 

$db_user  = "root";
$db_password = "";
$db_name = "";

//PDO - PHP Data Objects
// This is used for object data Programming
// Creating an "object" makes our code more organised

    
$db = new PDO(
    'mysql:host=localhost;dbname=' . $db_name . ';charset=utf8',
    $db_user,
    $db_password
);

//set some db attributes 
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>

