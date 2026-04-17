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

//Create a new instance of the Unit Lecturer class
//This allows us to use its structure and functions
$unit = new UnitLecturer($db);
$unitId =  isset($_GET["unitId"]) ? $_GET["unitId"] : die ();
$unit -> unitId = $unitId;
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

            "unitLecturerId" => $unitLecturerId,
            "lecturerId" => $lecturerId,
            "unitId" => $unitId,
            "name" => $name,
            "surname" => $surname,

        );

        array_push($units_list['data'], $unit_item);

    }

    echo json_encode($units_list);
}
else{
    // No data found response
     http_response_code(404);
    echo json_encode(array("message"=>"No units of lecturer found."));
}
?>