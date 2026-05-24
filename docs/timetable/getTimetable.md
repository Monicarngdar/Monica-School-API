# Get Timetable

## Description
Returns a list of all timetable entries in the system. Each entry contains information about the unit, class, lecturer, room, day, and time.

## Endpoint
GET api/timetable/read.php

http://localhost:8080/Monica-School-API/api/timetable/read.php

## Authentication
Requires a valid Bearer token in the request header:
Authorization: Bearer {token}

## Response

```json
{
  "data": [
    {
      "unitTimetableId": 13,
      "unitId": 19,
      "classId": 18,
      "lecturerId": 31,
      "room": "A111",
      "day": "Monday",
      "startTime": "08:00:00",
      "endTime": "11:30:00"
    },
    {
      "unitTimetableId": 14,
      "unitId": 20,
      "classId": 18,
      "lecturerId": 31,
      "room": "A112",
      "day": "Tuesday",
      "startTime": "12:00:00",
      "endTime": "15:30:00"
    }
  ]
}
```

## Status Codes
- 200 OK → Timetables retrieved successfully
- 401 Unauthorized → Invalid or missing OAuth token
- 404 Not Found → No timetables found
- 500 Internal Server Error → Server error