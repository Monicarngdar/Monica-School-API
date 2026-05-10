<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Dashboard</title>
</head>
<body>

<?php
require_once "includes-api/functions.php";
?>


<?php if ($_REQUEST["api"]=="setToken"){ 
    setcookie("token", $_POST['token'], time() + 3600, "/");
    header("Location: " . "index.php"); 
    exit;
}

?>
 

<!-- Users  -->
<?php if ($_REQUEST["api"]=="users"){

$result =getUsers(); // getUsers calls the api via cURL
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
    $data = $result["data"];

foreach ($data as $user) {
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Fullname:</b> {$user['name']} {$user['surname']}</p>";
    echo "<p><b>Email:</b> {$user['email']}</p>";
    echo "<p><b>Street:</b> {$user['street1']} {$user['street2']}</p>";
    echo "<p><b>City:</b> {$user['city']}</p>";
    echo "</div>";
      }
    }
}

?> 

<?php if ($_REQUEST["api"]=="user"){

$result = getUserbyId(); 
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Fullname:</b> {$result['name']} {$result['surname']}</p>";
    echo "<p><b>Email:</b> {$result['email']}</p>";
    echo "<p><b>Street:</b> {$result['street1']} {$result['street2']}</p>";
    echo "<p><b>City:</b> {$result['city']}</p>";
    echo "<p><b>Postcode:</b> {$result['postCode']}</p>";
    echo "</div>";
    }
}
?> 

<!-- Patch User Address -->
<?php
if ($_REQUEST["api"]=="updateUserAddress"){

$result = updateUserAddress();
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
}
?>

<!-- Units Lecturers-->
<?php
if ($_REQUEST["api"]=="unitLecturer") {

$result = getUnitLecturers($_REQUEST["unitId"]);
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
$data = $result["data"];

foreach ($data as $u) {
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Fullname:</b>{$u['name']} {$u['surname']}</p>";
    echo "</div>";
        }
    }
}
?>


<!-- Units -->
<?php
if ($_REQUEST["api"]=="units") {

$result = getUnits();
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
$data = $result["data"];

foreach ($data as $unit) {
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Semester:</b> {$unit['semester']}</p>";
    echo "<p><b>Name:</b> {$unit['unitName']}</p>";
    echo "<p><b>Description:</b> {$unit['unitDescription']}</p>";
    echo "</div>";
     }
    }
}
?>


<!-- Timetable -->
<?php
if ($_REQUEST["api"]=="timetable"){

$result = getTimetable($_REQUEST["classId"]);
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
$data = $result["data"];

foreach ($data as $t) {
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Room:</b> {$t['room']}</p>";
    echo "<p><b>Day:</b> {$t['day']}</p>";
    echo "<p><b>Time:</b> {$t['startTime']} - {$t['endTime']}</p>";
    echo "</div>";  
        }
    }
}
?>


<!-- Grades -->
<?php
if ($_REQUEST["api"]=="grades"){

$result = getGrades();
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
$data = $result["data"];

foreach ($data as $g) {
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Marks:</b> {$g['marksEarned']}</p>";
    echo "<p><b>Comment:</b> {$g['lecturerComment']}</p>";
    echo "<p><b>Date:</b> {$g['dateRecorded']}</p>";
    echo "</div>"   ;
        }
    }
}
?>


<!-- Attendance -->
<?php
if ($_REQUEST["api"]=="attendance"){

$result = getAttendance();
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{

$data = $result["data"];

foreach ($data as $a) {
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Date:</b> {$a['date']}</p>";
    echo "<p><b>Status:</b> {$a['status']}</p>";
    echo "</div>";
        }   
    }
}
?>


<!-- Assignments -->
<?php
if ($_REQUEST["api"]=="assignments"){

$result = getAssignments();
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
$data = $result["data"];

foreach ($data as $a) {
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Title:</b> {$a['taskTitle']}</p>";
    echo "<p><b>Description:</b> {$a['taskDescription']}</p>";
    echo "<p><b>Max Mark:</b> {$a['maxMark']}</p>";
    echo "<p><b>Due:</b> {$a['dueDate']}</p>";
    echo "</div>";
        }
    }
}
?>


<!-- Events -->
<?php
if ($_REQUEST["api"]=="events"){

$result = getEvents();
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
$data = $result["data"];

foreach ($data as $e) {
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Date:</b> {$e['eventDate']}</p>";
    echo "<p><b>Description:</b> {$e['eventDescription']}</p>";
    echo "<p><b>Type:</b> {$e['eventType']}</p>";
    echo "</div>";
        }   
    }             
}
?>

<!-- Create Event -->
<?php
if ($_REQUEST["api"]=="createEvent"){

$result = createEvent();
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
   echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";  
    }
}
?>

<!-- Update Event -->
<?php
if ($_REQUEST["api"]=="updateEvent"){

$result = updateEvent();
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
   echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
}
?>

<!-- Delete Event -->
<?php
if ($_REQUEST["api"]=="deleteEvent"){

$result = deleteEvent($_REQUEST["id"]);
    if (isset($result["message"])){
    echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
    else{
   echo "<div style='border:1px solid black; margin:10px; padding:10px'>";
    echo "<p><b>Message:</b> {$result['message']}";
    echo "</div>";
    }
}

?>
</body>
</html>