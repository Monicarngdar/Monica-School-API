<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

if($_SERVER["REQUEST_METHOD"] != "GET"){
    http_response_code(405);
    echo json_encode(array("message" => "Incorrect Request Method used."));
    die();
}

include_once("../../includes-api/initialize.php");

// Create a new instance of the Event class
// This allows us to use its structure and functions
$event = new Event($db);

// Validate ID
if(isset($_GET["id"])){
    $event->calendarId = $_GET["id"];
}else{
    http_response_code(400);
    echo json_encode(array("message" => "Event ID was not provided."));
    die();
}

// Call the readSingle function to fetch the event
$event->readSingle();

// Check if an event was found
if($event->eventDate != null){
       // Success response
    http_response_code(200);
    $event_info = array(
        'calendarId' => $event->calendarId,
        'userId' => $event->userId,
        'eventDate' => $event->eventDate,
        'eventDescription' => $event->eventDescription,
        'eventType' => $event->eventType
    );
    echo json_encode($event_info);
}
else{
    // No data found response
     http_response_code(404);
    echo json_encode(array("message"=>"No events found."));
}


?>