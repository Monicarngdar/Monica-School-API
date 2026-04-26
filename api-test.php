<?php
// Default values before any request is made
$responseBody = "No request sent yet.";
$statusCode = null;
$errorMsg = null;
$successMsg = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['execute'])) {
    $baseUrl = "http://localhost:8080/Monica-School-API/api/";
    
    // Extract method and the endpoint path
    list($method, $path) = explode('|', $_POST['endpoint']);
    $param = $_POST['url_param'] ?? '';
    $jsonInput = $_POST['json_body'] ?? '';

    $finalUrl = $baseUrl . $path . $param;

    // Initialize the cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $finalUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    // Setup JSON for POST requests
    if ($method === 'POST' && !empty($jsonInput)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonInput);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    }

    $responseBody = curl_exec($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Logic for Error Handling
    if (curl_errno($ch)) {
        $errorMsg = "Connection Error: " . curl_error($ch);
    } 
    elseif ($statusCode >= 200 && $statusCode < 300) {
        // Logic for Success
        $successMsg = "Action completed successfully!";
    } 
    else {
        // Logic for Server Errors
        $errorMsg = "Request Failed: Server returned status code " . $statusCode;
    }

    curl_close($ch);

    // Attempt to format JSON for the output box to make it readable
    $decoded = json_decode($responseBody);
    if (json_last_error() === JSON_ERROR_NONE) {
        $responseBody = json_encode($decoded, JSON_PRETTY_PRINT);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySkolar API Tester</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <form method="POST">
                <div class="card p-4 mb-4">
                    <h2 class="mb-4 my-skolar text-center">MySkolar API</h2>

                    <?php if (!empty($successMsg)): ?>
                    <div class="mb-3">
                        <div class="bg-success text-white text-center py-2 rounded shadow-sm">
                            <p class="mb-0 font-weight-bold"><?php echo htmlspecialchars($successMsg); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($errorMsg)): ?>
                    <div class="mb-3">
                        <div class="bg-danger text-white text-center py-2 rounded shadow-sm">
                            <p class="mb-0 font-weight-bold"> <?php echo htmlspecialchars($errorMsg); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>

                      <!--drop down menus to choose an endpoint to test-->
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Endpoint</label>
                            <select name="endpoint" class="form-select">
                                <optgroup label="Users">
                                    <option value="GET|user/read.php">Read Users</option>
                                    <option value="GET|user/readSingle.php?id=">Read Single User</option>
                                    <option value="POST|user/updateAddress.php">Update Address</option>
                                </optgroup>
                                <optgroup label="Events">
                                    <option value="POST|event/create.php">Create Event</option>
                                    <option value="GET|event/read.php">Read Events</option>
                                    <option value="DELETE|event/delete.php?id=">Delete Event</option>
                                </optgroup>
                                <optgroup label="Other Academics">
                                    <option value="GET|attendance/read.php">Read Attendance</option>
                                    <option value="GET|grades/read.php">Read Grades</option>
                                    <option value="GET|assignments/read.php">Read Assignments</option>
                                </optgroup>
                            </select>
                        </div>

                       <!-- Input for URL parameters (e.g. ID) -->
                        <div class="col-md-4">
                            <label class="form-label">Parameters</label>
                            <input type="text" name="url_param" class="form-control" placeholder="e.g. 25">
                        </div>

                        <!-- Input for JSON request body -->
                        <div class="col-12">
                            <label class="form-label">JSON Request Body</label>
                            <textarea name="json_body" class="form-control" rows="3" placeholder='{"key": "value"}'></textarea>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" name="execute" class="btn btn-primary btn-lg w-100 ">Run Test</button>
                        </div>
                    </div>
                </div>
            </form>

     <!-- This displays the response returned from the API, allowing the user to view the output of their request -->
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0 text-secondary">Response Body</h4>         
                    <?php if (!empty($statusCode)): ?>
                        <span class="badge rounded-pill <?php echo ($statusCode < 300) ? 'bg-success' : 'bg-danger'; ?>">
                            HTTP <?php echo $statusCode; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <pre><?php echo htmlspecialchars($responseBody); ?></pre>
            </div>

        </div>
    </div>
</div>

</body>
</html>