 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
 <?php

      // Read Users
        echo "<h2>Read All Users</h2>";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/Monica-School-API/api/user/read.php");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type" => "application/json"
        ]);

        $result = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($result, true);
        $data = $result["data"];
        //print_r($data);

       foreach($data as $user){
         echo "<div style='border: 1px solid black; margin-bottom:10px; padding:10px'>";
         echo "<p><b>Fullname:</b>{$user['name']} {$user['surname']}</p>";
         echo "<p><b>Email:</b>{$user['email']}</p>";
         echo "<p><b>Street Address:</b>{$user['street1']} {$user['street2']}</p>";
         echo "<p><b>City:</b>{$user['city']}</p>";
         echo "<p><b>Post Code:</b>{$user['postCode']}</p>";
         echo "</div>";
            }
         
        //echo $result;


        // Read Unit Lecturers
        echo "<h2>Read Unit Lecturers</h2>";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/Monica-School-API/api/unitLecturer/read.php");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type" => "application/json"
        ]);

        $result = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($result, true);
        $data = $result["data"];
        //print_r($data);

       foreach($data as $unitLecturer){
         echo "<p><b>Lecturer Fullname:</b>{$unitLecturer['name']} {$unitLecturer['surname']}</p>";
         echo "</div>";
            }
        //echo $result;


        // Read All Units
        echo "<h2>Read All Units</h2>";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/Monica-School-API/api/unit/read.php");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type" => "application/json"
        ]);

        $result = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($result, true);
        $data = $result["data"];
        //print_r($data);

       foreach($data as $unit){
         echo "<div style='border: 1px solid black; margin-bottom:10px; padding:10px'>";
         echo "<p><b>Semester:</b>{$unit['semester']}</p>";
         echo "<p><b>Unit Name:</b>{$unit['unitName']}</p>";
         echo "<p ><b>Unit Description:</b>{$unit['unitDescription']}</p>";
         echo "</div>";
            }
        //echo $result;


         // Read Timetable
        echo "<h2>Read Timetable</h2>";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/Monica-School-API/api/timetable/read.php");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type" => "application/json"
        ]);

        $result = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($result, true);
        $data = $result["data"];
        //print_r($data);

       foreach($data as $timetable){
         echo "<div style='border: 1px solid black; margin-bottom:10px; padding:10px'>";
         echo "<p><b>Room:</b>{$timetable['room']}</p>";
         echo "<p><b>Day:</b>{$timetable['day']}</p>";
         echo "<p><b>Time:</b>{$timetable['startTime']} {$timetable['endTime']}</p>";
         echo "</div>";
            }
        
        //echo $result;

    // Read Grades
        echo "<h2>Read Grades</h2>";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/Monica-School-API/api/grades/read.php");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type" => "application/json"
        ]);

        $result = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($result, true);
        $data = $result["data"];
        //print_r($data);

       foreach($data as $grades){
         echo "<div style='border: 1px solid black; margin-bottom:10px; padding:10px'>";
         echo "<p><b>Marks Earned:</b>{$grades['marksEarned']}</p>";
         echo "<p><b>Lecturer Comments:</b>{$grades['lecturerComment']}</p>";
         echo "<p><b>Date Recorded:</b>{$grades['dateRecorded']}</p>";
         echo "</div>";
            }
        
        //echo $result;

      // Read Attendance
        echo "<h2>Read Attendance</h2>";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/Monica-School-API/api/attendance/read.php");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type" => "application/json"
        ]);

        $result = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($result, true);
        $data = $result["data"];
        //print_r($data);

       foreach($data as $attendance){
         echo "<div style='border: 1px solid black; margin-bottom:10px; padding:10px'>";
         echo "<p><b>Date:</b>{$attendance['date']}</p>";
         echo "<p><b>Status:</b>{$attendance['status']}</p>";
         echo "</div>";
            }
        
        //echo $result;

      // Read Assignments
        echo "<h2>Read Assignments</h2>";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/Monica-School-API/api/assignments/read.php");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type" => "application/json"
        ]);

        $result = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($result, true);
        $data = $result["data"];
        //print_r($data);

       foreach($data as $assignments){
         echo "<div style='border: 1px solid black; margin-bottom:10px; padding:10px'>";
         echo "<p><b>Task Title:</b>{$assignments['taskTitle']}</p>";
         echo "<p><b>Task Description:</b>{$assignments['taskDescription']}</p>";
         echo "<p><b>Max Mark:</b>{$assignments['maxMark']}</p>";
         echo "<p><b>Due Date:</b>{$assignments['dueDate']}</p>";
         echo "</div>";
            }
        //echo $result;

        // Read Events
        echo "<h2>Read Events</h2>";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8080/Monica-School-API/api/event/read.php");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Content-Type" => "application/json"
        ]);

        $result = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($result, true);
        $data = $result["data"];
        //print_r($data);

       foreach($data as $events){
         echo "<div style='border: 1px solid black; margin-bottom:10px; padding:10px'>";
         echo "<p><b>Event Date:</b>{$events['eventDate']}</p>";
         echo "<p><b>Event Description:</b>{$events['eventDescription']}</p>";
         echo "<p><b>Event Type:</b>{$events['eventType']}</p>";
         echo "</div>";
            }
        //echo $result;

        




        ?>

</body>
</html>