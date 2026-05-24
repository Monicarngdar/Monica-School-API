# Get Attendance

## Description
Returns a list of all attendance records in the system. Each record shows the user, unit, timetable session, date, and attendance status.

## Endpoint
GET api/attendance/read.php

http://localhost:8080/Monica-School-API/api/attendance/read.php

## Authentication
Requires a valid Bearer token in the request header:
Authorization: Bearer {token}

## Response

```json
{
  "data": [
    {
      "attendanceId": 25,
      "userAccountId": 25,
      "unitId": 19,
      "unitTimetableId": 13,
      "date": "2026-03-30",
      "status": "present"
    },
    {
      "attendanceId": 26,
      "userAccountId": 25,
      "unitId": 19,
      "unitTimetableId": 13,
      "date": "2026-03-31",
      "status": "present"
    },
    {
      "attendanceId": 27,
      "userAccountId": 25,
      "unitId": 19,
      "unitTimetableId": 13,
      "date": "2026-04-07",
      "status": "present"
    },
    {
      "attendanceId": 28,
      "userAccountId": 25,
      "unitId": 19,
      "unitTimetableId": 13,
      "date": "2026-04-08",
      "status": "absent"
    },
    {
      "attendanceId": 29,
      "userAccountId": 25,
      "unitId": 19,
      "unitTimetableId": 13,
      "date": "2026-04-09",
      "status": "late"
    }
  ]
}
```

## Status Codes
- 200 OK → Attendance records retrieved successfully
- 404 Not Found → No attendance found
- 500 Internal Server Error → Server error