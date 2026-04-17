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

//Create a new instance of the User class
//This allows us to use its structure and functions
$user = new User($db);

// Validate ID
if(isset($_GET["id"])){
$user->userId = $_GET["id"];
}else{
    http_response_code(400);
    echo json_encode(array("message" => "User ID was not provided."));
    die();
}

$user->readSingle();
// Check if user exists
if($user->email != null){
     // Success response
    http_response_code(200);
    $user_info = array(
        'userId' => $user->userId,
        'name' => $user->name,
        'surname' => $user->surname,
        'email' => $user->email,
        'date_of_birth' => $user->date_of_birth,
        'street1' => $user->street1,
        'street2' => $user->street2,
        'city' => $user->city,
        'postCode' => $user->postCode
    );

    echo json_encode($user_info);

}else{
    // No data found response
    http_response_code(404);
    echo json_encode(array("message" => "User not found."));
}
?>