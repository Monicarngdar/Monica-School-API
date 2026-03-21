<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

//Create a new instance of the Attendance class
//This allows us to use its structure and functions

$attendance = new Attendance($db);

$result = $attendance->read();
$num = $result->rowCount();

if($num > 0){
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
            "status" => $status,
        );

        array_push($attendances_list['data'], $attendance_item);

    }

    echo json_encode($attendances_list);
}
else{
    echo json_encode(array("message"=>"No attendance found."));
}
?>