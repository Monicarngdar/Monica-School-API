<?php

// Check for the Authorization Header
// Grab all the request headers sent by the client 
$headers = apache_request_headers();
$providedToken = "";

if (isset($headers['Authorization'])) {
    $providedToken = str_replace('Bearer ', '', $headers['Authorization']);
}

// Validation Logic
//$isAuthenticated = false;

// setting up the user object and pass in the token
$oauthUser = new oauthUser($db);
$oauthUser ->token = $providedToken;

// run the authentication method to check if this token is valid in our system
$oauthUser ->authenticate();



?>