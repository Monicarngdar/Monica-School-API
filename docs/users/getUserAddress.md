# Update User Address

## Description
Updates the address details of an existing user.

## Endpoint
PATCH api/users/updateAddress.php

http://localhost:8080/Monica-School-API/api/user/updateAddress.php

## Params
- userId (integer): The ID of the user

## Response
```json
{
    "userId": 25,
    "street1": "15",
    "street2": "Triq Glow",
    "city": "Valletta",
    "postCode": "VLT 124"
}
```
Response Example
```json
{
  "message": "Address updated."
}
```

## Status Codes
- 200 OK → User found
- 400 Bad Request → No ID provided
- 401 Unauthorized → Invalid or missing OAuth token
- 404 Not Found → User not found
- 500 Internal Server Error → Update failed