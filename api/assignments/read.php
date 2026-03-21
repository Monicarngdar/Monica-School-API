<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

//Create a new instance of the Unit class
//This allows us to use its structure and functions

$assignments = new Assignments($db);

$result = $assignments->read();
$num = $result->rowCount();

if($num > 0){
    $assignments_list = array();
    $assignments_list ['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $assignments_item = array(
            "assignmentId" => $assignmentId,
            "userId" => $userId,
            "unitId" => $unitId,
            "taskTitle" => $taskTitle,
            "taskDescription" => $taskDescription,
            "maxMark" => $maxMark,
            "dueDate" => $dueDate,
        );

        array_push($assignments_list['data'], $assignments_item);

    }

    echo json_encode($assignments_list);
}
else{
    echo json_encode(array("message"=>"No assignments found."));
}
?>