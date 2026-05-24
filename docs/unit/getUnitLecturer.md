# Get Units Lecturer

## Description
Returns all lecturers assigned to a specific unit.

## Endpoint
GET api/unitLecturer/read.php?unitId={unitId}

http://localhost:8080/Monica-School-API/api/unitLecturer/read.php?unitId=20

## Authentication
Requires a valid Bearer token in the request header:
Authorization: Bearer {token}

## Response 

```json
{
    "data": [
        {
            "unitLecturerId": 40,
            "lecturerId": 31,
            "unitId": 20,
            "name": "Zoe",
            "surname": "Lecturer"
        },
        {
            "unitLecturerId": 41,
            "lecturerId": 40,
            "unitId": 20,
            "name": "Chloe",
            "surname": "Lecturer"
        }
    ]
}
```

## Status Codes
- 200 OK → Lecturers retrieved successfully
- 400 Bad Request → Missing unit ID
- 404 Not Found → No lecturers found for unit
- 500 Internal Server Error → Server error