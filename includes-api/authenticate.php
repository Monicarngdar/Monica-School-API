<?php

// Check for the Authorization Header
$headers = apache_request_headers();
$providedToken = "";

if (isset($headers['Authorization'])) {
    // Expecting format: "Bearer secret-token-123"
    $providedToken = str_replace('Bearer ', '', $headers['Authorization']);
}

// Validation Logic
//$isAuthenticated = false;

$oauthUser = new oauthUser($db);
$oauthUser ->token = $providedToken;
$oauthUser ->authenticate();



?>