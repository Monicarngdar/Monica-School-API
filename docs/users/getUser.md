# Get Single User

## Description
Returns a single user based on their ID.

## Endpoint
GET api/user/readSingle.php

http://localhost:8080/Monica-School-API/api/user/readSingle.php?id=25

## Authentication
Requires a valid Bearer token in the request header:
Authorization: Bearer {token}

## Parameters
- id (integer): The ID of the user

## Response
```json
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
}
```

## Status Codes
- 200 OK → User found
- 400 Bad Request → No ID provided
- 401 Unauthorized → Invalid or missing OAuth token
- 404 Not Found → User not found