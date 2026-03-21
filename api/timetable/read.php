<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

//Create a new instance of the Timetable class
//This allows us to use its structure and functions

$timetable = new Timetable($db);

$result = $timetable->read();
$num = $result->rowCount();

if($num > 0){
    $timetables_list = array();
    $timetables_list ['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $timetable_item = array(
            "unitTimetableId" => $unitTimetableId,
            "unitId" => $unitId,
            "classId" => $classId,
            "lecturerId" => $lecturerId,
            "room" => $room,
            "day" => $day,
            "startTime" => $startTime,
            "endTime" => $endTime,
        );

        array_push($timetables_list['data'], $timetable_item);

    }

    echo json_encode($timetables_list);
}
else{
    echo json_encode(array("message"=>"No timetables found."));
}
?>