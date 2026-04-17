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

//Create a new instance of the Grade class
//This allows us to use its structure and functions
$grades = new Grades($db);

$result = $grades->read();
$num = $result->rowCount();

if($num > 0){
     // Success response
    http_response_code(200);
    $grades_list = array();
    $grades_list ['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $grades_item = array(
            "userAccountId" => $userAccountId,
            "assignmentId" => $assignmentId,
            "lecturerUserAccountId" => $lecturerUserAccountId,
            "marksEarned" => $marksEarned,
            "lecturerComment" => $lecturerComment,
            "dateRecorded" => $dateRecorded,
      
        );

        array_push($grades_list['data'], $grades_item);

    }

    echo json_encode($grades_list);
}
else{
    // No data found response
     http_response_code(404);
    echo json_encode(array("message"=>"No grades found."));
}
?>