<?php

function apiRequest($url, $method = "GET", $data = null) // function to send API requests using cURL
{
    $curl = curl_init();     // Initialize cURL session

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

 // If data is provided, encode it as JSON and attach to request body
    if ($data) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    }

    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);

    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);     // Decode JSON response into associative array
}


/* Users */
function getUsers()
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/user/read.php");
}
function getUserById($id)
{
    $data["id"]=$id;
    return apiRequest("http://localhost:8080/Monica-School-API/api/user/readSingle.php?id=$id");
}
// PATCH will send only the updated fields
function updateUserAddress()
{
    $data["userId"]= $_REQUEST["userId"];
    if(!empty($_REQUEST["street1"])){
        $data["street1"]= $_REQUEST["street1"];    // Only include fields if they are not empty (partial update)
    }
    if(!empty($_REQUEST["street2"])){
        $data["street2"]= $_REQUEST["street2"];
    }
    if(!empty($_REQUEST["city"])){
    $data["city"]= $_REQUEST["city"];
    }
    if(!empty($_REQUEST["postCode"])){
    $data["postCode"]= $_REQUEST["postCode"];
    }
    return apiRequest("http://localhost:8080/Monica-School-API/api/user/updateAddress.php","PATCH", $data);     // Send PATCH request to update address
}

/* Unit Lecturers */
function getUnitLecturers($unitId)
{
      // Only send request if unit ID is provided
    if ($unitId) {
        return apiRequest("http://localhost:8080/Monica-School-API/api/unitLecturer/read.php?unitId=$unitId");
    } 
}

/* Units */
function getUnits()
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/unit/read.php");
}


/* Timetable */
function getTimetable()
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/timetable/read.php");
}


/* Grades */
function getGrades()
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/grades/read.php");
}


/* Attendance */
function getAttendance()
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/attendance/read.php");
}


/* Assignments */
function getAssignments()
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/assignments/read.php");
}
function deleteAssignment($id)
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/assignments/delete.php?id=$id", "DELETE");
}



/* Events  */
function getEvents()
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/event/read.php");
}
function createEvent()
{
    $data["userId"]= $_REQUEST["userId"];
    $data["eventDate"]= $_REQUEST["eventDate"];
    $data["eventDescription"]= $_REQUEST["eventDescription"];
    $data["eventType"]= $_REQUEST["eventType"];
    return apiRequest("http://localhost:8080/Monica-School-API/api/event/create.php?", "POST", $data);   // Send POST request to create event
}
function updateEvent()
{
    $data["calendarId"]= $_REQUEST["calendarId"];
    $data["userId"]= $_REQUEST["userId"];
    $data["eventDate"]= $_REQUEST["eventDate"];
    $data["eventDescription"]= $_REQUEST["eventDescription"];
    $data["eventType"]= $_REQUEST["eventType"];
    return apiRequest("http://localhost:8080/Monica-School-API/api/event/update.php","PUT", $data);    // Send PUT request to update event
}

function deleteEvent($id)
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/event/delete.php?id=$id", "DELETE");
}


?>