<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

//Create a new instance of the User class
//This allows us to use its structure and functions
$user = new User($db);

// the following needs to change : call new function with parameter

$user->id =  isset($_GET["id"]) ? $_GET["id"] : die ();

$result = $user->readSingle();
$num = $result->rowCount();

if($num > 0){
    $user_info = array(
        'userId' => $user->userId,
        'name' => $user->name,
        'surname' => $user->surname,
        'email' => $user->email,
        'date_of_birth' => $user->date_of_birth,
        'street1' => $user->street1,
        'street2' => $user->street2,
        'city' => $user->city,
        'postCode' => $user->postCode,
    );
    print_r(json_encode($user_info));
}
else{
    echo json_encode(array("message"=>"No users found."));
}
?>