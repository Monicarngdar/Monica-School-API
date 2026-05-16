# Get Users

## Description
Returns a list of all users in the system.

## Endpoint
GET api/user/read.php

http://localhost:8080/Monica-School-API/api/user/read.php


## Params
- id (string): The user ID

## Response
```json
{
    "data": [
        {
            "userId": 30,
            "name": "Admin",
            "surname": "User",
            "email": "admin@gmail.com",
            "date_of_birth": "2025-12-29",
            "street1": "7",
            "street2": "Triq Flor",
            "city": "Qormi",
            "postCode": "QRM 222"
        },
        {
            "userId": 40,
            "name": "Chloe",
            "surname": "Lecturer",
            "email": "chloe@gmail.com",
            "date_of_birth": "2025-12-29",
            "street1": "6",
            "street2": "Triq Bay",
            "city": "Valletta",
            "postCode": "VRT 111"
        },
        {
            "userId": 25,
            "name": "Kiara",
            "surname": "Student",
            "email": "kiarabrown@gmail.com",
            "date_of_birth": "2025-12-22",
            "street1": "15",
            "street2": "Triq Glow",
            "city": "Valletta",
            "postCode": "VLT 124"
        },
        {
            "userId": 39,
            "name": "new",
            "surname": "test1",
            "email": "chloe@gmail.co",
            "date_of_birth": "2026-03-20",
            "street1": "15",
            "street2": "Triq Sun",
            "city": "Valletta",
            "postCode": "VLT 124"
        },
        {
            "userId": 31,
            "name": "Zoe",
            "surname": "Lecturer",
            "email": "zoey@gmail.com",
            "date_of_birth": "2025-12-29",
            "street1": "6",
            "street2": "Triq Bay",
            "city": "Valletta",
            "postCode": "VRT 111"
        }
    ]
}
```

## Status Codes
- 200 OK → Users retrieved successfully
- 401 Unauthorized → Invalid or missing OAuth token
- 500 Internal Server Error → Server error