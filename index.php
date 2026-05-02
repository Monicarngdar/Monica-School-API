<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Skolar API</title>
</head>
<body>

<h1>My Skolar API Tester</h1>
<h2>Get All Users</h2>
<form action="result.php">
    <input type = "submit" name = "api" value = "users" >
</form>
    
<h2>Get User</h2>
<form action="result.php">
    User Id<input type="text" name = "id" value ="">
    <input type = "submit" name = "api" value = "user" >
</form>

<h2>Get Unit Lecturers</h2>
<form action="result.php">
   Unit Id<input type="text" name = "unitId" value ="">
    <input type = "submit" name = "api" value = "unitLecturer" >
</form>

<h2>Get Units</h2>
<form action="result.php">
    <input type = "submit" name = "api" value = "units" >
</form>

<h2>Get Timetable</h2>
<form action="result.php">
    <input type = "submit" name = "api" value = "timetable" >
</form>

<h2>Get Grades</h2>
<form action="result.php">
    <input type = "submit" name = "api" value = "grades" >
</form>

<h2>Get Attendance</h2>
<form action="result.php">
    <input type = "submit" name = "api" value = "attendance" >
</form>

<h2>Get Assignments</h2>
<form action="result.php">
    <input type = "submit" name = "api" value = "assignments" >
</form>

<h2>Get Events</h2>
<form action="result.php">
    <input type = "submit" name = "api" value = "events" >
</form>

<h2>Create Event</h2>
<form action="result.php">
    <input type = "submit" name = "api" value = "createEvent" >
        Event Date<input type="text" name = "eventDate" value ="">
        Event Description<input type="text" name = "eventDescription" value ="">
        Event Type<input type="text" name = "eventType" value ="">
        User Id<input type="text" name = "userId" value ="">
    
</form>








</body>
</html>