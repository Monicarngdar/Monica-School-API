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

<h2>Patch Use Address</h2>
<form action="result.php">
        Street 1<input type="text" name = "street1" value ="">
        Street 2<input type="text" name = "street2" value ="">
        City <input type="text" name = "city" value ="">
        Post Code <input type="text" name = "postCode" value ="">
        User Id <input type="text" name = "userId" value ="">
     <input type = "submit" name = "api" value = "updateUserAddress" >
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

<h2>Delete Assignment</h2>
<form action="result.php">
   Assignment Id<input type="text" name = "id" value ="">
    <input type = "submit" name = "api" value = "deleteAssignment" >
</form>

<h2>Get Events</h2>
<form action="result.php">
    <input type = "submit" name = "api" value = "events" >
</form>

<h2>Create Event</h2>
<form action="result.php">
        Event Date<input type="text" name = "eventDate" value ="">
        Event Description<input type="text" name = "eventDescription" value ="">
        Event Type<input type="text" name = "eventType" value ="">
        User Id<input type="text" name = "userId" value ="">
      <input type = "submit" name = "api" value = "createEvent" >
</form>

<h2>Update Event</h2>
<form action="result.php">
        Event Date<input type="text" name = "eventDate" value ="">
        Event Description<input type="text" name = "eventDescription" value ="">
        Event Type<input type="text" name = "eventType" value ="">
        User Id<input type="text" name = "userId" value ="">
        Calendar Id<input type="text" name = "calendarId" value ="">
       <input type = "submit" name = "api" value = "updateEvent" >
</form>

<h2>Delete Event</h2>
<form action="result.php">
   Event Id<input type="text" name = "id" value ="">
    <input type = "submit" name = "api" value = "deleteEvent" >
</form>





</body>
</html>