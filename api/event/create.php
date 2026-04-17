<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

if($_SERVER["REQUEST_METHOD"] != "POST"){
    http_response_code(405);
    echo json_encode(array("message" => "Incorrect Request Method used."));
    die();
}

include_once("../../includes-api/initialize.php");

// Create a new instance of the Event class
// This allows us to use its structure and functions
$event= new Event($db);

// read submitted json data from request body 
$data = json_decode(file_get_contents("php://input"));

// Validate input
if(
    !empty($data->userId) &&
    !empty($data->eventDate) &&
    !empty($data->eventDescription) &&
    !empty($data->eventType)
    )
{
    // Assign values
    $event->userId = $data->userId;
    $event->eventDate = $data->eventDate;
    $event->eventDescription = $data->eventDescription;
    $event->eventType = $data->eventType;

    // Create event
    if($event->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Event created."));
    } 
    else {
        http_response_code(500);
        echo json_encode(array("message" => "Event not created."));
    }
}
    else{
        http_response_code(400);
        echo json_encode(array("message" => "Incomplete data provided."));
    }