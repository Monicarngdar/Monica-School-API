# Create Event

## Description
Creates a new event in the system. Events include date, description and type.

## Endpoint
POST api/event/create.php

http://localhost:8080/Monica-School-API/api/event/create.php


## Authentication
Requires a valid Bearer token in the request header:
Authorization: Bearer {token}

## Parameters
- `userId` (integer) – The ID of the user to update


## Request Body

```json
{
  "eventDate": "2026-05-03",
  "eventDescription": "Creating new event lecturer 123",
  "eventType": "School Holidays"
}
```
Response Example
```json
{
  "message": "Event created."
}
```
## Status Codes
- 201 Created → Event created successfully
- 400 Bad Request → Incomplete data provided
- 401 Unauthorized → Invalid or missing OAuth token
- 500 Internal Server Error → Event not created