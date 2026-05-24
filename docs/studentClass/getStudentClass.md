# Get Student Class

## Description
Returns a list of all classes Id in the system.

## Endpoint
GET api/studentClass/readSingle.php

http://localhost:8080/Monica-School-API/api/studentClass/readSingle.php

## Authentication
Requires a valid Bearer token in the request header:
Authorization: Bearer {token}

## Response

```json
{
    "classStudentId": 17,
    "classId": 18,
    "studentId": 25
}
```
## Status Codes
- 200 OK → Class retrieved successfully
- 401 Unauthorized → Invalid or missing OAuth token
- 404 Not Found → Class not found for user
- 500 Internal Server Error → Server error