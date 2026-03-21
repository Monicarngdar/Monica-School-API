<?php 
// This is a Database handler
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'Users' . DS . 'monic' . DS . 'Desktop' . DS . 'XAMPP' . DS . 'htdocs' . DS . 'Monica-School-API');
require_once (SITE_ROOT.DS.'includes-api'.DS.'config.php');
$server = "localhost";
$dbName = $db_name;
$dbUsername = $db_user;
$dbPassword = $db_password;

$conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

?>