<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PUT");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

// Create a new instance of the Event class
// This allows us to use its structure and functions
$event = new Event($db);

// read submitted json data from request body 
$data = json_decode(file_get_contents("php://input"));

// fill in user instance properties with decoded values from request
$event->calendarId = $data->calendarId;
$event->userId = $data->userId;
$event->eventDate = $data->eventDate;
$event->eventDescription = $data->eventDescription;
$event->eventType = $data->eventType;

if($event->update()){
    echo json_encode(array("message" => "Event updated."));
}
else{
    echo json_encode(array("message" => "Event not updated."));
}


?>