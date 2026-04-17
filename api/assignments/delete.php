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

// Create a new instance of the Assignment class
// This allows us to use its structure and functions
$assignment = new Assignments($db);

if(isset($_GET["id"])){
    $assignment->assignmentId = $_GET["id"];
}
 // If no ID is provided, return a Bad Request error
else{
    http_response_code(400);
    echo json_encode(array("message" => "Assignment ID was not provided."));
    die();
}

if($assignment->delete()){
     http_response_code(200);
    echo json_encode(array("message" => "Assignment deleted."));
}
else{
     http_response_code(500);
    echo json_encode(array("message" => "Assignment not deleted."));
}