<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

//Create a new instance of the Unit class
//This allows us to use its structure and functions

$timetable = new Unit($db);

$result = $timetable->read();
$num = $result->rowCount();

if($num > 0){
    $units_list = array();
    $units_list ['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $timetable_item = array(
            "unitId" => $unitId,
            "courseId" => $courseId,
            "semester" => $semester,
            "unitName" => $unitName,
            "runitDescription" => $unitDescription,
        );

        array_push($units_list['data'], $timetable_item);

    }

    echo json_encode($units_list);
}
else{
    echo json_encode(array("message"=>"No units found."));
}
?>