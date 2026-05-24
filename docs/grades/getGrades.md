# Get Grades

## Description
Returns a list of all grades recorded in the system. Each grade contains information about the student, assignment, lecturer, marks earned, comments, and date recorded.

## Endpoint
GET api/grades/read.php

http://localhost:8080/Monica-School-API/api/grades/read.php

## Authentication
Requires a valid Bearer token in the request header:
Authorization: Bearer {token}

## Response

```json
{
  "data": [
    {
      "userAccountId": 25,
      "assignmentId": 41,
      "lecturerUserAccountId": 31,
      "marksEarned": 90,
      "lecturerComment": "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris",
      "dateRecorded": "2026-04-26"
    },
    {
      "userAccountId": 25,
      "assignmentId": 43,
      "lecturerUserAccountId": 31,
      "marksEarned": 100,
      "lecturerComment": "Lorem ipsum dolor sit amet, consectetur adipiscing elit...",
      "dateRecorded": "2026-04-26"
    }
  ]
}
```
## Status Codes
- 200 OK → Grades retrieved successfully
- 401 Unauthorized → Invalid or missing OAuth token
- 404 Not Found → No grades found
- 500 Internal Server Error → Server error