<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: PATCH");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

if($_SERVER["REQUEST_METHOD"] != "PATCH"){
    http_response_code(405);
    echo json_encode(array("message" => "Incorrect Request Method used."));
    die();
}

include_once("../../includes-api/initialize.php");

// Create a new instance of the User class
$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

// Validate ID
if(!empty($data->userId)){

    $user->userId = $data->userId;
    $user->street1 = $data->street1 ?? null;
    $user->street2 = $data->street2 ?? null;
    $user->city = $data->city ?? null;
    $user->postCode = $data->postCode ?? null;

    if($user->updateAddress()){
        http_response_code(200);
        echo json_encode(array("message" => "Address updated."));
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Address not updated."));
    }

}else{
    http_response_code(400);
    echo json_encode(array("message" => "User ID was not provided."));
}
?>