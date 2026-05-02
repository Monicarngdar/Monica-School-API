<?php

function apiRequest($url, $method = "GET", $data = null)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    if ($data) {
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    }

    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);

    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);
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


/* Unit Lecturers */
function getUnitLecturers($unitId)
{
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

    return apiRequest("http://localhost:8080/Monica-School-API/api/event/create.php?", "POST", $data);
}


?>