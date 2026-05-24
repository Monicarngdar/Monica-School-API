# API Documentation

## Overview

This API provides access to a School Management System. It allows users to retrieve and manage data such as users, units, lecturers, timetables, assignments, grades, attendance, and events.

All responses are returned in JSON format and can be tested using tools such as Postman or the built-in testing dashboard
The API returns data in JSON format and is designed to be used with tools such as Postman.

## Base URL
http://localhost:8080/Monica-School-API/api/


## How to Use the API
HTTP Methods Used
The API follows standard REST principles:

- GET → Retrieve data
- POST → Create new data
- PUT → Fully update existing data
- PATCH → Partially update existing data
- DELETE → Remove data

## Authentication

This API uses OAuth Bearer Token authentication to secure protected endpoints.

### How it works:

- A token is assigned to a user after authentication
- The token must be included in every request
- The API validates the token before processing the request

### Request Header Format:

- Authorization: Bearer {token}
- If the token is missing or invalid, the API returns: 401 Unauthorized

## Response Format
All responses are returned in JSON format.

Success response example:
```json
{
  "data": []
}
```

Error response example:
```json
{
  "message": "error description"
}
```

## Status Codes
| Code | Meaning |
|------|---------|
| 200 | OK – Request was successful |
| 201 | Created – New record created successfully |
| 204 | No Content – Record deleted successfully |
| 400 | Bad Request – Missing or invalid data |
| 401 | Unauthorized – Missing or invalid token |
| 403 | Forbidden – Valid token but no permission |
| 404 | Not Found – Resource does not exist |
| 500 | Internal Server Error – Server side error |

## Testing Dashboard

A PHP-based testing dashboard was created to interact with the API without using Postman.

Features:

- View and manage users, units, grades, attendance, assignments, and events
- Test all HTTP methods (GET, POST, PUT, PATCH, DELETE)
- Automatically attach OAuth Bearer tokens
- Send requests through a simple web interface

### How to Use the Dashboard

1. Open the dashboard:
   http://localhost:8080/Monica-School-API/index.php
2. Select an API action (e.g. Users, Events, Assignments)
3. Enter required parameters (if needed)
4. Click submit to send request

### Authentication in Dashboard

- All requests use OAuth Bearer Token authentication stored in a cookie.
- The token is automatically attached to each request using cURL: Authorization: Bearer {token}

Read the full authentication guide here: [OAuth Bearer Authentication](auth/authenticate.md) 