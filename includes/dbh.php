<?php 
// This is a Database handler
require_once ("includes-api/config.php");
$server = "localhost";
$dbName = $db_name;
$dbUsername = $db_user;
$dbPassword = $db_password;

$conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

?>