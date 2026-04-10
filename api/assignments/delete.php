<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

// Create a new instance of the Assignment class
// This allows us to use its structure and functions

$assignment = new Assignments($db);

$assignment->assignmentId = isset($_GET["id"]) ? $_GET["id"] : die();

if($assignment->delete()){
    echo json_encode(array("message" => "Assignment deleted."));
}
else{
    echo json_encode(array("message" => "Assignment not deleted."));
}