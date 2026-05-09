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


if (!$oauthUser->userId) {
    http_response_code(401); // 401 Unauthorized
    echo json_encode(array("message" => "Invalid or missing OAuth2 Bearer."));
    die();
    }

//Create a new instance of the Class
//This allows us to use its structure and functions
$class = new StudentClass($db);

$class->classStudentId = $oauthUser->userId;

$class->readSingle();
// Check if user exists
if($class->classId != null){
     // Success response
    http_response_code(200);
    $user_info = array(
        'classStudentId' => $class->classStudentId,
        'classId' => $class->classId,
        'studentId' => $class->studentId

    );

    echo json_encode($user_info);

}else{
    // No data found response
    http_response_code(404);
    echo json_encode(array("message" => "Class for user not found."));
}
?>