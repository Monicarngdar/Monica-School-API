# Update Event

## Description
Updates an existing event in the system using its ID.

## Endpoint
PUT api/event/update.php

http://localhost:8080/Monica-School-API/api/event/update.php?id=5


## Parameters
- id (integer): The event ID (calendarId)

## Request Body

```json
{
    "calendarId": 4,
    "eventDate": "2026-04-07",
    "eventDescription": "Testing Token Hello",
    "eventType": "School Holidays"
}
```
Response Example
```json
{
  "message": "Event updated."
}
```

## Status Codes
- 200 OK → Event updated successfully
- 400 Bad Request → Incomplete data provided
- 401 Unauthorized → Invalid or missing OAuth token
- 405 Method Not Allowed → Wrong request method
- 500 Internal Server Error → Event not updated
