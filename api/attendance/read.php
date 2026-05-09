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

//Create a new instance of the Attendance class
//This allows us to use its structure and functions
$attendance = new Attendance($db);
$attendance->userAccountId = $oauthUser->userId;
$result = $attendance->read();
$num = $result->rowCount();

if($num > 0){
    // Success response
    http_response_code(200);
    $attendances_list = array();
    $attendances_list ['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $attendance_item = array(
            "attendanceId" => $attendanceId,
            "userAccountId" => $userAccountId,
            "unitId" => $unitId,
            "unitTimetableId" => $unitTimetableId,
            "date" => $date,
            "status" => $status
        );

        array_push($attendances_list['data'], $attendance_item);

    }

    echo json_encode($attendances_list);
}
else{
     // No data found response
     http_response_code(404);
    echo json_encode(array("message"=>"No attendance found."));
}
?>