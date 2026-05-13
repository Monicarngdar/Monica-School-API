<?php

function apiRequest($url, $method = "GET", $data = null) // function to send API requests using cURL
{
    $curl = curl_init();     // Initialize cURL session

// get the OAuth 2.0 token from a cookie
    $token = isset($_COOKIE['token']) ? $_COOKIE['token'] : '';
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

 // If data is provided, encode it as JSON and attach to request body
    if ($data) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    }

    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
         "Authorization: Bearer " . $token
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
function getUserById()
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/user/readSingle.php");
}
// PATCH will send only the updated fields
function updateUserAddress()
{
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
function getTimetable($classId)
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/timetable/read.php?classId=$classId");
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


/* Events  */
function getEvents()
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/event/read.php");
}
function createEvent()
{
    $data["eventDate"]= $_REQUEST["eventDate"];
    $data["eventDescription"]= $_REQUEST["eventDescription"];
    $data["eventType"]= $_REQUEST["eventType"];
    return apiRequest("http://localhost:8080/Monica-School-API/api/event/create.php?", "POST", $data);   // Send POST request to create an event
}
function updateEvent()
{
    $data["calendarId"]= $_REQUEST["calendarId"];
    $data["eventDate"]= $_REQUEST["eventDate"];
    $data["eventDescription"]= $_REQUEST["eventDescription"];
    $data["eventType"]= $_REQUEST["eventType"];
    return apiRequest("http://localhost:8080/Monica-School-API/api/event/update.php","PUT", $data);    // Send PUT request to update an event
}

function deleteEvent($id)
{
    return apiRequest("http://localhost:8080/Monica-School-API/api/event/delete.php?id=$id", "DELETE"); // Send DELETE request to delete an event
}


?>