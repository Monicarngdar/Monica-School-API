<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PATCH");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

// Create a new instance of the User class
// This allows us to use its structure and functions
$user = new User($db);

// read submitted json data from request body 
$data = json_decode(file_get_contents("php://input"));

// fill in user instance properties with decoded values from request
$user->userId = $data->userId;
$user->street1 = $data->street1 ?? null;
$user->street2 = $data->street2 ?? null;
$user->city = $data->city ?? null;
$user->postCode = $data->postCode ?? null;

if($user->updateAddress()){
    echo json_encode(array("message" => "Address updated."));
}
else{
    echo json_encode(array("message" => "Address not updated."));
}


?>