<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'Users' . DS . 'monic' . DS . 'Desktop' . DS . 'XAMPP' . DS . 'htdocs' . DS . 'Monica-School-API');

defined("CORE_PATH") ? null : define("CORE_PATH",SITE_ROOT.DS."core".DS);

require_once("config.php");

// define the class files
require_once(CORE_PATH."user.php");
require_once(CORE_PATH."timetable.php");
require_once(CORE_PATH."units.php");


?>