# Get All Units

## Description
Returns a list of all units in the system.

## Endpoint
GET api/unit/read.php

http://localhost:8080/Monica-School-API/api/unit/read.php

## Response

```json
{
    "data": [
        {
            "unitId": 19,
            "courseId": 13,
            "semester": "1",
            "unitName": "Php & Databases",
            "unitDescription": "This unit focuses on the development of dynamic, data-driven websites by integrating server-side logic with persistent storage. Students transition from static front-end design to \"back-end\" programming, learning how to use PHP to process user input, manage sessions, and control site behaviour."
        },
        {
            "unitId": 20,
            "courseId": 13,
            "semester": "1",
            "unitName": "Mobile App Development",
            "unitDescription": "In an Angular-focused Mobile App Development unit, students leverage their web development expertise to build high-performance, cross-platform applications using the Ionic Framework. "
        },
        {
            "unitId": 21,
            "courseId": 13,
            "semester": "1",
            "unitName": "API Systems",
            "unitDescription": "API (Application Programming Interface) is a set of rules and protocols that allows different software applications to communicate, exchange data, and share functionality securely."
        }
    ]
}
```

## Status Codes
- 200 OK → Units retrieved successfully
- 404 Not Found → No units found
- 500 Internal Server Error → Server error