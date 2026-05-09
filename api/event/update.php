<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PUT");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

if($_SERVER["REQUEST_METHOD"] != "PUT"){
    http_response_code(405);
    echo json_encode(array("message" => "Incorrect Request Method used."));
    die();
}

include_once("../../includes-api/initialize.php");

if (!$oauthUser->userId) {
    http_response_code(401); // 401 Unauthorized
    echo json_encode(array("message" => "Invalid or missing OAuth2 Bearer."));
    die();
    }


// Create a new instance of the Event class
// This allows us to use its structure and functions
$event = new Event($db);
$event->userId = $oauthUser->userId;

// read submitted json data from request body 
$data = json_decode(file_get_contents("php://input"));

// Validate input
if(
    !empty($data->calendarId) &&
    !empty($data->eventDate) &&
    !empty($data->eventDescription) &&
    !empty($data->eventType)
)
{

// fill in user instance properties with decoded values from request
$event->calendarId = $data->calendarId;
$event->eventDate = $data->eventDate;
$event->eventDescription = $data->eventDescription;
$event->eventType = $data->eventType;

 if($event->update()){
        http_response_code(200);
        echo json_encode(array("message" => "Event updated."));
    }
    else{
        http_response_code(500);
        echo json_encode(array("message" => "Event not updated."));
    }
}
  else{
        http_response_code(400);
        echo json_encode(array("message" => "Incomplete data provided."));
 }
?>