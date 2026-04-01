<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");


include_once("../../includes-api/initialize.php");

//Create a new instance of the Event class
//This allows us to use its structure and functions

$events = new Event($db);

$result = $events->read();
$num = $result->rowCount();

if($num > 0){
    $events_list = array();
    $events_list ['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $events_item = array(
            "calendarId" => $calendarId,
            "userId" => $userId,
            "eventDate" => $eventDate,
            "eventDescription" => $eventDescription,
            "eventType" => $eventType,
        );

        array_push($events_list['data'], $events_item);

    }

    echo json_encode($events_list);
}
else{
    echo json_encode(array("message"=>"No events found."));
}
?>