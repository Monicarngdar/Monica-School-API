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

     // Only the student user can access their list of units
if ($oauthUser->roleId!=1) {
    http_response_code(403); // 403 Forbidden
    echo json_encode(array("message" => "You do not have the necessary permissions to access this resource."));
    die();
    }

//Create a new instance of the Unit class
//This allows us to use its structure and functions
$unit = new Unit($db);
$unit->studentId = $oauthUser->userId;
$result = $unit->read();
$num = $result->rowCount();

if($num > 0){
    // Success response
    http_response_code(200);
    $units_list = array();
    $units_list ['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $unit_item = array(
            "unitId" => $unitId,
            "courseId" => $courseId,
            "semester" => $semester,
            "unitName" => $unitName,
            "unitDescription" => $unitDescription,
        );

        array_push($units_list['data'], $unit_item);

    }

    echo json_encode($units_list);
}
else{
    // No data found response
     http_response_code(404);
    echo json_encode(array("message"=>"No units found."));
}
?>