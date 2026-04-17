<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

if($_SERVER["REQUEST_METHOD"] != "DELETE"){
    http_response_code(405);
    echo json_encode(array("message" => "Incorrect Request Method used."));
    die();
}

include_once("../../includes-api/initialize.php");

// Create a new instance of the Event class
// This allows us to use its structure and functions
$event = new Event($db);

if(isset($_GET["id"])){
    $event->calendarId = $_GET["id"];

}
// If no ID is provided, return a Bad Request error
else{
    http_response_code(400);
    echo json_encode(array("message" => "Event ID was not provided."));
    die();
}

if($event->delete()){

    http_response_code(200);
    echo json_encode(array("message" => "Event deleted."));

}else{

    http_response_code(500);
    echo json_encode(array("message" => "Event not deleted."));
}