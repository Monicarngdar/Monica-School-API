<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Skolar API</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<main>


<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">

            <div class="card shadow-sm mb-4">

                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0 fw-bold my">My Skolar API Tester</h4>
                </div>

                <div class="card-body">
<?php
$currentToken = isset($_COOKIE['token']) ? $_COOKIE['token'] : 'None Set';
if ($currentToken == "ghp_7kL9mN1oP3qR5sT7uV9wX1yZ3bA5cD7eF9gH1iJ3kL5mN7oP9qR1sT3uV5wX7y"){
    $currentToken = "Admin User";
}
if ($currentToken == "at_3k2j1h0g9f8e7d6c5b4a3z2y1x0w9v8u7t6s5r4q3p2o1n0m9l8k7j6i5h4g3f2"){
    $currentToken = "Zoe Lecturer";
}
if ($currentToken == "ya29.a0AfH6SMC_xL5Rz8N2vV8qZ3kL1mP9nO0pQ7rS2tU4vW6xY8zA0bC2dE4fG6hI8jK"){
    $currentToken = "Kiara Student";
}
?>


<!-- Token Selection Form -->
<div class="alert alert-secondary mb-4">
    <form method="POST"  action="result.php" class="row g-2 align-items-center">
        <div class="col-md-8">
            <select name="token" class="form-select">
                <option value="ghp_7kL9mN1oP3qR5sT7uV9wX1yZ3bA5cD7eF9gH1iJ3kL5mN7oP9qR1sT3uV5wX7y">Admin User</option>
                <option value="at_3k2j1h0g9f8e7d6c5b4a3z2y1x0w9v8u7t6s5r4q3p2o1n0m9l8k7j6i5h4g3f2">Zoe Lecturer</option>
                <option value="ya29.a0AfH6SMC_xL5Rz8N2vV8qZ3kL1mP9nO0pQ7rS2tU4vW6xY8zA0bC2dE4fG6hI8jK">Kiara Student</option>
            </select>
        </div>
        <div class="col-md-4 d-grid">
            <label class="form-label">&nbsp;</label>
            <button type="submit" name="api" value = "setToken" class="btn btn-dark">Switch Token</button>
        </div>
    </form>
    <div class="mt-2 small">
        <strong>Current Token:</strong> 
        <code class="text-break">
            <?php echo $currentToken; ?>
        </code>
    </div>
</div>

<hr>

                    <!-- Users and user -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form action="result.php">
                                <h5>Get All Users</h5>
                                <input class="btn btn-primary" type="submit" name="api" value="users">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="result.php">
                                <h5>Get User</h5>
                                <div class="input-group">
                                    <input class="btn btn-primary" type="submit" name="api" value="user">
                                </div>
                            </form>
                        </div>
                    </div>

                    <hr>

                    <!-- Update user address -->
                    <form action="result.php" class="mb-4">
                        <h5>Update User Address</h5>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <input class="form-control" name="street1" placeholder="Street 1">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="street2" placeholder="Street 2">
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" name="city" placeholder="City">
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" name="postCode" placeholder="Post Code">
                            </div>
                        </div>
                        <input class="btn btn-primary mt-2" type="submit" name="api" value="updateUserAddress">
                    </form>

                    <hr>

                    <!-- Unit lecturers and units -->
                    <div class="row mb-3 align-items-end">
                        <div class="col-md-6">
                            <form action="result.php">
                                <h5>Get Unit Lecturers</h5>
                                <div class="input-group">
                                    <input class="form-control" name="unitId" placeholder="Unit ID">
                                    <input class="btn btn-primary" type="submit" name="api" value="unitLecturer">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="result.php">
                                <h5>Get Units</h5>
                                <input class="btn btn-primary mt-2" type="submit" name="api" value="units">
                            </form>
                        </div>
                    </div>

                    <hr>

                    <!-- Timetable Grades Attendance Assignments -->
                    <div class="row mb-3 text-center">
                        <div class="col-md-3">
                            <form action="result.php">
                                <h5>Timetable</h5>
                                <input class="form-control" name="classId" placeholder="Class ID">
                                <input class="btn btn-primary w-100" type="submit" name="api" value="timetable">
                            </form>
                        </div>

                        <div class="col-md-3">
                            <form action="result.php">
                                <h5>Grades</h5>
                                <input class="btn btn-primary w-100" type="submit" name="api" value="grades">
                            </form>
                        </div>

                        <div class="col-md-3">
                            <form action="result.php">
                                <h5>Attendance</h5>
                                <input class="btn btn-primary w-100" type="submit" name="api" value="attendance">
                            </form>
                        </div>

                        <div class="col-md-3">
                            <form action="result.php">
                                <h5>Assignments</h5>
                                <input class="btn btn-primary w-100" type="submit" name="api" value="assignments">
                            </form>
                        </div>
                    </div>

                    <hr>

                    <!-- Events -->
                    <form action="result.php" class="mb-4">
                        <h5>Get Events</h5>
                        <input class="btn btn-primary" type="submit" name="api" value="events">
                    </form>

                    <!-- Create event -->
                    <form action="result.php" class="mb-4">
                        <h5>Create Event</h5>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <input class="form-control" name="eventDate" placeholder="Event Date">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="eventDescription" placeholder="Event Description">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="eventType" placeholder="Event Type">
                            </div>
                        </div>
                        <input class="btn btn-primary mt-2" type="submit" name="api" value="createEvent">
                    </form>

                    <!-- Update event -->
                    <form action="result.php" class="mb-4">
                        <h5>Update Event</h5>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input class="form-control" name="eventDate" placeholder="Event Date">
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" name="eventDescription" placeholder="Description">
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" name="eventType" placeholder="Type">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="calendarId" placeholder="Calendar ID">
                            </div>
                        </div>
                        <input class="btn btn-primary mt-2" type="submit" name="api" value="updateEvent">

                    </form>
                    <!-- Delete event -->
                    <form action="result.php">
                        <h5>Delete Event</h5>
                        <div class="input-group">
                            <input class="form-control" name="id" placeholder="Event ID">
                            <input class="btn btn-danger" type="submit" name="api" value="deleteEvent">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</main>

</body>
</html>