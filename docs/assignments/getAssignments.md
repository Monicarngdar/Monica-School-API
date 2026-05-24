# Get Assignments

## Description
Returns a list of all assignments in the system. Each assignment includes user, unit, task details, marks, and due date.

## Endpoint
GET api/assignments/read.php

http://localhost:8080/Monica-School-API/api/assignments/read.php

## Authentication
Requires a valid Bearer token in the request header:
Authorization: Bearer {token}

## Response

```json
{
  "data": [
    {
      "assignmentId": 41,
      "userId": 31,
      "unitId": 19,
      "taskTitle": "Task 2",
      "taskDescription": "Develop a School Website using PHP",
      "maxMark": 100,
      "dueDate": "2026-04-02"
    },
    {
      "assignmentId": 43,
      "userId": 31,
      "unitId": 19,
      "taskTitle": "Task 1",
      "taskDescription": "API Assignment",
      "maxMark": 100,
      "dueDate": "2026-04-03"
    },
    {
      "assignmentId": 44,
      "userId": 31,
      "unitId": 20,
      "taskTitle": "Task 4",
      "taskDescription": "Prototyping and Testing",
      "maxMark": 100,
      "dueDate": "2026-04-04"
    },
    {
      "assignmentId": 45,
      "userId": 31,
      "unitId": 19,
      "taskTitle": "Task 3",
      "taskDescription": "Documentation",
      "maxMark": 100,
      "dueDate": "2026-05-29"
    }
  ]
}
```
## Status Codes
- 200 OK → Assignments retrieved successfully
- 404 Not Found → No assignments found
- 500 Internal Server Error → Server error