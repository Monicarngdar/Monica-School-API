<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

// Create a new instance of the Event class
// This allows us to use its structure and functions

$event = new Event($db);

$event->calendarId = isset($_GET["id"]) ? $_GET["id"] : die();

if($event->delete()){
    echo json_encode(array("message" => "Event deleted."));
}
else{
    echo json_encode(array("message" => "Event not deleted."));
}