<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

// Create a new instance of the Event class
// This allows us to use its structure and functions
$event = new Event($db);

// Set the calendarId property from the GET parameter
$event->calendarId = isset($_GET["id"]) ? $_GET["id"] : die();

// Call the readSingle function to fetch the event
$event->readSingle();

// Check if an event was found
if($event->eventDate != null){
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
    echo json_encode(array("message"=>"No events found."));
}


?>