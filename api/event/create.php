<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

// Create a new instance of the Event class
// This allows us to use its structure and functions
$event= new Event($db);

// read submitted json data from request body 
$data = json_decode(file_get_contents("php://input"));

// fill in event instance properties with decoded values from request
$event->userId = $data->userId;
$event->eventDate = $data->eventDate;
$event->eventDescription = $data->eventDescription;
$event->eventType = $data->eventType;

if($event->create()){
    echo json_encode(array("message" => "Event created."));
}
else{
    echo json_encode(array("message" => "Event not created."));
}