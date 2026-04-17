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

$result = $user->read();
$num = $result->rowCount();

if($num > 0){
     // Success response
    http_response_code(200);
    $users_list = array();
    $users_list ['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $user_item = array(
            "userId" => $userId,
            "name" => $name,
            "surname" => $surname,
            "email" => $email,
            "date_of_birth" => $date_of_birth,
            "street1" => $street1,
            "street2" => $street2,
            "city" => $city,
            "postCode" => $postCode,
        );

        array_push($users_list['data'], $user_item);

    }

    echo json_encode($users_list);
}
else{
    // No data found response
     http_response_code(404);
    echo json_encode(array("message"=>"No users found."));
}
?>